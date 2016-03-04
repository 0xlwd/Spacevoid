<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=0.20, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link href="<?= App::css("StylePost");?>" rel="stylesheet">
    <link href="<?= App::css("yellow-text-default") ?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <a href="../../" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>
  <div class="container">
    <div class="title">
      <h1 class="fadeInUp">Nouvel article</h1>
    </div>
    <div class="formdiv">
      <span class="errors"></span>
      <form method="post" id="newPost" enctype="multipart/form-data">
        <input type="text" name="title" class="titlepost" id="title" placeholder="Titre"><br>
        <textarea name="content" rows="8" cols="40" class="textpost" id="content" placeholder="Contenu de l'article"></textarea><br>
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
  <script src="<?= App::js("jquery-2.2.0.min") ?>"></script>
  <script src="<?= App::js("Post") ?>"></script>
  <script src="<?= App::js('yellow-text.min') ?>"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#content").YellowText({

    });
  });
  </script>
  </body>
</html>
