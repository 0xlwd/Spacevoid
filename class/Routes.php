<?php

class Routes {

  static function getController($controller, $action) {

    $controllerFolder = '../controller/';
    $controllerPath = $controllerFolder . $class . 'Controller.php';

    if(file_exists($controllerPath)){

      require $controllerPath;

    } elseif ($controller == 'Page') {

      require $controllerFolder . 'PageController.php';

      PageController::getPage($action);

    } elseif ($controller == 'User') {

      if($action == 'connect') {

        require $controllerFolder . 'UserController.php';

        UserController::userConnect($_POST['login'], $_POST['password']);

      } elseif ($action == 'disconnect') {

        require $controllerFolder . 'UserController.php';
        UserController::userDisconnect();

      }

    }

    else {

      require $controllerFolder . 'ErrorController.php';
      echo ErrorController::getError(404);

    }

  }

}
