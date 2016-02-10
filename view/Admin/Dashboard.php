<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href=<? App::css("StyleDashboard");?>>
  </head>
  <body>
  <div class="header">

  </div>
  <div class="sidebar">

  </div>
  <div class="container">
    <h1>Dashboard</h1>
    <h2>Liste des articles</h2>
    <div class="posts">
      <?php foreach ($data['posts'] as $post) {?>
        <a href="../../post/<?= $post['id'] ?>"><?= $post['title'] ?></a>
        <a href="../../post/delete/<?= $post['id'] ?>">Supprimer</a>
      <?php } ?>
    </div>
    <h2>Liste des utilisateurs</h2>
    <div class="users">
      <?php foreach ($data['users'] as $user) {?>
        <span>Pseudo : <?= $user['login'] ?> - ID Utilisateur : <?= $user['id'] ?> - Role : <?= $user['role'] ?></span>
        <a href="../../user/delete/<?= $user['id'] ?>">Supprimer</a><br>
      <?php } ?>
    </div>
    <h2>Liste des commentaires</h2>
    <div class="comments">
      <?php foreach ($data['comments'] as $comment) {?>
        <span>Commentaire sur l'article : <b><?= $comment['post_related_id'] ?></b>.
          Contenu : <?= substr($comment['content'], 0, 50) . '...' ?>
        </span>
        <a href="../../post/deletecomment/<?= $comment['id'] ?>">Supprimer</a><br>
      <?php } ?>
    </div>
  </div>
  <div class="footer">
    &copy;<?= date('Y'); ?>
  </div>
  </body>
</html>
