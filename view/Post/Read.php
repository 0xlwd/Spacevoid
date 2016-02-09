<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="post">
      <h1><?= $data['title'] ?></h1>
      <p><?= utf8_encode($data['content']) ?></p>
      <span>Date de publication : <b><?= $data['post_date'] ?></b></span>
    </div>
  </body>
</html>
