<?php include_once 'head.php'; ?>
    <title>Hugo's Mexican Kitchen | Main Page</title>
  </head>
  <body>
    <?php
      $access_token_ig = '561892672.153bf43.e614ceabd0a14ceb828760d716658a41';
      $totalpics = 12;
     ?>
<?php include_once 'menu.php'; ?>
  <div class="wrapper">
    <div class="img_container">
      <?php
        $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=".$access_token_ig;
        $json_data = file_get_contents($url);
        $json = json_decode($json_data, true);
        $imglimit = 14;
        $Fields = (count($json['data'])<=$totalpics)?count($json['data']):$totalpics; // This will set the total of the publications

        for ($i=0; $i < $Fields; $i++) {
          echo '<div class="igpic"><a href= "'.$json['data'][$i]['link'].'"><img src="'.$json['data'][$i]['images']['thumbnail']['url'].'"';
          echo ' title="'.$json['data'][$i]['caption']['text'].'"></a></div>';
        }
       ?>
     </div>

  </div>
<?php include_once 'footer.php'; ?>
