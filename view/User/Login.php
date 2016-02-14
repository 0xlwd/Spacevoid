<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
    <link href="<?= App::css("StyleUser");?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <a href="../../public/index.php" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>
    <div class="container">
      <div class="title">
      <h1 class="fadeInUp">Bienvenue</h1>
      </div>
      <form action="/user/connect" method="post" class="formlogin">
        <div class="formdivlogin">
        <input type="text" name="login" class="login" placeholder="Login">
        <input type="password" name="password" class="password" placeholder="Password">
        </div>
        <div class="divbtn">
          <input type="submit" value="Connexion" class="btn">
          <a href="../../register" class="btn">S'inscrire</a>
        </div>
      </form>
    </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  </body>
</html>
