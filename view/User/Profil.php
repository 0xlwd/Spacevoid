<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $data['title'] ?></title>
    <link href="<?= App::css("StyleUser");?>" rel="stylesheet">
  </head>
  <body>
  <div class="header">
    <a href="../../public/index.php" class="accueil"><img src="../../public/img/logospacevoid.png" class="logospace"></a>
  </div>
  <div class="container">
    <div class="title">
      <h1 class="fadeInUp">Bienvenue, <?= $data['user']['firstname'] ?></h1>
    </div>
    <ul>
      <li><div class="profile">
          <h1>Profil</h1>
          Vous avez le rang de : <?=$data['user']['role'] ?><br>
          Pseudo : <?= $data['user']['login'] ?><br>
          Nom : <?= $data['user']['lastname'] ?><br>
          Prénom : <?= $data['user']['firstname'] ?><br>
          Description : <?= $data['user']['description'] ?><br>
          Mail : <?= $data['user']['mail'] ?><br>
        </div>
      </li>
      <li>
        <div class="profilearticle">
          <h2>Vos articles</h2>
          <div class="article">
            <?php foreach ($data['posts'] as $post) {?>
              <a href="./post/<?= $post['id'] ?>"><?= $post['title'] ?> </a>
              <a href="./post/delete/<?= $post['id'] ?>">Supprimer </a>
              <a href="./post/edit/<?= $post['id'] ?>">Éditer</a>
              <br>
            <?php } ?>
            <a href="./post/new" class="btn">Poster un nouvel article</a>
          </div>
        </div>
      </li>
      <li>
        <div class="editprofile">
          <h2>Modifier votre profil</h2>
          <form action="profile" method="post">
            <label for="login">Login</label>
            <input id="login" type="text" name="login" value="<?= $data['user']['login'] ?>"><br>
            <label for="firstname">First Name</label>
            <input id="firstname" type="text" name="firstname" value="<?=$data['user']['firstname']?>"><br>
            <label for="lastname">Last Name</label>
            <input id="lastname" type="text" name="lastname" value="<?=$data['user']['lastname']?>"><br>
            <label for="description">Description</label>
            <input id="description" type="text" name="description" value="<?=$data['user']['description']?>"><br>
            <label for="email">Email : </label>
            <input id="email" type="email" name="mail" value="<?=$data['user']['mail']?>"><br>
            <label for="password">password : </label>
            <input id="password" type="password" name="password" value="">
            <input type="submit" name="name" value="Enregistrer" class="btn">
          </form>
        </div>
      </li>
    </ul>
    <div class="disconnectdiv">
    <a href="/user/disconnect" class="disconnectbtn">Se déconnecter</a>
    </div>
  </div>
  <div class="footer">
    SpaceVoid &copy; <?= date('Y'); ?>
  </div>
  </body>
</html>
