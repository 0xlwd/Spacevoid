<?php

class Routes {

  public function getController($controller, $action, $id) {

    $controllerFolder = '../controller/';

    if ($controller == 'Post') {

      require $controllerFolder . 'PostController.php';
      $PostController = new PostController();

      if(isset($id) && $action == 'read') {

        $PostController->ReadPost($id);

      } elseif($action == 'home') {

        $PostController->Index();

      } elseif (isset($id) && $action == 'edit'){

        $PostController->EditPost($id);

      } elseif ($action == 'new') {

        $PostController->NewPost();

      } elseif ($action == 'delete') {

        $PostController->Delete($id);

      }

    } elseif ($controller == 'Page') {

      require $controllerFolder . 'PageController.php';
      $PagesController = new PageController();
      $PagesController->getPage($action);

    } elseif ($controller == 'User') {

      require $controllerFolder . 'UserController.php';
      $UserController = new UserController();

      if($action == 'connect') {

        $UserController->userConnect($_POST['login'], $_POST['password']);

      } elseif ($action == 'disconnect'){

        $UserController->userDisconnect();

      } elseif ($action == 'profile'){

        $UserController->userProfile();

      } elseif ($action == 'login'){

        $UserController->userLoginForm();

      }

    }

    else {

      require $controllerFolder . 'ErrorController.php';
      echo ErrorController::getError(404);

    }

  }

}
