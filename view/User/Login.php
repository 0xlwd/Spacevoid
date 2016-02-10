<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
    <link href=<? App::css("StyleUser");?>>
  </head>
  <body>
  <div class="header">

  </div>
  <div class="sidebar">

  </div>
    <div class="container">
      <form action="/user/connect" method="post">
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Connexion">
      </form>
    </div>
  <div class="footer">
    &copy;<?= date('Y'); ?>
  </div>
  </body>
</html>
