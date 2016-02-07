<?php

class PostController {

  public function home() {

    require '../view/home.php';
    require '../model/PostModel.php';
    $posts = new PostModel();
    $post = $posts->GetAllPosts();
    while($data = $post->fetch()){
      echo '<h1><a href="post/'. $data['id'] .'">' . utf8_encode($data['title']) . '</a></h1><br>';
      echo '<p>' . utf8_encode($data['content']) . '<p><br>';
      echo 'Date de publication : <b>' . utf8_encode($data['post_date']) . '</b>';


    }
    //Display all the posts on the home page
  }

  public function readPost($postID) {

    require '../model/PostModel.php';
    $posts = new PostModel();
    $post = $posts->GetPost($postID);
    echo utf8_encode('<h1>' . $post['title'] . '</h1><br>' . $post['content'] . '<br><br>Date de publication : <b>' . $post['post_date'] . '</b>');

  }

  public function edit($postID) {
    require '../model/PostModel.php';
    $posts = new PostModel();
    $post = $posts->GetPost($postID);
    echo utf8_encode('<form name="edit"><input type="text" value="' . $post['title'] . '" name="title" />
    <br><textarea name="content" >' . $post['content'] . '</textarea><br><br>Date de publication : <b>' . $post['post_date'] . '</b>');

    //Display the page to edit a post
  }

  public function newPost(){

    //Display the page to create a new Post

  }

  public function delete($postID){

    //Call the POST MODEL to delete a Post

  }

}

?>
