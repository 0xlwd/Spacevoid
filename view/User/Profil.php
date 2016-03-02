<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, minimum-scale=0.20, initial-scale=1.0">
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
          <h1 class="titlediv">Profil</h1>
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
          <h1 class="titlediv">Vos articles</h1>
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
          <h1 class="titlediv">Modifier votre profil</h1>
          <form action="profile" method="post">
            <label for="login">Login :
              <input id="login" type="text" name="login" class="forminput" value="<?= $data['user']['login'] ?>"><br>
            </label>

            <label for="firstname">First Name :
              <input id="firstname" type="text" name="firstname" class="forminput" value="<?=$data['user']['firstname']?>"><br>
            </label>

            <label for="lastname">Last Name :
              <input id="lastname" type="text" name="lastname" class="forminput" value="<?=$data['user']['lastname']?>"><br>
            </label>

            <label for="description">Description :
              <input id="description" type="text" name="description" class="forminput" value="<?=$data['user']['description']?>"><br>
            </label>

            <label for="email">Email :
              <input id="email" type="email" name="mail" class="forminput" value="<?=$data['user']['mail']?>"><br>
            </label>

            <label for="password">password :
              <input id="password" type="password" name="password" class="forminput" value="">
            </label>
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
