<?php
require_once("DataBase/config.php");
class CommentModel{
    public function CreateComment($content, $post_related_id, $user_related_id){
        global $pdo;
        $database = $pdo->prepare("INSERT INTO `comments`(`content`, `post_related_id`, `user_related_id`)
                          VALUES (:content,:post_related_id,:user_related_id)");
        $database->bindParam("content",$content);
        $database->bindParam("post_related_id",$post_related_id);
        $database->bindParam("user_related_id",$user_related_id);
        $database->execute();
    }

    public function GetComment($id){
        global $pdo;
        $database = $pdo->prepare("SELECT `id`, `content`, `post_related_id`, `user_related_id` FROM `comments`
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
    }

    public function UpdateComment($content){
        global $pdo;
        $database = $pdo->prepare("UPDATE `comments`
                          SET `content`= :content");
        $database->bindParam("content",$content);
        $database->execute();
    }

    public function DeleteComment($id){
        global $pdo;
        $database = $pdo->prepare("DELETE FROM `comments`
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
    }

    public function GetAllComments(){
        global $pdo;
        $database = $pdo->query("SELECT * FROM `comments`");
        return $database;
    }

    public function GetAllCommentsFromPost($post_id){
        global $pdo;
        $database = $pdo->prepare("SELECT * FROM `comments` WHERE `post_related_id` = :post_related_id");
        $database->bindParam('post_related_id', $post_id);
        $database->execute();
        return $database;

    }
}
