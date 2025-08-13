<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class CategoriesController extends Controller{
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
        $this->db()->insert('category', [
            'name' => $this->postRequest()->input('name'),
        ]);
        $this->redirect('/admin');
    }
}