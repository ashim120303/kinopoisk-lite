<?php

namespace App\Kernel\View;

interface ViewInterface
{
    public function page(string $pageName):void;
    public function component(string $componentName):void;
}