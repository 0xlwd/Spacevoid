<?php

class UserController {

  static function userConnect($userPostedLogin, $userPostedPassword) {

    $login = 'login';
    $password = 'password';

    if(isset($userPostedLogin) && isset($userPostedPassword)) {


      if($userPostedLogin == $login && $userPostedPassword == $password) {

        session_start();
        $_SESSION['login'] = $userPostedLogin;

      } else {

        header('location: ../login/invalid');

      }

    }

  }

  static function userDisconnect() {

    session_start();
    unset($_SESSION['login']);
    session_destroy();

  }

}
