<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=0.20, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link href="<?= App::css("StylePost");?>" rel="stylesheet">
  </head>
  <body>
  <div class="headerindex">
    <div class="divbtn">
      <?php if($data['connected']){ ?>
      <a href="../../profile" class="headerbtn">Profil</a>
      <?php } else {?>
        <a href="../../login" class="headerbtn">Connexion</a>
        <a href="../../register" class="headerbtn">Inscription</a>
      <?php } ?>
    </div>
    <a href="../../" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospaceindex"></a>
  </div>
  <div class="containerindex">
    <?php foreach($data['posts'] as $post) { ?>
      <div class="post">
        <img src="<?= App::img($post['post_cover']); ?>" alt="<?= utf8_encode($post["title"]) ?>">
        <h1 class="titlepostindex"><a href="post/<?= $post["id"] ?>" class="postlinks"><?= utf8_encode($post["title"]) ?> </a></h1><br>
        <span>Date de publication : </span> <b><?= utf8_encode($post["post_date"]) ?></b>
        <p class="contentpostindex"><?= substr($post["content"], 0, 350).'...' ?><p><br>
        <a href="post/<?= $post["id"] ?>" class="readpostbtn">Lire la suite</a>
     </div>
    <?php } ?>
  </div>
  <div class="footer">
  SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  </body>
</html>
