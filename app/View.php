<?php

declare(strict_types=1);

namespace App;

class View {
    private string $viewPath;
    private array $parameters;

    public function __construct(string $viewPath, array $parameters)
    {
        $this->viewPath = $viewPath;
        $this->parameters = $parameters;

    }

    public function render(): string
    {
       $viewPath = VIEW_PATH . '/' . $this->viewPath . '.php';

       if (! file_exists($viewPath) ) {
            return (string) view('_404');
       }

       foreach($this->parameters as $key => $value) {
        $$key = $value;
       }

       ob_start();
       include $viewPath;


       $layout = $this->getLayout();
       $viewContent = (string) ob_get_clean();

       return str_replace('$slot', $viewContent, $layout);
    }

    public function __toString(): string
    {
        return $this->render();
    }

    public function getLayout(): string
    {
        ob_start();

        include VIEW_PATH . '/components/layout.php';

        return (string) ob_get_clean();
    }
}