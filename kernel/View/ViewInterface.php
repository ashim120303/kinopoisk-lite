<?php

namespace App\Kernel\View;

interface ViewInterface
{
    public function page(string $pageName, array $data = [], string $title = ''):void;
    public function component(string $componentName, array $data = []):void;

    public function getTitle():string;
}