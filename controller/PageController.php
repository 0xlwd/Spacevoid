<?php

class PageController {

  public function getPage($pageName) {

    require '../view/'.$pageName.'.php';

  }

}
