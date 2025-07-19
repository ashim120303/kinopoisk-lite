<?php

namespace App\Kernel\View;

class View{
    public function page(string $pageName):void{
        include_once APP_PATH . "/templates/pages/$pageName.php";
    }
}