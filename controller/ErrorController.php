<?php

class ErrorController {

  static function getError($errorCode) {
      if ($errorCode == 404) {
        http_response_code(404);
        return 'Error 404 : The page you are looking for was not found';
      }
  }

}
