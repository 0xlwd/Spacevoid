<?php
require_once("DataBase/config.php");
class PostModel{
    public function CreatePost($title, $content, $user_related_id, $post_cover){
        global $pdo;
        $post_date = date('d.m.Y');
        $database = $pdo->prepare("INSERT INTO `posts`(`title`, `content`, `user_related_id`, `post_cover`, `post_date`)
                          VALUES (:title,:content,:user_related_id, :post_cover, :post_date)");
        $database->bindParam("title",$title);
        $database->bindParam("content",$content);
        $database->bindParam("user_related_id",$user_related_id);
        $database->bindParam("post_cover",$post_cover);
        $database->bindParam("post_date", $post_date);
        $database->execute();
    }

    public function GetPost($id){
        global $pdo;
        $database = $pdo->prepare("SELECT * FROM `posts`
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
        return $database->fetch();
    }

    public function GetUserPosts($userId){
      global $pdo;
      $database = $pdo->prepare("SELECT * FROM `posts`
                        WHERE `user_related_id` = :id");
      $database->bindParam("id",$userId);
      $database->execute();
      return $database;
    }

    public function UpdatePost($id, $title, $content, $post_cover){
        global $pdo;
        $database = $pdo->prepare("UPDATE `posts`
                          SET `title`= :title,`content`= :content, `post_cover` = :post_cover
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->bindParam("title",$title);
        $database->bindParam("content",$content);
        $database->bindParam("post_cover", $post_cover);
        $database->execute();
    }

    public function DeletePost($id){
        global $pdo;
        $database = $pdo->prepare("DELETE FROM `posts`
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
        var_dump($database);
    }

    public function GetAllPosts() {
      global $pdo;
      $database = $pdo->query("SELECT * FROM `posts` ORDER BY id DESC");
      return $database;

    }

}
