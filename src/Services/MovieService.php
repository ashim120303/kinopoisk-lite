<?php

namespace App\Services;

use App\Kernel\Auth\User;
use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Movie;
use App\Models\Review;

class MovieService
{
    public function __construct(
        private DatabaseInterface $db
    ){
    }

    public function postAdd(
        string $name,
        string $description,
        UploadedFileInterface $image,
        int $category): false|int
    {
        $filePath = $image->move("movies");
        return $this->db->insert('movie', [
            'name' => $name,
            'description' => $description,
            'preview' => $filePath,
            'category_id' => $category,
        ]);
    }

    public function all():array
    {
        $movies = $this->db->get('movie');
        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['preview'],
                $movie['category_id'],
                $movie['created_at'],
            );
        }, $movies);
    }

    public function delete(int $id): void
    {
        $movie = $this->db->first('movie', ['id' => $id]);

        if ($movie && !empty($movie['preview'])) {
            $this->removeFile($movie['preview']);
        }

        $this->db->destroy('movie', ['id' => $id]);
    }

    private function removeFile(?string $path): void
    {
        if ($path) {
            $fullPath = __DIR__ . '/../../storage/' . $path; // подстрой путь
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }
    }

    public function find(int $id): ?Movie
    {
        $movie = $this->db->first('movie', ['id' => $id]);
        if(!$movie){
            return null;
        }

        $reviews = $this->db->get('review', [
            'movie_id' => $id,
        ]);

        return new Movie(
            $movie['id'],
            $movie['name'],
            $movie['description'],
            $movie['preview'],
            $movie['category_id'],
            $movie['created_at'],
            $this->getReviews($id)
        );
    }

    public function update(int $id, string $name, string $description, ?UploadedFileInterface $image, int $category): void
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'category_id' => $category,
        ];

        $movie = $this->db->first('movie', ['id' => $id]);

        if ($image && !$image->hasErrors()) {
            // удаляем старый файл, если был
            if ($movie && !empty($movie['preview'])) {
                $this->removeFile($movie['preview']);
            }

            // грузим новый
            $data['preview'] = $image->move('movies');
        }

        $this->db->update('movie', $data, ['id' => $id]);
    }

    public function new(): array
    {
        $movies = $this->db->get('movie',
            [],
            ['id' => 'DESC'], 5);
        return array_map(function ($movie) {
            return new Movie(
                $movie['id'],
                $movie['name'],
                $movie['description'],
                $movie['preview'],
                $movie['category_id'],
                $movie['created_at'],
                $this->getReviews($movie['id']),
            );
        }, $movies);
    }
    private function getReviews(int $id):array{
        $reviews = $this->db->get('review', [
            'movie_id' => $id,
        ]);
        return array_map(function ($review){
            $user = $this->db->first('user', [
                'id' => $review['user_id']
            ]);

            return new Review(
                $review['id'],
                $review['rating'],
                $review['review'],
                $review['created_at'],
                new User(
                    $user['id'],
                    $user['email'],
                    $user['password'],
                    $user['name'],
                )
            );
        }, $reviews);
    }
}