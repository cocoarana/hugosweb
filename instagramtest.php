<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Testing</title>
  </head>
    <?php
      $access_token_ig = '561892672.153bf43.e614ceabd0a14ceb828760d716658a41';
      $totalpics = 10;
     ?>
  <style media="screen">
    *{
      box-sizing: border-box;
    }

    .container{
      position: relative;
      width: 50%;
      margin: 0 25%;
    }

    .mySlides{
      display: none;
      background-color: black;
    }

    .mySlides img{
      margin: 0 25%;
    }

    .cursor{
      cursor: pointer;
    }

    .prev, .next{
      cursor: pointer;
      position: absolute;
      top:40%;
      width: auto;
      length:100%;
      padding: 16px;
      margin-top: -50px;
      color: white;
      font-weight: bold;
      font-size: 20px;
      border-radius: 0 3px 3px 0;
      user-select: none;
      -webkit-user-select: none;
    }

    .next{
      right: 0;
      border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover{
      background-color: #111;
    }

    .numbertext{
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    .caption-container{
      text-align: center;
      background-color: #222;
      padding: 2px 16px;
      color: white;
    }

    .row:after{
      content: "";
      display: table;
      clear: both;
    }

    .column{
      float: left;
      width: <?php  echo ''.(100/$totalpics).'%';?>;
    }

    .demo{
      opacity: 0.6;
    }

    .active, .demo:hover{
      opacity: 1;
    }
  </style>

  <body>
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
  </body>
</html>
