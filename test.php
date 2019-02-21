<?php
  $json_data = file_get_contents("quotes.json");
  $json = json_decode($json_data, true);
  $totquotes = count($json['quotes']);
  echo $json['quotes'][(mt_rand(1,$totquotes))]['Content'].'<br>';
 ?>
