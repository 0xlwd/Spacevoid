<?php

class PageController {

  static function getPage($pageName) {

    require '../view/'.$pageName.'.php';

  }

}
