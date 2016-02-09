<?php

class App {

  public static function view($controller, $view, $data){

    require_once '../view/' . $controller . '/' . $view . '.php';

  }

  public static function css($fileName){

    return '../../public/css/' . $fileName . 'css';

  }

  public static function js($fileName){

    return '../../public/js/' . $fileName . 'js';

  }

  public static function img($fileName){

    return '../../public/img' . $fileName . 'img';

  }

  public static function PasswordHash($password){

    $secret = 'Gdes342Bzgqhjg43D0t9jkzhq3244';
    $HashedPassword = md5($secret . $password);
    return $HashedPassword;

  }

}
