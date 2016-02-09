<?php

class App {

  public static function view($controller, $view, $data){

    require_once '../view/' . $controller . '/' . $view . '.php';

  }

}
