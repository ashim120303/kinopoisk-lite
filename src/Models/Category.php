<?php

namespace App\Models;

class Category
{
    public function __construct(
        private int $id,
        private string $name,
        private string $createdAt,
        private string $updatedAt,
        private int $moviesCount = 0,
    ){
    }

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
    public function getUpdatedAt(){
        return $this->updatedAt;
    }

    public function getMoviesCount(): int { return $this->moviesCount; }
}