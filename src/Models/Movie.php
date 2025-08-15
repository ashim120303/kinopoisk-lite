<?php

namespace App\Models;

class Movie
{
    public function __construct(
        private int $id,
        private string $name,
        private string $description,
        private string $preview,
        private string $categoryId,
        private string $createdAt,
    ){
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPreview(): string
    {
        return $this->preview;
    }

    public function getCategoryId(): string
    {
        return $this->categoryId;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

}