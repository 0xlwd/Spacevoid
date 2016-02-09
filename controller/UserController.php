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

    unset($_SESSION['user_id']);
    header('location: ../');

  }


  public static function isUserConnected() {

    if(isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }

  }

  public static function getUserPermission(){

    if(isset($_SESSION['user_id'])){
      $user = new UserModel();
      $userInfos = $user->GetUser($_SESSION['user_id']);
      if($userInfos['role'] == 'user'){

        $role = 'user';
        return $role;

      } elseif ($userInfos['role'] == 'blogger') {

        $role = 'blogger';
        return $role;

      } elseif ($userInfos['role'] == 'superadmin') {

        $role = 'superadmin';
        return $role;

      }
    } else {
      header('Location : ../login');
    }


  }

  public function userLoginForm() {

    App::view('user', 'login', NULL);

  }

  public function userProfile() {

    $connection_status = $this->isUserConnected();
    if($connection_status === true) {
      $user = new UserModel();
      $userinfos = $user->getUser($_SESSION['user_id']);
      App::view('user', 'profil', ['name' => $userinfos['login'], 'password' => $userinfos['password']]);
    } else {
      require 'ErrorController.php';
      echo ErrorController::getError(401);
    }


  }

}
