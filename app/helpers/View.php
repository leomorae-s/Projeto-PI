<?php

namespace helpers;

class View{
    public static function render($view, $data = [], $logado = true) {
        extract($data);
        
        $viewPath = __DIR__ . '/../views/' . $view;

        if($logado) {
            $masterPath = __DIR__ . '/../views/templates/master.php';
            $data['viewPath'] = $viewPath;
            extract($data);
            require $masterPath;
        } else {
            require $viewPath;
        }
    }
}