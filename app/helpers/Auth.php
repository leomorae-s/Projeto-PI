<?php
namespace helpers;
class Auth{
    const LOGGED_KEY = 'LOGGED';

    public static function setUsuarioLogado($usuario){
        $_SESSION[self::LOGGED_KEY] = $usuario;
    }

    public static function getUsuarioLogado(){
        return $_SESSION[self::LOGGED_KEY] ?? null;
    }

    public static function getNomeUsuarioLogado() {
        $usuario = self::getUsuarioLogado();  // Pega o usuário logado
        return $usuario ? $usuario['nome'] : null;  // Retorna o nome ou null se não tiver usuário logado
    }

    public static function isLogged(){
        return isset($_SESSION[self::LOGGED_KEY]);
    }

    public static function logout(){
        unset($_SESSION[self::LOGGED_KEY]);
    }
}