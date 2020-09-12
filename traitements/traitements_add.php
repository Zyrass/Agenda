<?php

$lastname = strtolower(htmlspecialchars($_POST['lastname']));
$firstname = strtolower(htmlspecialchars($_POST['firstname']));
$phone = strtolower(htmlspecialchars($_POST['phone']));
$mail = strtolower(htmlspecialchars($_POST['mail']));

echo "<pre>";
var_dump($_POST);
var_dump($lastname, $firstname, $phone, $mail);
echo "</pre>";

if (empty($lastname) || empty($firstname) || empty($phone) || empty($mail)) {
  header("Location: ../add.php");
} else {

  # Connexion à la base de donnée (fichier à créer)
  include_once('../bdd/connexion.php');

  # Requête d'insertion
  $insert_sql = 'INSERT INTO contact VALUES (NULL, :nom, :prenom, :tel, :mail)';
  $ask = $pdo->prepare( $insert_sql );

  # Liaison des requêtes marqueurs
  $ask->bindValue(':nom', $lastname, PDO::PARAM_STR);
  $ask->bindValue(':prenom', $firstname, PDO::PARAM_STR);
  $ask->bindValue(':tel', $phone, PDO::PARAM_STR);
  $ask->bindValue(':mail', $mail, PDO::PARAM_STR);

  # Exécution de la requête
  $executeIsOk = $ask->execute();

  if ($executeIsOk) {
    $message = "Le contact a bien été ajouté avec succès!";
  } else {
    $message = "Le contact n'a pas été ajouté à la base de donnée.";
  }

  # Fermeture de la connexion
  $ask->closeCursor();

  # Si tout va bien, on redirige directement vers la page d'accueil.
  header("Location: ../index.php");

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

  <script>
    setTimeout(() => {
      document.location.href = "http://localhost/projet_agenda/";
    }, 2000)
  </script>
</body>
</html>
