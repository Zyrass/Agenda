<?php
  $pageName = "Modification";

  $id = (int)$_GET['identifiant'];

  if ( isset($id) && !empty($id) ) {

    // Connexion à la base de donnée
    require_once('./bdd/connexion.php');

    // Traitement de la requête
    $select_avant_update = 'SELECT * FROM contact WHERE id=:id LIMIT 1';
    $ask = $pdo->prepare($select_avant_update);

    // Liaison du marqueur :id
    $ask->bindValue(':id', $id, PDO::PARAM_INT);

    // Exécution de la requête
    $executeIsOk = $ask->execute();

    // Vérification de la requête
    if ($executeIsOk) {
      $message = "Contact sélectionné avec succès";
    } else {
      $message = "Le contact n'a pas été sélectionné correctement";
    }

    // Récupération de la data
    $resultat = $ask->fetch(PDO::FETCH_ASSOC);

  } else {
    header("Location: index.php");
  }

  include_once('./includes/header.php');
?>

  <h1>Zyrass - Agenda</h1>

  <div class="container">

    <div class="row">
      <div class="ml-5 mt-5 col-sm">
        <h2 class="text-uppercase text-white text-right">Modification : <span class="text-dark"><?= $resultat['prenom'] ?> <?= $resultat['nom'] ?></span> ?</h2>
      </div>
    </div> <!-- /.row -->

    <div class="row">
      <div class="mt-5 ml-5 col-sm">
        <form action="traitements/traitements_update.php" method="post">

          <?php # Id - (invisible à l'utilisateur) ?>
          <input
            type="hidden"
            class="form-control"
            name="identifiant"
            value="<?= $resultat['id'] ?>"
          >

          <?php # Nom ?>
          <div class="form-group">
            <label for="lastname" class="text-white">Nom</label>
            <input
              type="text"
              class="form-control"
              id="lastname"
              placeholder="50 caractères maximum"
              name="lastname"
              tabindex="1"
              value="<?= $resultat['nom'] ?>"
            />
          </div>

          <?php # Prénom ?>
          <div class="form-group">
            <label for="firstname" class="text-white">Prénom</label>
            <input
              type="text"
              class="form-control"
              id="firstname"
              placeholder="50 caractères maximum"
              name="firstname"
              tabindex="2"
              value="<?= $resultat['prenom'] ?>"
            />
          </div>

          <?php # Téléphone ?>
          <div class="form-group">
            <label for="phone" class="text-white">Téléphone</label>
            <input
              type="tel"
              class="form-control"
              id="phone"
              placeholder="Format requis : 0600000000"
              name="phone"
              tabindex="3"
              value="<?= $resultat['tel'] ?>"
            />
          </div>

          <?php # Email ?>
          <div class="form-group">
            <label for="mail" class="text-white">E-mail</label>
            <input
              type="email"
              class="form-control"
              id="mail"
              placeholder="255 caractères maximum"
              name="mail"
              tabindex="4"
              value="<?= $resultat['mail'] ?>"
            />
          </div>

          <div class="buttons-form">
            <button type="submit" name="done" class="mt-5 btn btn-warning">Enregistré la modification</button>
            <button type="reset" class="mt-5 btn btn-danger">Effacer</button>
          </div>


        </form>
      </div>
    </div> <!-- /.row -->

  </div> <!-- /.container -->

<?= include_once('./includes/footer.php'); ?>