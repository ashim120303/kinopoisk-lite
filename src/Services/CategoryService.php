<?php

namespace App\Services;

use App\Kernel\Database\DatabaseInterface;
use App\Models\Category;

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
}