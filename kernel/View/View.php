<?php

namespace App\Kernel\View;

use App\Kernel\Auth\AuthInterface;
use App\Kernel\Exceptions\ViewNotFoundException;
use App\Kernel\Session\Session;
use App\Kernel\Session\SessionInterface;

class View implements ViewInterface{
    public function __construct(
        private SessionInterface $session,
        private AuthInterface $auth,
    ){

    }
    public function page(string $pageName, array $data = []):void{
        $viewPath = APP_PATH . "/templates/pages/$pageName.php";
        if(! file_exists($viewPath)){
            throw new ViewNotFoundException("View $pageName does not exist");
        }
        extract(array_merge($this->defaultData(), $data));
        include_once $viewPath;
    }

    public function component(string $componentName, array $data = []): void {
        $componentPath = APP_PATH . "/templates/components/$componentName.php";
        if (!file_exists($componentPath)) {
            echo "Component $componentName does not exist";
            return;
        }
        extract(array_merge($this->defaultData(), $data));

        include $componentPath;
    }

    private function defaultData():array{
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ];
    }
}