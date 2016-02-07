<?php
require_once '../model/UserModel.php';
class UserController extends UserModel{

  public function userConnect($userPostedLogin, $userPostedPassword) {

    if(isset($userPostedLogin) && isset($userPostedPassword)) {

      $user = new UserModel();
      $connect = $user->GetUserConnect($_POST['login'], $_POST['password']);
      while($data = $connect->fetch()){
        $login = $data['login'];
        $password = $data['password'];;
        $id = $data['id'];
      }
      if($userPostedLogin == $login && $userPostedPassword == $password) {
        $user->UserConnectDate(date("d.m.Y"), $id);
        session_start();
        $_SESSION['user_id'] = $id;
        header('location: ../profile');
      } else {
        header('location: ../login/invalid');
      }
    } else {
      header('location: ../login');
    }

  }

  public function userDisconnect() {

    session_start();
    session_unset();
    session_destroy();
    unset($_SESSION['user_id']);
    header('location: ../');

  }


  public static function isUserConnected() {

    session_start();
    if(isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }

  }

  public function userProfile() {

    $connection_status = $this->isUserConnected();
    if($connection_status === true) {
      require '../view/profil.php';
      $user = new UserModel();
      $userinfos = $user->getUser($_SESSION['user_id']);
      echo $userinfos['login'] . '<br>';
      echo $userinfos['password'] . '<br>';
      echo $userinfos['mail'] . '<br>';
      echo $userinfos['description'] . '<br>';
      echo $userinfos['firstname'] . '<br>';
      echo $userinfos['lastname'] . '<br>';
      echo $userinfos['signup_date'] . '<br>';
      echo $userinfos['role'] . '<br>';
      echo $userinfos['last_login'] . '<br>';
    } else {
      require 'ErrorController.php';
      echo ErrorController::getError(401);
    }


  }

}
