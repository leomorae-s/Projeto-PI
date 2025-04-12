<?php

require_once dirname(__DIR__) . "/helpers/constants.php";
require_once dirname(__DIR__) . "/routes/router.php";

try {
    $data = router();

    if(!isset($data['data'])) {
        throw new Exception("no data");
    }

    if(!isset($data['data']['title'])) {
        throw new Exception("no title");
    }

    if(!isset($data['views'])) {
        throw new Exception("No views defined");
    }

    if(!file_exists(VIEWS.$data['views'])) {
        throw new Exception("View not found {$data['views']}");
    }


    extract($data['data']);
    $view = $data['views'];

    require VIEWS . (in_array($view, ["login.php", "register.php"]) ? $view : "master.php");


}catch (Exception $e){
    var_dump($e->getMessage());
}
