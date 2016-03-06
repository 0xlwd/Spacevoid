<?php
require_once '../model/UserModel.php';
require_once '../model/PostModel.php';
class UserController {

  public function UserConnect($userPostedLogin, $userPostedPassword) {

    header('Content-Type: application/json');

    $userPassword = App::PasswordHash($userPostedPassword);

    if(isset($userPostedLogin) && isset($userPassword)) {

      $user = new UserModel();
      $connect = $user->GetUserConnect($userPostedLogin, $userPassword);
      while($data = $connect->fetch()){
        $login = $data['login'];
        $password = $data['password'];
        $id = $data['id'];
      }
      if(!empty($login) && !empty($password) && $userPostedLogin == $login && $userPassword == $password) {
        $user->UserConnectDate(date("d.m.Y"), $id);
        $_SESSION['user_id'] = $id;
        echo json_encode(['success' => true, 'code' => 200]);
      } else {
        http_response_code(400);
        echo json_encode(['error' => 'Incorrect user informations',  'code' => 400]);
      }

    } else {
      http_response_code(400);
      echo json_encode(['error' => 'Empty form', 'code' => 400]);
    }

  }

  public function UserDisconnect() {

    header('Content-Type: application/json');
    session_destroy();
    unset($_SESSION['user_id']);
    echo json_encode(['success' => 'User disconnected', 'code' => 200]);

  }


  public static function IsUserConnected() {

    if(isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }

  }

  public static function GetUserRole(){

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
      echo json_encode(['error' => 'User not connected', 'code' => 401]);
    }


  }

  public function UserLoginForm() {

    App::view('user', 'login', [
      'title' => 'SpaceVoid - Login'
    ]);

  }

  public function UserProfile() {

    $connection_status = $this->IsUserConnected();
    if($connection_status === true) {

      if(isset($_POST['login']) && isset($_POST['mail'])){

        if(strlen($_POST['password']) == 0){

          $user = new UserModel();
          $userinfos = $user->getUser($_SESSION['user_id']);
          $password = $userinfos['password'];

        } else {

          $password = App::PasswordHash($_POST['password']);

        }

        $user = new UserModel();
        $userinfos = $user->UpdateUser($_SESSION['user_id'], htmlentities($_POST['login']), $password, htmlentities($_POST['mail']), htmlentities($_POST['description']), htmlentities($_POST['firstname']), htmlentities($_POST['lastname']));

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

  public function UserRegister(){

    if(isset($_POST['login']) && isset($_POST['password']) &&  isset($_POST['mail'])){

      $dataOk = true;

      if(strlen($_POST['login']) < 4){

        $error['login'] = 'Votre pseudo doit faire plus de 4 caractères';
        $dataOk = false;

      }

      if(strlen($_POST['password']) < 8){

        $error['password'] = 'Votre mot de passe doit faire plus de 8 caractères';
        $dataOk = false;

      }

      if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {

        $error['mail'] = 'Votre mail n\'est pas valide';
        $dataOk = false;

      }

      if($dataOk){
        $password = App::PasswordHash($_POST['password']);
        $user = new UserModel();
        $user->CreateUser(htmlentities($_POST['login']), $password, htmlentities($_POST['mail']), '', '', '', 'user', date('d.m.Y'));
        echo json_encode(['success' => 'User registered', 'code' => 200]);
      } else {
        http_response_code(400);
        echo json_encode($error);

      }

    } else {

      App::view('user', 'register', [
        'title' => 'SpaceVoid - Register'
      ]);

    }

  }

  public function DeleteUser($id){

    $user = new UserModel();
    $users = $user->DeleteUser($id);
    header('Location: dashboard');

  }

}
