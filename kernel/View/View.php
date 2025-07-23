<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;

class View{
    public function page(string $pageName):void{
        $viewPath = APP_PATH . "/templates/pages/$pageName.php";
        if(! file_exists($viewPath)){
            throw new ViewNotFoundException("View $pageName does not exist");
        }
        extract([
            'view' => $this
        ]);
        include_once $viewPath;
    }

    public function component(string $componentName):void{
        $componentPath = APP_PATH . "/templates/components/$componentName.php";
        if(! file_exists($componentPath)){
            echo "Component $componentName does not exist";
            return;
        }
        include_once $componentPath;
    }
}