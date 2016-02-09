<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="title" placeholder="Titre"><br>
      <textarea name="name" rows="8" cols="40" placeholder="Contenu de l'article"></textarea><br>
      <span>Date : <b><?= date("d.m.Y") ?></b></span>
    </form>
  </body>
</html>
