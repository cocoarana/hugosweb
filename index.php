<?php include_once 'support_files/head.php'; ?>
<title>Hugo's Mexican Kitchen | Main Page</title>
    <?php
      // Richmond '1700504310.5a2c80c.9d9f92f49a234aaaa1a23dd6053474e7'
      // Clayton
      $access_token_ig = '1700504310.5a2c80c.dd53133fabba4d9caea402a20b5cedef';
      $totalpics = 12;
     ?>
    <script src="/hugosweb/js/events.js" charset="utf-8"></script>
  </head>
  <body>
  <?php include_once 'support_files/menu.php'; ?>
  <div id="section">
    <div id="section-instagram">
      <div id="section-instagram-fullpic">
        <!--This section is the full picture of instagram-->
          <?php
            $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=".$access_token_ig;
            $json_data = file_get_contents($url);
            $json = json_decode($json_data, true);
            $Fields = (count($json['data'])<=$totalpics)?count($json['data']):$totalpics; // This will set the total of the publications
            for($i=0;$i<$Fields;$i++){
              echo '<div class="mySlides fade">';
              echo '<a href="'.$json['data'][$i]['link'].'"><img src="'.$json['data'][$i]['images']['standard_resolution']['url'].'" title="Click to go IG" id="image'.($i+1).'"></a>';
              echo '</div>';
            }
          ?>
        <script type="text/javascript"> wah();</script>
      </div>
      <div id="section-instagram-grid">
        <div class="row">
          <?php
            $start = 1;
            $mod = 0;
            $a = 0;
            while ($Fields > $a) {
              $tot = $Fields-$Fields+1+$mod;
              if($Fields <= $tot*$start){
                $a = $tot*$start;
              }else{
                if($tot+1>$start){
                  $start++;
                  $mod=0;
                }else{
                  $mod++;
                }
              }
            }
            //every $start will be a Column div ↓
          echo '<div class="column">';
          for($i=0;$i<$Fields;$i++){
            echo '<img src="'.$json['data'][$i]['images']['thumbnail']['url'].'" class="thumbnailimg" onmouseover=instagram('.($i+1).')>';
            if((($i+1)%$tot==0)&&($i+1!=$Fields)){
              echo '</div><div class="column">';
            }
          }
          echo '</div>';
           ?>
        </div>
      </div>
      <script type="text/javascript">instagram(0);<?php echo "resizeandconquer($tot, $start);" ?></script>
    </div>
    <div id="section-quote">
      <?php
        $json_data = file_get_contents("json/quotes.json");
        $json = json_decode($json_data, true);
        $totquotes = count($json['quotes']);
        echo $json['quotes'][(mt_rand(1,$totquotes))-1]['Content'];
      ?>
    </div>
    <div id="section-reservations">
      <a href="#">Get a reservation</a>
    </div>
    <div class="menu-div">
      <br>
      Select a section from our menu
      <br><br>
      <div class="menu-options">
        <a href="ourmenu/index.php?cat=1">To Start and share</a>
        <a href="ourmenu/index.php?cat=2">Los tacos</a>
        <a href="ourmenu/index.php?cat=3">The main event</a>
        <a href="ourmenu/index.php?cat=4">Dessert</a>
      </div>
      <br>
    </div>
  </div>
<?php include_once 'support_files/footer.php'; ?>
