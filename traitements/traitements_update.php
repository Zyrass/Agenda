<?php

echo "<pre>";
print_r( $_POST );
echo "</pre>";

$id = (int)$_POST['identifiant'];
$nom = (string)htmlspecialchars($_POST['lastname']);
$prenom = (string)htmlspecialchars($_POST['firstname']);
$tel = (string)htmlspecialchars($_POST['phone']);
$mail = (string)htmlspecialchars($_POST['mail']);

if (
  isset($nom) && isset($prenom) && isset($tel) && isset($mail) &&
  !is_null($nom) && !is_null($prenom) && !is_null($tel) && !is_null($mail)
) {

  global $id, $nom, $prenom, $tel, $mail;

  var_dump($id, $nom, $prenom, $tel, $mail);

  $message_1 = "On peut se connecter à la base de donnée tout est OK";

  // Connexion à la base de donnée
  require_once('../bdd/connexion.php');
  $message_2 = "Connexion établie avec succès";

  // Requête sql
  $update_sql = 'UPDATE contact SET nom=:nom, prenom=:prenom, tel=:tel, mail=:mail WHERE id=:id LIMIT 1';
  $ask = $pdo->prepare( $update_sql );

  // Liaison des marqueurs
  $ask->bindValue(':id', $id, PDO::PARAM_INT);
  $ask->bindValue(':nom', $nom, PDO::PARAM_STR);
  $ask->bindValue(':prenom', $prenom, PDO::PARAM_STR);
  $ask->bindValue(':tel', $tel, PDO::PARAM_STR);
  $ask->bindValue(':mail', $mail, PDO::PARAM_STR);

  // Exécution
  $executeIsOk = $ask->execute();

  // Vérification de la bonne exécution
  if ($executeIsOk) {
    $message_3 = "Le contact a bien été mis à jours";
  } else {
    $error_message_2 = "Le contact n'a malheureusement pas été mis à jours";
  }


  // Si tout est OK on redirige vers la page d'accueil
  header("Location: ../index.php");
  $message_4 = "Tout est Ok redirection vers la page d'accueil à décommenter";

} else {
  $error_message_1 = "Nous avons un problème la redirection est imminente";
  header("Location: ../update.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Traitement Update</title>
</head>
<body>
  <h1>Contrôle Traitement Update</h1>

  <h2>Success</h2>
  <ol>
    <li><?= $message_1 ?></li>
    <li><?= $message_2 ?></li>
    <li><?= $message_3 ?></li>
    <li><?= $message_4 ?></li>
  </ol>

  <h2>Errors</h2>
  <ol>
    <li><?= $error_message_1 ?></li>
    <li><?= $error_message_2 ?></li>
  </ol>
</body>
</html>