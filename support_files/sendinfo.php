<?php
  include_once("sqlconn.php");
  $conn= mysqli_connect($servername, $username, $password, "hugos");
  if (isset($_POST['submit'])) {
    $page = $_POST['page'];
    if($page == 'reservations'){
      $resName = $_POST['resName'];
      $resSize = $_POST['resSize'];
      $resDate = $_POST['resDate'];
      $resTime = $_POST['resTime'];
      $resMail = $_POST['resMail'];
      $resPhone = $_POST['resPhone'];
      $resDetails = $_POST['resDetails'];

      $dateSubmit = date("Y-m-d");

      $query = "insert into reservations (date_submitted,reservation_name, party_size, reservation_date, reservation_time, email, phone_number, details) values ('$dateSubmit','$resName', $resSize, '$resDate', '$resTime:00', '$resMail', '$resPhone', '$resDetails');";

      if (mysqli_query($conn, $query)) {
          header("Location:../index.php?activity=reservation&status=success");
      } else {
          header("Location:../reservations/index.php?activity=reservation&status=failed");
      }
    }
    else if($page == 'feedback'){
      $resName = $_POST['resName'];
      $resDate = $_POST['resDate'];
      $resMail = $_POST['resMail'];
      $resPhone = $_POST['resPhone'];
      $resDetails = $_POST['resDetails'];

      $dateSubmit = date("Y-m-d");

      $query = "insert into feedbacks (date_submitted,guest_name, visit_date, email, phone_number, details) values ('$dateSubmit','$resName', '$resDate', '$resMail', '$resPhone', '$resDetails');";

      if (mysqli_query($conn, $query)) {
          header("Location:../index.php?activity=feedback&status=success");
      } else {
          header("Location:../custFeedback/index.php?activity=feedback&status=failed");
      }
    }
  }
 ?>
