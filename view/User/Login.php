<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
  </head>
  <body>
    <form action="/user/connect" method="post">
      <input type="text" name="login" placeholder="Login">
      <input type="password" name="password" placeholder="Password">
      <input type="submit" value="Connexion">
    </form>
  </body>
</html>
