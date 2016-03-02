<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=0.20, initial-scale=1.0">
    <title></title>
    <link href="<?= App::css("StyleDashboard");?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <a href="../../public/index.php" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>
  <div class="container">
    <div class="blockdiv">
      <h1 class="fadeInUp titledash">Dashboard</h1>
      <ul>
        <li>
          <div class="posts">
            <h2 class="title">Liste des articles</h2>
            <?php foreach ($data['posts'] as $post) {?>
              <a href="../../post/<?= $post['id'] ?>" class="postlinks"><?= $post['title'] ?></a>
              <a href="../../post/delete/<?= $post['id'] ?>" class="btn">Supprimer</a>
            <?php } ?>
          </div>
        </li>
        <li>
          <div class="users">
            <h2 class="title">Liste des utilisateurs</h2>
            <?php foreach ($data['users'] as $user) {?>
              <span class="userlist">Pseudo : <?= $user['login'] ?> -<br> ID Utilisateur : <?= $user['id'] ?> -<br> Role : <?= $user['role'] ?></span>
              <a href="../../user/delete/<?= $user['id'] ?>" class="btn">Supprimer</a><br>
            <?php } ?>
          </div>
        </li>
        <li>
          <div class="comments">
            <h2 class="title">Liste des commentaires</h2>
            <?php foreach ($data['comments'] as $comment) {?>
              <span class="articlecomment">Commentaire sur l'article : <b><?= $comment['post_related_id'] ?></b>.<br>
            Contenu : <?= substr($comment['content'], 0, 50) . '...' ?>
          </span>
              <a href="../../post/deletecomment/<?= $comment['id'] ?>" class="btn">Supprimer</a><br>
            <?php } ?>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  </body>
</html>
