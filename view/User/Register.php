<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
  </head>
  <body>
    <form action="../../register" method="post">
      <input type="text" name="login" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="email" name="mail" placeholder="Email">
      <input type="submit" name="name" value="Envoyer">
    </form>
  </body>
</html>
