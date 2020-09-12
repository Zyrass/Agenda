<?php
  $pageName = "Accueil";
  include_once('./includes/header.php');
  include_once('./bdd/connexion.php');

  // Requête SQL
  $select_sql = 'SELECT * FROM contact ORDER BY nom ASC';
  $ask = $pdo->prepare( $select_sql );

  // Exécution de la requête
  $ask->execute();

  // Récupération de toutes les données
  $resultat = $ask->fetchAll(PDO::FETCH_ASSOC);
?>

  <h1>Zyrass - Agenda</h1>

  <div class="container">

    <div class="row mt-5 ml-5">

      <!-- col-sm -->
      <div class="col-sm">
        <button id="btnAdd" class="btn btn-sm btn-success">
          Ajouter un nouveau contact
        </button>
      </div>
    </div> <!-- /.row -->

    <div class="row mt-2 ml-5">
      <!-- col-sm -->
      <div class="col-sm">
        <h2 class="text-white text-right text-uppercase">Liste des contacts</h2>
      </div> <!-- /.col-sm -->

    </div> <!-- /.row -->

    <div class="row mt-2 ml-5 mb-5">

      <!-- col-sm -->
      <div class="col-sm">

        <table class="mt-3 table table-sm table-light table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nom</th>
              <th scope="col">Prénom</th>
              <th scope="col">Téléphone</th>
              <th scope="col">Email</th>
              <th scope="col">Modification</th>
              <th scope="col">supression</th>
            </tr>
          </thead>
          <tbody>

          <?php foreach ($resultat as $data) : ?>
            <tr>
              <th>Z.A.<?= $data['id'] ?></th>
              <td class="text-capitalize"><?= $data['nom'] ?></td>
              <td class="text-capitalize"><?= $data['prenom'] ?></td>
              <td><?= $data['tel'] ?></td>
              <td><?= $data['mail'] ?></td>
              <td>
                <a
                  href="update.php?identifiant=<?= $data['id'] ?>"
                  id="btnUpdate"
                  class="btn btn-warning btn-sm btn-block"
                >Modifier</a>
              </td>
              <td>
                <a
                  href="traitements/traitements_delete.php?identifiant=<?= (int)$data['id'] ?>"
                  id="btnDelete"
                  class="btn btn-sm btn-danger btn-block"
                >&times;</a>
              </td>
            </tr>
          <?php endforeach ?>
          </tbody>
        </table>

        <?php if ($resultat === []) : ?>
        <div class="alert alert-info">
          <strong>Votre agenda est actuellement vide.</strong>
        </div>
        <?php else : ?>
        <div class="alert alert-warning">
          <strong>Toutes les données visible la toute 1ère fois ont été enregistré au hasard dans la base de donnée.</strong>
        </div>
        <?php endif ?>

      </div> <!-- /.col-sm -->
    </div> <!-- /.row -->

  </div>

  <script>
    const btnAdd    = document.querySelector("#btnAdd");
    const btnUpdate = document.querySelector("#btnUpdate");
    const btnDelete = document.querySelector("#btnDelete");

    btnAdd.addEventListener('click', $e => {
      document.location.href = "http://localhost/projet_agenda/add.php";
    });
    btnUpdate.addEventListener('click', $e => {
      document.location.href = "http://localhost/projet_agenda/update.php";
    });
    btnDelete.addEventListener('click', $e => {
      document.location.href = "http://localhost/projet_agenda/delete.php";
    });

  </script>

<?= include_once('./includes/footer.php'); ?>