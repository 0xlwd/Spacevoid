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

      } elseif ($action == 'comment') {

        $PostController->NewComment();

      } elseif ($action == 'commentDelete'){

        $PostController->DeleteComment($id);

      }

    } elseif ($controller == 'User') {

      require $controllerFolder . 'UserController.php';
      $UserController = new UserController();

      if($action == 'connect') {

        $UserController->UserConnect($_POST['login'], $_POST['password']);

      } elseif ($action == 'disconnect'){

        $UserController->UserDisconnect();

      } elseif ($action == 'profile'){

        $UserController->UserProfile();

      } elseif ($action == 'login'){

        $UserController->UserLoginForm();

      } elseif ($action == 'register'){

        $UserController->UserRegister();

      } elseif ($action == 'delete'){

        $UserController->DeleteUser($id);

      }

    } elseif ($controller == 'Admin') {
      require $controllerFolder . 'AdminController.php';
      $AdminController = new AdminController();
      if($action == 'index'){

        $AdminController->Dashboard();

      }
    }

    else {

      echo App::Error(404);

    }

  }

}
