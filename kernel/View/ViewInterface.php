<?php

namespace App\Kernel\View;

interface ViewInterface
{
    public function page(string $pageName, array $data = []):void;
    public function component(string $componentName, array $data = []):void;
}