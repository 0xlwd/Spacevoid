<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="title" placeholder="Titre"><br>
      <textarea name="content" rows="8" cols="40" placeholder="Contenu de l'article"></textarea><br>
      <input type="file" name="post_cover" size="30">
      <span>Date : <b><?= date("d.m.Y") ?></b></span>
      <input type="submit" name="name" value="Envoyer">
    </form>
  </body>
</html>
