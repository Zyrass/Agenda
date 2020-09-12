  <footer>
    <span>PHP - MySQL - JavaScript - HTML - CSS</span>
    <?php if ($pageName === "Accueil") : ?>
      
    <?php else : ?>
      <button
        type="button"
        id="back"
        class="btn btn-sm btn-info"
      >Retour</button>
    <?php endif ?>
    <span>By Alain Guillon ( Zyrass )</span>
  </footer>

  <script>
    const btnBack = document.querySelector("#back");
    back.addEventListener('click', () => {
      document.location.href = "http://localhost/projet_agenda";
    })
  </script>
</body>
</html>