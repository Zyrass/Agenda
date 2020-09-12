<?php
  $pageName = "Nouveau contact";
  include_once('./includes/header.php');
?>

<h1>Zyrass - Agenda</h1>

<div class="container">

  <div class="row">
    <div class="ml-5 mt-5 col-sm">
      <h2 class="text-uppercase text-white text-right">Nouveau contact</h2>
    </div>
  </div> <!-- /.row -->

  <div class="row">
    <div class="mt-5 ml-5 col-sm">
      <form action="traitements/traitements_add.php" method="post">

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
          />
        </div>

        <div class="buttons-form">
          <button type="submit" name="done" class="mt-5 btn btn-success">Enregistrer</button>
          <button type="reset" class="mt-5 btn btn-danger">Effacer</button>
        </div>


      </form>
    </div>
  </div> <!-- /.row -->

</div> <!-- /.container -->

<?php include_once('./includes/footer.php'); ?>