<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
  </head>
  <body>

    <?php foreach($data['posts'] as $post) { ?>
      <div class="post">
        <img src="<?= App::img($post['post_cover']); ?>" alt="<?= utf8_encode($post["title"]) ?>">
        <h1><a href="post/<?= $post["id"] ?>"><?= utf8_encode($post["title"]) ?> </a></h1><br>
        <p><?= utf8_encode($post["content"]) ?><p><br>
        <span>Date de publication : </span> <b><?= utf8_encode($post["post_date"]) ?></b>
     </div>
     <?php } ?>



  </body>
</html>
