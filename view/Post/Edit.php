<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
    <link href=<? App::css("StylePost");?>>
  </head>
  <body>
  <div class="header">

  </div>
  <div class="sidebar">

  </div>
  <div class="container">
    <form method="post" action="../../post/edit/<?= $data['posts']['id'] ?>" enctype="multipart/form-data">
      <input type="text" name="title" value=" <?= $data['posts']['title'] ?> "><br>
      <textarea name="content" rows="40" cols="100">
        <?= utf8_encode($data['posts']['content']) ?>
      </textarea><br>
      <input type="file" name="post_cover" size="30">
      <span>Date de publication : <b><?= $data['posts']['post_date'] ?></b></span>
      <input type="submit" name="name" value="Envoyer">
    </form>
  </div>
  <div class="footer">
    &copy;<?= date('Y'); ?>
  </div>
  </body>
</html>
