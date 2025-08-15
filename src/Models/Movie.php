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
        private array $reviews = [],
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

    /**
     * @return array<Review>
     */
    public function getReviews(): array
    {
        return $this->reviews;
    }

    public function avgRating():float
    {
        $ratings = array_map(function (Review $review) {
            return $review->getRating();
        }, $this->reviews);
        if (count($ratings)==0){
            return 0;
        }
        return round(array_sum($ratings) / count($ratings), 1);
    }
}