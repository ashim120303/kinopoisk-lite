<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;
use App\Services\CategoryService;
use App\Services\MovieService;

class MovieController extends Controller{
    private MovieService $service;
    public function index():void{
        $this->view('one-movie');
    }


    public function add():void{
        $categories = new CategoryService($this->db());
        $this->view('admin/movies/add', [
            'categories' => $categories->all(),
        ]);
    }

    public function postAdd():void{
        $validation = $this->postRequest()->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'description' => ['required'],
            'category' => ['required'],
        ]);
        if(!$validation){
            foreach($this->postRequest()->errors() as $fields=>$errors){
                $this->session()->set($fields, $errors);
            }
            $this->redirect('/admin/movies/add');
        }
        $this->service()->postAdd(
            $this->postRequest()->input('name'),
            $this->postRequest()->input('description'),
            $this->postRequest()->file('image'),
            $this->postRequest()->input('category'),
        );
        $this->redirect('/admin');
    }

    private function service():MovieService{
        if(! isset($this->service)){
            $this->service = new MovieService($this->db());
        }
        return $this->service;
    }
}