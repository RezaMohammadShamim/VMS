<!DOCTYPE html>
<html lang="en">
<?php include_once "Include/header.php" ?>

<body>
  <div class="container-fluid w-100" style="padding: 1px;">
    <!-- topbar (1st container) -->
    <?php include_once "Include/topnav.php" ?>

    <!-- Navigation Bar + Main content (2nd container) -->
    <section class="row vh-100 w-100" style="margin-top: 105px;">
      <?php include_once "Include/sidenav.php" ?>
      <main class="col shadow-sm mt-3 d-flex">
        <?php include_once("Include/dashboard.php") ?>

      </main>
    </section>
    <!-- Footer (3rd container) -->
    <?php include_once "Include/footer.php" ?>
  </div>
  <!-- Bootstrap JS (optional) -->
  <?php include_once "Include/script.php" ?>
</body>

</html>