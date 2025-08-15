<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Upload\UploadedFileInterface;
use App\Models\Movie;

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

    public function delete(int $id):void
    {
        $this->db->destroy('movie', [
            'id' => $id
        ]);
    }

    public function find(int $id): ?Movie
    {
        $movie = $this->db->first('movie', ['id' => $id]);
        if(!$movie){
            return null;
        }
        return new Movie(
            $movie['id'],
            $movie['name'],
            $movie['description'],
            $movie['preview'],
            $movie['category_id'],
            $movie['created_at'],
        );
    }

    public function update(int $id, string $name, string $description, ?UploadedFileInterface $image, int $category): void
    {
        $data = [
            'name' => $name,
            'description' => $description,
            'category_id' => $category,
        ];
        if($image && !$image->hasErrors()){
            $data['preview'] = $image->move('movies');;
        }
        $filePath = $image->move('movies');
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
            );
        }, $movies);
    }
}