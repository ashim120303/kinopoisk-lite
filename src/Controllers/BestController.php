<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;
use App\Services\MovieService;

class BestController extends Controller
{
    private MovieService $service;

    public function index(): void
    {
        $movies = $this->service()->best();
        $this->view('best', [
            'movies' => $movies
        ], 'Лучшие фильмы');
    }

    private function service():MovieService{
        if(! isset($this->service)){
            $this->service = new MovieService($this->db());
        }
        return $this->service;
    }
}