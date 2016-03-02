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
    <a href="../../public/index.php" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>
  <div class="container">
    <div class="title">
      <h1 class="fadeInUp">Nouvel article</h1>
    </div>
    <div class="formdiv">
      <form method="post" action="../post/new" enctype="multipart/form-data">
        <input type="text" name="title" class="titlepost" placeholder="Titre"><br>
        <textarea name="content" rows="8" cols="40" class="textpost" placeholder="Contenu de l'article"></textarea><br>
        <label for="file" class="filebtnlabel">Choisissez une image de couverture</label>
        <input type="file" name="post_cover" class="filebtn" size="30" id="file"><br>
        <span>Date : <b><?= date("d.m.Y") ?></b></span><br>
        <input type="submit" name="name" class="btn" value="Envoyer">
      </form>
    </div>
  </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  </body>
</html>
