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
                $movie['category_id']
            );
        }, $movies);
    }
}