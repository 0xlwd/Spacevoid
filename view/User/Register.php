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
      <form action="../../register" method="post" class="formregister">
        <div class="formdivregister">
        <input type="text" name="login" class="login" placeholder="Username">
        <input type="password" name="password" class="password" placeholder="Password">
        <input type="email" name="mail" class="email" placeholder="Email">
          <div class="divbtn">
          <input type="submit" name="name" value="Envoyer" class="btn">
          <a href="../../login" class="btn">Se connecter</a>
        </div>
        </div>
      </form>
    </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  </body>
</html>
