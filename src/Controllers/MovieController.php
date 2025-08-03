<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Kernel\Http\Redirect;

class MovieController extends Controller{
    public function index():void{
        $this->view('one-movie');
    }

    public function add():void{
        $this->view('admin/movies/add');
    }

    public function postAdd():void{
        $file = $this->postRequest()->file('image');
        $filePath = $file->move("movies");
        dd($this->storage()->url($filePath));


        $validation = $this->postRequest()->validate([
            'name' => ['required', 'min:3', 'max:100']
        ]);
        if(!$validation){
            foreach($this->postRequest()->errors() as $fields=>$errors){
                $this->session()->set($fields, $errors);
            }
            $this->redirect('/admin/movies/add');
        }
        $id = $this->db()->insert('movies', [
            'name' => $this->postRequest()->input('name')
        ]);
        dd("Movie added successfully, id: $id");
    }
}