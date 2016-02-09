<?php
require_once '../model/PostModel.php';
class PostController {

  public function Index(){

    $posts = new PostModel();
    $post = $posts->GetAllPosts();
    App::view('post', 'index', $post);

  }

  public function ReadPost($postID) {

    $posts = new PostModel();
    $post = $posts->GetPost($postID);
    App::view('post', 'read', $post);

  }

  public function EditPost($postID) {

    $posts = new PostModel();
    $post = $posts->GetPost($postID);
    App::view('post', 'edit', $post);

  }

  public function NewPost(){

    require_once '../Controller/UserController.php';
    $role = UserController::getUserPermission();
    if(UserController::isUserConnected()){
      if(isset($role) && $role == 'blogger' || $role == 'superadmin'){

        App::view('post', 'new', NULL);

      } else {

        require '../Controller/ErrorController.php';
        echo ErrorController::getError('permission');

      }

    }

  }

  public function Delete($postID){

    $posts = new PostModel();
    $post = $posts->DeletePost($postID);

  }

}

?>
