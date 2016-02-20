<?php
require_once 'UserController.php';
require_once '../model/UserModel.php';
require_once '../model/PostModel.php';
require_once '../model/CommentModel.php';
class AdminController {

  public function Dashboard(){

    if(UserController::IsUserConnected() && (UserController::GetUserRole() == 'superadmin')){

      $post = new PostModel();
      $posts = $post->GetAllPosts();
      $user = new UserModel();
      $users = $user->GetAllUsers();
      $comment = new CommentModel();
      $comments = $comment->GetAllComments();
      App::view('admin', 'dashboard', [
        'posts' => $posts,
        'users' => $users,
        'comments' => $comments
      ]);

    } else {

      App::Error('permission');

    }

  }

}
