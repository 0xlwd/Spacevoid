<?php
require_once("DataBase/config.php");
class UserModel{
    public function CreateUser($login, $password, $mail, $description, $firstname, $lastname, $role, $signup_date){
        global $pdo;
        $database = $pdo->prepare("INSERT INTO `users`(`login`, `password`, `mail`,
                          `description`, `firstname`, `lastname`, `role`, `signup_date`)
                          VALUES (:login,:password,:mail,:description,:firstname,
                          :lastname,:role, :signup_date)");
        $database->bindParam("login",$login);
        $database->bindParam("password",$password);
        $database->bindParam("mail",$mail);
        $database->bindParam("description",$description);
        $database->bindParam("firstname",$firstname);
        $database->bindParam("lastname",$lastname);
        $database->bindParam("role",$role);
        $database->bindParam("signup_date",$signup_date);
        $database->execute();
    }

    public function GetUser($id){
        global $pdo;
        $database = $pdo->prepare("SELECT * FROM users
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
        return $database->fetch();
    }

    public function UpdateUser($id, $login, $password, $mail, $description, $firstname, $lastname){
        global $pdo;
        $database = $pdo->prepare("UPDATE `users` SET `login`= :login,`password`= :password,`mail`= :mail,`description`= :description,
                          `firstname`= :firstname,`lastname`= :lastname WHERE `id` = :id");
        $database->bindParam("login",$login);
        $database->bindParam("password",$password);
        $database->bindParam("mail",$mail);
        $database->bindParam("description",$description);
        $database->bindParam("firstname",$firstname);
        $database->bindParam("lastname",$lastname);
        $database->bindParam("id", $id);
        $database->execute();
    }

    public function DeleteUser($id){
        global $pdo;
        $database = $pdo->prepare("DELETE FROM users
                          WHERE `id` = :id");
        $database->bindParam("id",$id);
        $database->execute();
    }

    public function GetAllUsers(){
      global $pdo;
      $database = $pdo->query("SELECT * FROM users");
      return $database;
    }

    public function GetUserConnect($login, $password){
        global $pdo;
        $database = $pdo->prepare("SELECT * FROM users
                          WHERE `login` = :login AND `password` = :password");
        $database->bindParam("login",$login);
        $database->bindParam("password",$password);
        $database->execute();
        return $database;
    }

    public function UserConnectDate($date, $id){
      global $pdo;
      $database = $pdo->prepare("UPDATE `users` SET `last_login` = :last_login WHERE `id` = :id");
      $database->bindParam("last_login",$date);
      $database->bindParam("id",$id);
      $database->execute();
    }
}
