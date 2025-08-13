<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\CategoryService;

class CategoriesController extends Controller{
    private CategoryService $service;

    public function index():void{
        $this->view('categories');
    }
    public function create():void{
        $this->view('admin/categories/add');
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

    private function service():categoryService
    {
        if (! isset($this->service)){
            $this->service = new CategoryService($this->db());
        }
        return $this->service;
    }
}