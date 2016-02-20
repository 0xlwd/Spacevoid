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
    <form data-postid="<?= $data['posts']['id'] ?>" enctype="multipart/form-data" id="editPost">
      <input type="text" name="title" value="<?= $data['posts']['title'] ?>" id="title"><br>
      <textarea name="content" rows="40" cols="100" id="content">
        <?= utf8_encode($data['posts']['content']) ?>
      </textarea><br>
      <input type="file" name="post_cover" size="30" id="file">
      <span>Date de publication : <b><?= $data['posts']['post_date'] ?></b></span>
      <input type="submit" name="name" value="Envoyer">
    </form>
  </div>
  <div class="footer">
    &copy;<?= date('Y'); ?>
  </div>
  <script src="<?= App::js("jquery-2.2.0.min") ?>"></script>
  <script src="<?= App::js("Post") ?>"></script>
  </body>
</html>
