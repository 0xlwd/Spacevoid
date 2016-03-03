<?php

class App {

  public static function view($controller, $view, $data){

    require_once '../view/' . $controller . '/' . $view . '.php';

  }

  public static function css($fileName){

    return '../../public/css/' . $fileName . '.css';

  }

  public static function js($fileName){

    return '../../public/js/' . $fileName . '.js';

  }

  public static function img($fileName){

    return '../../public/img/' . $fileName;

  }

  public static function SaveImage(){

    $contentDirectory = '../public/img/';
    $tmpFile = $_FILES['post_cover']['tmp_name'];

    if(!is_uploaded_file($tmpFile)){
        exit("Le fichier est introuvable");
    }

    $fileType = $_FILES['post_cover']['type'];

    if(!strstr($fileType, 'jpg') && !strstr($fileType, 'png') && !strstr($fileType, 'jpeg') && !strstr($fileType, 'bmp') && !strstr($fileType, 'gif')){
        exit("Le fichier n'est pas une image");
    }

    $fileName = $_FILES['post_cover']['name'];

    if( preg_match('#[\x00-\x1F\x7F-\x9F/\\\\]#', $fileName) ){
        exit("Nom de fichier non valide");
    }

    if(!move_uploaded_file($tmpFile, $contentDirectory . $fileName)){
        exit("Impossible de copier le fichier dans $contentDirectory");
    }

    return $fileName;

  }

  public static function PasswordHash($password){

    $secret = 'Gdes342Bzgqhjg43D0t9jkzhq3244';
    $HashedPassword = md5($secret . $password);
    return $HashedPassword;

  }

  public static function Error($errorCode){

    if ($errorCode == 400) {
      http_response_code(400);
      return 'Error 400 Bad Request : The informations you have sent are not correct';
    }
    if ($errorCode == 401) {
      http_response_code(401);
      return 'Error 401 Unauthorized : You must be logged in to access this page. <a href="/login">Log in</a>';
    }
    if ($errorCode == 403) {
      http_response_code(403);
      return 'Error 403 Forbidden : You cannot access this page';
    }
    if ($errorCode == 404) {
      http_response_code(404);
      return 'Error 404 Not found : The page you are looking for was not found.';
    }
    if ($errorCode == 'permission') {
      http_response_code(403);
      return 'Permission error : You don\'t have the required rank to access this page';
    }
    if ($errorCode == 'property') {
      http_response_code(403);
      return 'Property error : this post don\'t belong to you.';
    }

  }

}
