<?php
require_once '../class/loader.php';

$controller = $_GET['controller'];

loader::controllerLoader($controller);
