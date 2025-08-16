<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\Category;
use App\Models\Movie;

class CategoryService
{
    public function __construct(
        private DatabaseInterface $db,
    )
    {
        
    }

    /**
     * @return array<Category>
     */
    public function all(): array
    {
        $categories =  $this->db->get('category');
        $categories = array_map(function ($category) {
            return new Category(
                id: $category['id'],
                name: $category['name'],
                createdAt: $category['created_at'],
                updatedAt: $category['updated_at'],
            );
        }, $categories);
        return $categories;
    }

    public function destroy(int $id): void
    {
        $this->db->destroy('category', [
            'id' => $id
        ]);
    }

    public function add(string $name):int
    {
        return $this->db->insert('category', [
            'name' => $name,
        ]);
    }

    public function find(int $id): ?Category
    {
        $category = $this->db->first('category', [
            'id' => $id
        ]);
        if (!$category) {
            return null;
        }
        return new Category(
            id: $category['id'],
            name: $category['name'],
            createdAt: $category['created_at'],
            updatedAt: $category['updated_at'],
        );
    }

    public function update(int $id, string $name):void
    {
        $this->db->update('category', [
            'name' => $name,
        ], [
            'id' => $id
        ]);
    }

    public function allWithMoviesCount(): array
    {
        $movieService = new MovieService($this->db);
        $counts = $movieService->countsByCategory();

        $rows = $this->db->get('category');

        return array_map(function ($category) use ($counts) {
            $cid = (int)$category['id'];
            return new Category(
                id: $cid,
                name: $category['name'],
                createdAt: $category['created_at'],
                updatedAt: $category['updated_at'],
                moviesCount: $counts[$cid] ?? 0
            );
        }, $rows);
    }
}