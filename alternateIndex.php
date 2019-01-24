<?php include_once 'head.php'; ?>
    <title>Hugo's Mexican Kitchen | Main Page</title>
      <?php
        $access_token_ig = '561892672.153bf43.e614ceabd0a14ceb828760d716658a41';
        $totalpics = 10;
       ?>
    <style media="screen">

    .column{
      float: left;
      width: <?php  echo ''.(100/$totalpics).'%';?>;
    }

    </style>
  </head>
  <body>
<?php include_once 'menu.php'; ?>
  <div class="wrapper">
    <div class="container">
      <?php
        $url = "https://api.instagram.com/v1/users/self/media/recent/?access_token=".$access_token_ig;
        $json_data = file_get_contents($url);
        $json = json_decode($json_data, true);
        $Fields = (count($json['data'])<=$totalpics)?count($json['data']):$totalpics; // This will set the total of the publications

        for ($i=0; $i < $Fields; $i++) {
          echo '<div class="mySlides"><div class="numbertext">'.($i+1).'/'.$Fields.'</div>';
        echo '<a href="'.$json['data'][$i]['link'].'"><img src="'.$json['data'][$i]['images']['standard_resolution']['url'].'" style="width:50%" title="Click to go IG"></a>';
          echo '</div>';
        }

        echo '<a class="prev" onClick="plusSlides(-1)">&#10094</a>';
        echo '<a class="next" onClick="plusSlides(1)">&#10095</a>';
        echo '<div class="caption-container"><p id="caption" title="0"></p></div>';

        echo '<div class="row">';

        for ($i=0; $i < $Fields; $i++) {
          echo '<div class="column">';
          echo '<img class="demo cursor" src="'.$json['data'][$i]['images']['thumbnail']['url'].'" style="width:100%" onClick="currentSlide('.($i+1).')" alt="'.$json['data'][$i]['caption']['text'].'">';
          echo '</div>';
        }
        echo '</div>';

      ?>
    </div>
    <script type="text/javascript">
      var slideIndex=1;
      showSlides(slideIndex);

      function plusSlides(n){
        showSlides(slideIndex+=n);
      }

      function currentSlide(n){
        showSlides(slideIndex=n);
      }

      function showSlides(n){
        var i;
        var slides = document.getElementsByClassName('mySlides');
        var dots = document.getElementsByClassName('demo');
        var captionText = document.getElementById('caption');

        if(n>slides.length){slideIndex=1;}
        if(n<1){slideIndex=slides.length;}

        for(i=0;i< slides.length;i++){
          slides[i].style.display="none";
        }

        for(i=0;i<dots.length;i++){
          dots[i].className = dots[i].className.replace(" active","");
        }

        slides[slideIndex-1].style.display = "block";
        dots[slideIndex-1].className += " active";
        captionText.innerHTML = dots[slideIndex-1].alt;
        document.getElementById('caption').setAttribute('title',slideIndex);
      }
    </script>

  </div>
<?php include_once 'footer.php'; ?>
