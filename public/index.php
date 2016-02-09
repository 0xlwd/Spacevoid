<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
//Calling the routes class
session_start();
require_once '../class/Routes.php';
require_once '../class/App.php';

$Routes = new Routes();
//If the user as not set a the controller, we call the homepage.
if(!isset($_GET['controller']) && isset($_GET['action'])){

  $Routes->getController('Page', $_GET['action']);

} elseif (!isset($_GET['controller']) && !isset($_GET['action'])){

  $Routes->getController('Post', 'home', NULL);

} elseif (isset($_GET['id']) && isset($_GET['controller']) && isset($_GET['action'])) {

  $Routes->getController($_GET['controller'], $_GET['action'], $_GET['id']);

} else {

  //If the user as set a controller we call the static function controllerLoader of the loader class to get the appropriate controller
  $controller = $_GET['controller'];
  $action = $_GET['action'];
  $Routes->getController($controller, $action, NULL);

}
