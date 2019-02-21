<?php include_once 'head.php'; ?>
    <title>Hugo's Mexican Kitchen | Main Page</title>
    <?php
      $access_token_ig = '561892672.153bf43.e614ceabd0a14ceb828760d716658a41';
      $totalpics = 12;
     ?>
    <script src="js/events.js" charset="utf-8"></script>
  </head>
  <body>
  <?php include_once 'menu.php'; ?>
  <div id="section">
    <div id="section-instagram">
      <div id="section-instagram-fullpic">
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
        <script type="text/javascript">wah();</script>
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
        $json_data = file_get_contents("quotes.json");
        $json = json_decode($json_data, true);
        $totquotes = count($json['quotes']);
        echo $json['quotes'][(mt_rand(1,$totquotes))-1]['Content'];
      ?>
    </div>
    <div id="section-dinamic">
      <div id="section-dinamic-locations">

      </div>
      <div id="section-dinamic-menu">

      </div>
    </div>
    <div id="section-reservations">
      <a href="#">Get a reservation</a>
    </div>
  </div>
<?php include_once 'footer.php'; ?>
