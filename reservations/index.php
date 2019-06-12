<?php include_once '../support_files/head.php'; ?>
  <title>Hugo's Mexican Kitchen | Reservations</title>
</head>
<body>
  <span id="num" style="display:none;"></span>
  <?php include_once '../support_files/menu.php'; ?>
  <div class="reservations">
    <form class="res-form" action="../support_files/sendinfo.php" method="post">
      <input type="text" name="resName" value="" placeholder="Reservation's Name" required>
      <br><input type="number" name="resSize" value="" placeholder="Size of party" required>
      <br><input type="date" name="resDate" value="" required>
      <br><input type="time" name="resTime" value="" required>
      <br><input type="email" name="resMail" value="" placeholder="Email Address" required>
      <br><input type="number" name="resPhone" value="" placeholder="Contact Number" required>
      <br><textarea name="resDetails" rows="8" cols="22" placeholder="Details (Optional)"></textarea>
      <br><input type="hidden" name="page" value="reservations">
      <br><input type="submit" name="submit" value="Submit">
    </form>
  </div>
  <?php include_once '../support_files/footer.php'; ?>
