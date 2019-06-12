<?php include_once 'support_files/head.php'; ?>
  <title>Hugo's Mexican Kitchen | User Login</title>
</head>
<body>
  <span id="num" style="display:none;"></span>
  <?php include_once 'support_files/menu.php'; ?>
  <div class="reservations">
    <form class="res-form" action="../support_files/sendinfo.php" method="post">
      <input type="text" name="username" value="" placeholder="Enter Username" required autocomplete="off">
      <br><input type="password" name="pass" value="" placeholder="Enter Password" required autocomplete="off">
      <br><input type="submit" name="submit" value="Submit">
    </form>
  </div>
  <?php include_once 'support_files/footer.php'; ?>
