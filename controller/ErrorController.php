<?php

class ErrorController {

  static function getError($errorCode) {
      if ($errorCode == 400) {
        http_response_code(400);
        return 'Error 400 Bad Request : The informations you have sent are not correct';
      }
      if ($errorCode == 401) {
        http_response_code(401);
        return 'Error 401 Unauthorized : You must be logged in to access this page. <a href="/login">Log in</a>';
      }
      if ($errorCode == 403) {
        http_response_code(403);
        return 'Error 403 Forbidden : You cannot access this page';
      }
      if ($errorCode == 404) {
        http_response_code(404);
        return 'Error 404 Not found : The page you are looking for was not found.';
      }
  }

}
