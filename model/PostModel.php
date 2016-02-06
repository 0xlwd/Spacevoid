<?php
require_once("DataBase/config.php");
class PostModel{
    public function CreatePost($title, $content, $user_related_id){
        global $pdo;
        $database = $pdo->prepare("INSERT INTO `posts`(`title`, `content`, `user_related_id`)
                          VALUES (:title,:content,:user_related_id)");
        $database->bindParam("title",$title);
        $database->bindParam("content",$content);
        $database->bindParam("user_related_id",$user_related_id);
        $database->execute();
    }

    public function GetPost($id){
        global $pdo;
        $database = $pdo->prepare("SELECT id FROM `posts`
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
    }

    public function UpdatePost($title, $content, $user_related_id){
        global $pdo;
        $database = $pdo->prepare("UPDATE `posts`
                          SET `title`= :title,`content`= :content,`user_related_id`= :user_related_id");
        $database->bindParam("title",$title);
        $database->bindParam("content",$content);
        $database->bindParam("user_related_id",$user_related_id);
        $database->execute();
    }

    public function DeletePost($id){
        global $pdo;
        $database = $pdo->prepare("DELETE * FROM `posts`
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
    }
}