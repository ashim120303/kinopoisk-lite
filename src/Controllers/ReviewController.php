<?php

namespace App\Controllers;

use App\Kernel\Controller\Controller;

class ReviewController extends Controller
{
    public function add(): void
    {
        $validation = $this->postRequest()->validate([
            'rating' => ['required'],
            'review' => ['required'],
        ]);
        if (!$validation) {
            foreach ($this->postRequest()->errors() as $fields => $error) {
                $this->session()->set($fields, $error);
            }
            $this->redirect("/movie?id={$this->postRequest()->input('id')}");
        }
        $this->db()->insert("review", [
            "rating" => $this->postRequest()->input('rating'),
            "review" => $this->postRequest()->input('review'),
            'movie_id' => $this->postRequest()->input('id'),
            'user_id' => $this->auth()->id(),
        ]);
        $this->redirect("/movie?id={$this->postRequest()->input('id')}");
    }
}