<?php

class Routes {

  public function getController($controller, $action, $id) {

    $controllerFolder = '../controller/';

    if ($controller == 'Post') {

      if(isset($id) && $action == 'read') {

        require $controllerFolder . 'PostController.php';
        $PostController = new PostController();
        $PostController->readPost($id);

      }

      if($action == 'home') {

        require $controllerFolder . 'PostController.php';
        $PostController = new PostController();
        $PostController->home();

      } elseif (isset($id) && $action == 'edit'){
        require $controllerFolder . 'PostController.php';
        $PostController = new PostController();
        $PostController->edit($id);
      }

    } elseif ($controller == 'Page') {

      require $controllerFolder . 'PageController.php';
      $PagesController = new PageController();
      $PagesController->getPage($action);

    } elseif ($controller == 'User') {

      if($action == 'connect') {

        require $controllerFolder . 'UserController.php';
        $UserController = new UserController();
        $UserController->userConnect($_POST['login'], $_POST['password']);

      } elseif ($action == 'disconnect'){

        require $controllerFolder . 'UserController.php';
        $UserController = new UserController();
        $UserController->userDisconnect();

      } elseif ($action == 'profile'){

        require $controllerFolder .'UserController.php';
        $UserController = new UserController();
        $UserController->userProfile();

      }

    }

    else {

      require $controllerFolder . 'ErrorController.php';
      echo ErrorController::getError(404);

    }

  }

}
