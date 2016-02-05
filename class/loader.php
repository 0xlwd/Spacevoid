<?php

class loader {

  static function controllerLoader($class) {
    require '../controller/' . $class . 'Controller.php';
  }

}
