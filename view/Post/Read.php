<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=0.20, initial-scale=1.0">
    <title><?= $data['title'] . $data['posts']['title'] ?></title>
    <link href="<?= App::css("StylePost");?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <a href="../../" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>
  <div class="container">
    <div class="post">
      <img src="<?= App::img($data['posts']['post_cover']); ?>" alt="<?= $data['posts']['title'] ?>" />
      <h1><?= $data['posts']['title'] ?></h1>
      <p class="contentpost"><?= $data['posts']['content'] ?></p>
      <span>Posté le <b><?= $data['posts']['post_date'] ?></b> par <b><?= $data['author']['login'] ?></b></span>
    </div>
    <div class="comments">
      <h3>Commentaires</h3>
      <?php foreach ($data['comments'] as $comments) { ?>
        <h4><?= $comments['user_related_id'] ?> a dit :</h4>
        <p class="paracomments"><?= $comments['content'] ?></p>
      <?php } ?>
    </div>
    <?php if($data['connected'] == true){ ?>
        <div class="formread">
          <form method="post" id="newComment">
            <h3>Nouveau commentaire :</h3>
            <textarea name="content" class="newcomms" rows="20" cols="80" placeholder="Commentaire"></textarea>
            <br>
            <input type="text" name="post_id" value="<?= $data['posts']['id']?>" hidden>
            <input type="text" name="user_id" value="<?= $data['current_user'] ?>" hidden>
            <input type="submit" name="submit" class="btn" value="Envoyer">
          </form>
        </div>
    <?php } else { ?>
      <p>
        Veuillez vous connecter pour poster un commentaire : <a href="../../login">Connexion</a>
      </p>
    <?php } ?>
  </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  <script src="<?= App::js("jquery-2.2.0.min") ?>"></script>
  <script src="<?= App::js("Post") ?>"></script>
  </body>
</html>
