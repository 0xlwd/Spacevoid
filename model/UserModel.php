<?php
require_once("DataBase/config.php");
class UserModel{
    public function CreateUser($login, $password, $mail, $description, $firstname, $lastname, $role){
        global $pdo;
        $database = $pdo->prepare("INSERT INTO `user`(`login`, `password`, `mail`,
                          `description`, `firstname`, `lastname`, `role`)
                          VALUES (:login,:password,:mail,:description,:firstname,
                          :lastname,:role)");
        $database->bindParam("login",$login);
        $database->bindParam("password",$password);
        $database->bindParam("mail",$mail);
        $database->bindParam("description",$description);
        $database->bindParam("firstname",$firstname);
        $database->bindParam("lastname",$lastname);
        $database->bindParam("role",$role);
        $database->execute();
    }

    public function GetUser($id){
        global $pdo;
        $database = $pdo->prepare("SELECT id FROM user
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
    }

    public function UpdateUser($login, $password, $mail, $description, $firstname, $lastname, $role){
        global $pdo;
        $database = $pdo->prepare("UPDATE `user` SET `login`= :login,`password`= :password,`mail`= :mail,`description`= :description,
                          `firstname`= :firstname,`lastname`= :lastname,`role`= :role");
        $database->bindParam("login",$login);
        $database->bindParam("password",$password);
        $database->bindParam("mail",$mail);
        $database->bindParam("description",$description);
        $database->bindParam("firstname",$firstname);
        $database->bindParam("lastname",$lastname);
        $database->bindParam("role",$role);
        $database->execute();
    }

    public function DeleteUser($id){
        global $pdo;
        $database = $pdo->prepare("DELETE * FROM user
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
    }
}