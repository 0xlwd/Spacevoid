<?php
session_start();
require_once '../class/Routes.php';
require_once '../class/App.php';

$Routes = new Routes();
if(!isset($_GET['controller']) && isset($_GET['action'])){

  $Routes->getController('Page', $_GET['action']);

} elseif (!isset($_GET['controller']) && !isset($_GET['action'])){

  $Routes->getController('Post', 'home', NULL);

} elseif (isset($_GET['id']) && isset($_GET['controller']) && isset($_GET['action'])) {

  $Routes->getController($_GET['controller'], $_GET['action'], $_GET['id']);

} else {

  $controller = $_GET['controller'];
  $action = $_GET['action'];
  $Routes->getController($controller, $action, NULL);

}
