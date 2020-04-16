<?php declare(strict_types=1);
class AppController {
    protected function isGet(): bool{
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    protected function isPost(): bool{
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function render(string $template = null, array $variables = []){
        $templatePath = $template ? dirname(__DIR__).'//Views//'.get_class($this).'//'.$template.'.php' : '';
        $output = 'File not found';
        if (file_exists($templatePath)) {
            extract($variables);
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }
}