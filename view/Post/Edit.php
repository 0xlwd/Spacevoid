<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=0.20, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link href="<?= App::css("StylePost");?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <a href="../../" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>
  <div class="container">
    <div class="title">
      <h1 class="fadeInUp">Modifier l'article</h1>
    </div>
    <div class="formdiv">
    <form method="post" action="../../post/edit/<?= $data['posts']['id'] ?>" enctype="multipart/form-data">
      <input type="text" name="title" class="titlepost" value=" <?= $data['posts']['title'] ?> "><br>
      <textarea name="content" class="textpost" rows="40" cols="100">
        <?= utf8_encode($data['posts']['content']) ?>
      </textarea><br>
      <input type="file" name="post_cover" class="filebtn" size="30">
      <span class="postingdate">Date de publication : <b><?= $data['posts']['post_date'] ?></b></span><br>
      <a href="../../public/index.php"><input type="submit" name="name" class="btn" value="Envoyer"></a>
    </div>
  </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  <script src="<?= App::js("jquery-2.2.0.min") ?>"></script>
  <script src="<?= App::js("Post") ?>"></script>
  </body>
</html>
