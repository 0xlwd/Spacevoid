<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Profil</h1>
    <p>
      Bienvenue sur votre profil.
      <?= $userinfos['login'] ?>
      <a href="/user/disconnect">Se déconnecter</a>
    </p>
  </body>
</html>
