<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <input type="text" name="title" value=" <?= $data['title'] ?> "><br>
      <textarea name="name" rows="40" cols="100">
        <?= utf8_encode($data['content']) ?>
      </textarea><br>
      <span>Date de publication : <b><?= $data['post_date'] ?></b></span>
    </form>
  </body>
</html>
