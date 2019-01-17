<?php include_once 'head.php'; ?>
    <title>Hugo's Mexican Kitchen | Main Page</title>
    <script type="text/javascript" src="js/instafeed.min.js"></script>
    <script type="text/javascript">
      var feed = new Instafeed ({
        get: "popular"
        , clientId: "b3c8beb4a4c24e85957e32b107a7ba3b"
      });
      feed.run();
    </script>
  </head>
  <body>
    <div class="nav">
      <img src="img/hugoslogo2.png" alt="logo" id="logo">
      <label for="toggle" id="menuicon">&#9776;</label>
      <input type="checkbox" id="toggle"/>
      <div class="menu">
        <div class="dropdown">
          <button class="dropbtn">Locations <i class="fa fa-caret-down"></i> </button>
          <div class="dropdown-content">
            <a href="#">Richmond</a>
            <a href="#">Surrey</a>
            <a href="#">Chilliwack</a>
          </div>
        </div>
        <a href="#">Gift Cards</a>
        <a href="#">Customer Feedback</a>
        <a href="#"><span>Reservations</span></a>
      </div>
    </div>

    <div id="instafeed">
    </div>
<?php include_once 'footer.php'; ?>
