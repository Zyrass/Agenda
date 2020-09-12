<?php

$id = (int)$_GET['identifiant'];

var_dump($id);

if (isset($id) && !empty($id)) {

  # Connexion à la base de donnée (fichier à créer)
  include_once('../bdd/connexion.php');

  # Requête d'insertion
  $delete_sql = 'DELETE FROM contact WHERE id=:id';
  $ask = $pdo->prepare( $delete_sql );

  # Liaison sur la requête avec le marqueur :id
  $ask->bindValue(':id', $id, PDO::PARAM_INT);

  # Exécution de la requête
  $executeIsOk = $ask->execute();

  if ($executeIsOk) {
    $message = "Le contact a bien été supprimé avec succès!";
  } else {
    $message = "Le contact n'a pas été supprimé de la base de donnée.";
  }

  # Fermeture de la connexion
  $ask->closeCursor();

  # Si tout va bien, on redirige directement vers la page d'accueil.
  header("Location: ../index.php");

} else {
  header("Location: ../index.php");
  var_dump("Je suis là");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Info : Erreur Traitements</title>
</head>
<body>
  <?= $message ?>
</body>
</html>
