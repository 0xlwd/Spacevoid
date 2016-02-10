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
    <h1>Profil</h1>
      Bienvenue sur votre profil <?=$data['user']['firstname']?> <br>
      Vous avez le rang de : <?=$data['user']['role'] ?><br>
      Pseudo : <?= $data['user']['login'] ?><br>
      Nom : <?= $data['user']['lastname'] ?><br>
      Prénom : <?= $data['user']['firstname'] ?><br>
      Description : <?= $data['user']['description'] ?><br>
      Mail : <?= $data['user']['mail'] ?><br>

      <h2>Vos articles</h2>

      <div class="article">
        <?php foreach ($data['posts'] as $post) {?>
          <a href="./post/<?= $post['id'] ?>"><?= $post['title'] ?> </a>
          <a href="./post/delete/<?= $post['id'] ?>">Supprimer </a>
          <a href="./post/edit/<?= $post['id'] ?>">Éditer</a>
          <br>
        <?php } ?>
        <a href="./post/new">Poster un nouvel article</a>
      </div>

      <h2>Modifier votre profil</h2>
      <form action="profile" method="post">
        <label for="login">Login</label>
        <input id="login" type="text" name="login" value="<?= $data['user']['login'] ?>"><br>
        <label for="firstname">First Name</label>
        <input id="firstname" type="text" name="firstname" value="<?=$data['user']['firstname']?>"><br>
        <label for="lastname">Last Name</label>
        <input id="lastname" type="text" name="lastname" value="<?=$data['user']['lastname']?>"><br>
        <label for="description">Description</label>
        <input id="description" type="text" name="description" value="<?=$data['user']['description']?>"><br>
        <label for="email">Email : </label>
        <input id="email" type="email" name="mail" value="<?=$data['user']['mail']?>"><br>
        <label for="password">password : </label>
        <input id="password" type="password" name="password" value="">
        <input type="submit" name="name" value="Enregistrer">
      </form>
      <a href="/user/disconnect">Se déconnecter</a>
  </div>
  <div class="footer">
    &copy;<?= date('Y'); ?>
  </div>
  </body>
</html>
