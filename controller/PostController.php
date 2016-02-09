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

        if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['post_cover'])){

            $content_dir = '../public/img/';

            $tmp_file = $_FILES['fichier']['tmp_name'];

            if( !is_uploaded_file($tmp_file) )
            {
                exit("Le fichier est introuvable");
            }

            $type_file = $_FILES['fichier']['type'];

            if( !strstr($type_file, 'jpg') && !strstr($type_file, 'jpeg') && !strstr($type_file, 'bmp') && !strstr($type_file, 'gif') )
            {
                exit("Le fichier n'est pas une image");
            }

            $name_file = $_FILES['fichier']['name'];

            if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
            {
                exit("Impossible de copier le fichier dans $content_dir");
            }

            echo "Le fichier a bien été uploadé";
        }


        }

        App::view('post', 'new', NULL);

      } else {

        require '../Controller/ErrorController.php';
        echo ErrorController::getError('permission');

      }

    } else {

      require '../Controller/ErrorController.php';
      echo ErrorController::getError(401);

    }


  }

  public function Delete($postID){

    $posts = new PostModel();
    $post = $posts->DeletePost($postID);

  }

}

?>
