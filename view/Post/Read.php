<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] . $data['posts']['title'] ?></title>
    <link href=<? App::css("StylePost");?>>
  </head>
  <body>
  <div class="header">

  </div>
  <div class="sidebar">

  </div>
  <div class="container">
    <div class="post">
      <img src="<?= App::img($data['posts']['post_cover']); ?>" alt="<?= $data['posts']['title'] ?>" />
      <h1><?= $data['posts']['title'] ?></h1>
      <p><?= utf8_encode($data['posts']['content']) ?></p>
      <span>Posté le <b><?= $data['posts']['post_date'] ?></b> par <b><?= $data['author']['login'] ?></b></span>
    </div>
    <div class="comments">
      <h3>Commentaires</h3>
      <?php foreach ($data['comments'] as $comments) { ?>
        <p><?= $comments['content'] ?></p>
      <?php } ?>
    </div>
    <?php if($data['connected'] == true){ ?>
      <form action="../../post/comment" method="post">
        <textarea name="content" rows="20" cols="80" placeholder="Commentaire"></textarea>
        <input type="text" name="post_id" value="<?= $data['posts']['id']?>" hidden>
        <input type="text" name="user_id" value="<?= $data['current_user'] ?>" hidden>
        <input type="submit" name="submit" value="Envoyer">
      </form>
    <?php } else { ?>
      <p>
        Veuillez vous connecter pour poster un commentaire <a href="../../login">Connexion</a>
      </p>
    <?php } ?>
  </div>
  <div class="footer">
    &copy;<?= date('Y'); ?>
  </div>
  </body>
</html>
