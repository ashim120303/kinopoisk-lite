<?php

namespace App\Kernel\View;

use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\Session;

class View{
    public function __construct(
        private Session $session,
    ){

    }
    public function page(string $pageName):void{
        $viewPath = APP_PATH . "/templates/pages/$pageName.php";
        if(! file_exists($viewPath)){
            throw new ViewNotFoundException("View $pageName does not exist");
        }
        extract($this->defaultData());
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
    private function defaultData():array{
        return [
            'view' => $this,
            'session' => $this->session,
        ];
    }
}