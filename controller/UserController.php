<?php
require_once '../model/UserModel.php';
require_once '../model/PostModel.php';
class UserController {

  public function userConnect($userPostedLogin, $userPostedPassword) {

    $userPassword = App::PasswordHash($userPostedPassword);

    if(isset($userPostedLogin) && isset($userPassword)) {

      $user = new UserModel();
      $connect = $user->GetUserConnect($userPostedLogin, $userPassword);
      while($data = $connect->fetch()){
        $login = $data['login'];
        $password = $data['password'];;
        $id = $data['id'];
      }
      if($userPostedLogin == $login && $userPassword == $password) {
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

    session_destroy();
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

    App::view('user', 'login', [
      'title' => 'SpaceVoid - Login'
    ]);

  }

  public function userProfile() {

    $connection_status = $this->isUserConnected();
    if($connection_status === true) {

      if(isset($_POST['login']) && isset($_POST['mail'])){

        if(strlen($_POST['password']) == 0){

          $user = new UserModel();
          $userinfos = $user->getUser($_SESSION['user_id']);
          $password = $userinfos['password'];

        } else {

          $password = $_POST['password'];

        }

        $user = new UserModel();
        $userinfos = $user->UpdateUser($_SESSION['user_id'], $_POST['login'], $password, $_POST['mail'], $_POST['description'], $_POST['firstname'], $_POST['lastname']);

      }
      $user = new UserModel();
      $userinfos = $user->getUser($_SESSION['user_id']);
      $post = new PostModel();
      $posts = $post->GetUserPosts($_SESSION['user_id']);
      App::view('user', 'profil', [
        'title' => 'SpaceVoid - Profil',
        'user' => $userinfos,
        'posts' => $posts
      ]);
    } else {
      echo App::Error(401);
    }

  }

  public function userRegister(){

    if(isset($_POST['login']) && isset($_POST['password']) &&  isset($_POST['mail'])){

      echo 'registering';
      $password = App::PasswordHash($_POST['password']);
      $user = new UserModel();
      $user->CreateUser($_POST['login'], $password, $_POST['mail'], '', '', '', 'user', date('d.m.Y'));

    } else {

      App::view('user', 'register', [
        'title' => 'SpaceVoid - Register'
      ]);

    }

  }

  public function DeleteUser($id){

    $user = new UserModel();
    $users = $user->DeleteUser($id);

  }

}
