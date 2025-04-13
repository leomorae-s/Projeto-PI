<?php


class Redirect{
    public static function redirect($url){
        header('Location: '.$url);
        exit;
    }
}