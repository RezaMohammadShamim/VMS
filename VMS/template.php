<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/VMS/Config/db_connection.php'); // Include database connection
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/VMS/Config/db_connection.php')) {
  die("File not found!");
} 
?>s
<!DOCTYPE html>
<html lang="en">
<?php include_once("Include/header.php"); ?>

<body>
  <div class="container-fluid w-100" style="padding: 1px;">
    <!-- topbar (1st container) -->
    <?php include_once("Include/topnav.php"); ?>

    <!-- Navigation Bar + Main content (2nd container) -->
    <section class="row vh-100 w-100" style="margin-top: 105px;">
      <?php include_once("Include/sidenav.php"); ?>
      <main class="col shadow-sm d-flex flex-grow-1">
        <?php
        if (isset($_view)) {
          if ($_view == "job_creation") {
            include("View/Job creation_view.php");
          } elseif ($_view == "Out_door_bill") {
            include("View/Out door bill posting_view.php");
          } elseif ($_view == "Out_station_bill") {
            include("View/Out station bill posting_view.php");
          } elseif ($_view == "Out_station_job") {
            include("View/Out station job_view.php");
          } elseif ($_view == "Out_door Job") {
            include("View/Out door job_view.php");
          } elseif ($_view == "Req_Creation") {
            include("View/Requisition creation_view.php");
          } elseif ($_view == "Vehicle_entry") {
            include("View/Vehicle entry_view.php");
          } elseif ($_view == "Vendor_entry") {
            include("View/Vendor entry_view.php");
          } else {
            echo "Page under maintenance";
          }
        }

        ?>

      </main>
    </section>
    <!-- Footer (3rd container) -->
    <?php include_once("Include/footer.php"); ?>
  </div>
  <!-- Bootstrap JS (optional) -->
  <?php include_once("Include/script.php"); ?>
</body>

</html>