<?php
require_once '../model/PostModel.php';
require_once '../model/CommentModel.php';
require_once '../model/UserModel.php';
class PostController {

  public function Index(){

    $posts = new PostModel();
    $post = $posts->GetAllPosts();
    App::view('post', 'index', [
      'title' => 'SpaceVoid - Espace et Science',
      'posts' => $post
    ]);

  }

  public function ReadPost($postID) {

    require_once '../Controller/UserController.php';
    $posts = new PostModel();
    $post = $posts->GetPost($postID);
    $comment = new CommentModel();
    $comments = $comment->GetAllCommentsFromPost($post['id']);
    $user = new UserModel();
    $author = $user->GetUser($post['user_related_id']);
    if(!isset($_SESSION['user_id'])){
      $currentUserId = NULL;
    } else {
      $currentUserId = $_SESSION['user_id'];
    }
    App::view('post', 'read', [
      'title' => 'SpaceVoid - ',
      'posts' => $post,
      'author' => $author,
      'comments' => $comments,
      'connected' => UserController::IsUserConnected(),
      'current_user' => $currentUserId
    ]);

  }

  public function EditPost($postID) {

    require_once '../Controller/UserController.php';
    $role = UserController::GetUserRole();
    if(UserController::IsUserConnected()){
      if(isset($role) && $role == 'blogger' || $role == 'superadmin'){
          $posts = new PostModel();
          $post = $posts->GetPost($postID);
          if($_SESSION['user_id'] == $post['user_related_id'] || $role == 'superadmin'){
            if(isset($_POST['title']) && isset($_POST['content'])){
              if(is_uploaded_file($_FILES['post_cover']['tmp_name'])) {
                $coverImage = App::SaveImage();
                $posts->UpdatePost($post['id'], $_POST['title'], $_POST['content'], $coverImage);
                echo json_encode(['success' => 'Post updated', 'New image' => true, 'article id' => $post['id']]);
                die();
              } else {
                $coverImage = $post['post_cover'];
                $posts->UpdatePost($post['id'], $_POST['title'], $_POST['content'], $coverImage);
                echo json_encode(['success' => 'Post updated', 'New image' => false, 'article id' => $post['id']]);
                die();
              }

            }

            App::view('post', 'edit', [
              'title' => 'SpaceVoid - Edition article : '.$postID,
              'posts' => $post
            ]);

          } else {

            echo App::Error('property');

          }


      } else {

        echo App::Error('permission');

      }

    } else {

      echo App::Error(401);

    }

  }

  public function NewPost(){

    require_once '../Controller/UserController.php';
    $role = UserController::GetUserRole();
    if(UserController::IsUserConnected()){
      if(isset($role) && $role == 'blogger' || $role == 'superadmin'){

        if(isset($_POST['title']) && isset($_POST['content']) && is_uploaded_file($_FILES['post_cover']['tmp_name'])){

          $coverImage = App::SaveImage();
          $posts = new PostModel();
          $posts->CreatePost($_POST['title'], $_POST['content'], $_SESSION['user_id'], $coverImage);
          echo json_encode(['success' => true, 'message' => 'Votre article a bien été enregistré']);

        } else {

          App::view('post', 'new', [
            'title' => 'SpaceVoid - Nouvel article'
          ]);

        }

      } else {

        echo App::Error('permission');

      }

    } else {

      echo App::Error(401);

    }


  }

  public function Delete($postID){
    require_once '../Controller/UserController.php';
    $posts = new PostModel();
    $post = $posts->GetPost($postID);
    $role = UserController::GetUserRole();
    if(UserController::IsUserConnected()){
      if($_SESSION['user_id'] == $post['user_related_id'] || $role == 'superadmin'){
        $post = $posts->DeletePost($postID);
        header('location : ../../profile');
      } else {
        echo App::error('property');
      }
    } else {
      echo App::error(401);
    }

  }

  public function NewComment(){

    $comments = new CommentModel();
    if(!empty($_POST['content']) && !empty($_POST['post_id']) && !empty($_POST['user_id'])){
      $comment = $comments->CreateComment($_POST['content'], $_POST['post_id'], $_POST['user_id']);
    } else {
      echo App::Error(400);
    }

  }

  public function DeleteComment($id){

    $comment = new CommentModel();
    $comments = $comment->DeleteComment($id);

  }

}

?>
