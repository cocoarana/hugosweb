<?php
  include_once("support_files/sqlconn.php");
  $conn= mysqli_connect($servername, $username, $password, "hugos");
  $category = intval($_GET["cat"]);
  $modifier = intval($_GET["que"]);
  $query = "Select menu_item, price, descr, case when m.id_addon is null then '-' else addon end as addon, case when m.id_addon is null then '-' else price_addon end as price_addon from menu m left join addon a on m.id_addon = a.id_addon where";
  $modquery = "";
  $catquery = "";
  if($modifier > 0){
    switch ($modifier) {
      case 1:
        {$modquery = "main_modifier in (1,4,5)";
        break;}
        case 2:
          {$modquery = "main_modifier in (2,4)";
          break;}
        case 3:
          {$modquery = "main_modifier in (3,5)";
          break;}
        case 4:
          {$modquery = "main_modifier = 4";
          break;}
        case 5:
          {$modquery = "main_modifier = 5";
          break;}
        case 6:
          {$modquery = "can_turn_vegan = 1";
          break;}
    }
  }
  if($category > 0){
    $catquery = " id_category = ".$category."";
  }
  $query = $query.$catquery.(($category>0&&$modifier>0)?" and ":" ").$modquery.";";

  $results = mysqli_query($conn, $query);
  echo '<table>';
  echo '<tr>';
  echo '<th>Item</th>';
  echo '<th>Description</th>';
  echo '<th>Price</th>';
  echo '<th>Add on</th>';
  echo '<th>Price Add on</th>';
  echo '</tr>';
  while ($row = mysqli_fetch_array($results)) {
    echo '<tr>';
    echo '<td>'.$row["menu_item"].'</td>';
    echo '<td>'.$row["descr"].'</td>';
    echo '<td class="prices">$'.round($row["price"]+.001,2).'</td>';
    echo '<td class="prices">'.$row["addon"].'</td>';
    echo ($row['price_addon']=='-')?'<td class="prices">'.$row["price_addon"].'</td>':'<td class="prices">$'.$row["price_addon"].'</td>';
    echo '</tr>';
  }
  echo '</table>';
 ?>
