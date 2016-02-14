<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
    <link href="<?= App::css("StylePost");?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">

  </div>
  <div class="sidebar">

  </div>
  <div class="container">
    <form method="post" action="../post/new" enctype="multipart/form-data">
      <input type="text" name="title" placeholder="Titre"><br>
      <textarea name="content" rows="8" cols="40" placeholder="Contenu de l'article"></textarea><br>
      <input type="file" name="post_cover" size="30">
      <span>Date : <b><?= date("d.m.Y") ?></b></span>
      <input type="submit" name="name" value="Envoyer">
    </form>
  </div>
  <div class="footer">
    &copy;<?= date('Y'); ?>
  </div>
  </body>
</html>
