<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=0.20, initial-scale=1.0">
    <title><?= $data['title'] ?></title>
    <link href="<?= App::css("StyleDashboard");?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <a href="../../" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>

  <div class="container">
    <h1>Dashboard</h1>
    <h2>Liste des articles</h2>
    <div class="posts">
      <table>
        <tr>
          <th>
            Titre
          </th>
          <th>
            Contenu
          </th>
          <th>
            Actions
          </th>
        </tr>
      <?php foreach ($data['posts'] as $post) {?>
        <tr>
          <td>
            <a href="../../post/<?= $post['id'] ?>"><?= $post['title'] ?></a>
          </td>
          <td>
            <span><?= $post['content'] ?></span>
          </td>
          <td>
            <a href="../../post/delete/<?= $post['id'] ?>" class="action-btn">Supprimer</a>
            <a href="../../post/edit/<?= $post['id'] ?>" class="action-btn">Éditer</a>
          </td>
        </tr>

      <?php } ?>
      </table>
    </div>
    <h2>Liste des utilisateurs</h2>
    <div class="users">
      <table>
        <tr>
          <th>
            ID
          </th>
          <th>
            Avatar
          </th>
          <th>
            Pseudo
          </th>
          <th>
            Nom
          </th>
          <th>
            Prénom
          </th>
          <th>
            Role
          </th>
          <th>
            Email
          </th>
          <th>
            Dernière connexion
          </th>
          <th>
            Action
          </th>
        </tr>
        <?php foreach ($data['users'] as $user) {?>
        <tr>
          <td>
            <?= $user['id'] ?>
          </td>
          <td>
            <img src="http://www.gravatar.com/avatar/<?= md5($user['mail']) ?>" alt="Avatar" />
          </td>
          <td>
            <?= $user['login'] ?>
          </td>
          <td>
            <?= $user['lastname'] ?>
          </td>
          <td>
            <?= $user['firstname'] ?>
          </td>
          <td>
            <?= $user['role'] ?>
          </td>
          <td>
            <?= $user['mail'] ?>
          </td>
          <td>
            <?= $user['last_login'] ?>
          </td>
          <td>
            <a href="../../user/delete/<?= $user['id'] ?>" class="action-btn">Supprimer</a><br>
          </td>

        </tr>
        <?php } ?>
      </table>
    </div>
    <h2>Liste des commentaires</h2>
    <div class="comments">
      <table>
        <tr>
          <th>
            Article
          </th>
          <th>
            Contenu
          </th>
          <th>
            Action
          </th>
        </tr>
        <?php foreach ($data['comments'] as $comment) {?>
        <tr>
          <td>
            <?= $comment['post_related_id'] ?>
          </td>
          <td>
            <?= substr($comment['content'], 0, 500) . '...' ?>
          </td>
          <td>
            <a href="../../post/deletecomment/<?= $comment['id'] ?>" class="action-btn">Supprimer</a><br>
          </td>
        </tr>
        <?php } ?>
      </table>

    </div>
  </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  </body>
</html>
