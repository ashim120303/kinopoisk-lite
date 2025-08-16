<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;
use App\Services\MovieService;

class CategoriesController extends Controller{
    private CategoryService $service;

    public function index():void{
        $this->view('categories', [
            'categories' => $this->service()->allWithMoviesCount(),
        ], 'Категории');
    }
    public function create():void{
        $this->view('admin/categories/add', title: 'Создать категорию');
    }

    public function add():void{
        $validation = $this->postRequest()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);
        if(!$validation){
            foreach($this->postRequest()->errors() as $fields=>$errors){
                $this->session()->set($fields, $errors);
            }
            $this->redirect('/admin/categories/add');
        }
        $this->service()->add($this->postRequest()->input('name'));
        $this->redirect('/admin');
    }

    public function delete():void
    {
        $this->service()->destroy($this->postRequest()->input('id'));
        $this->redirect('/admin');
    }

    public function edit():void
    {
        $category = $this->service()->find($this->postRequest()->input('id'));
        $this->view('/admin/categories/edit', ['category' => $category], 'Редактировать категорию');
    }

    public function update():void
    {
        $validation = $this->postRequest()->validate([
            'name' => ['required', 'min:3', 'max:255'],
        ]);
        if(!$validation){
            foreach ($this->postRequest()->errors() as $fields=>$errors){
                $this->session()->set($fields, $errors);
            }
            $this->redirect("/admin/categories/update?id={$this->postRequest()->input('id')}");
        }
        $this->service()->update(
            $this->postRequest()->input('id'),
            $this->postRequest()->input('name')
        );
        $this->redirect('/admin');
    }

    private function service():categoryService
    {
        if (! isset($this->service)){
            $this->service = new CategoryService($this->db());
        }
        return $this->service;
    }

    public function show(): void
    {
        $categoryId = (int)$this->postRequest()->input('id');
        $movieService = new MovieService($this->db());
        $movies = $movieService->getByCategory($categoryId);
        $this->view('category-movies', [
            'movies' => $movies,
        ], 'Фильмы категории');
    }
}