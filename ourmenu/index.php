<?php include_once '../support_files/head.php'; ?>
  <title>Hugo's Mexican Kitchen | Our menu</title>
</head>
<body>
  <?php include_once '../support_files/menu.php'; ?>
  <script type="text/javascript">
    var value_category;
    var value_modifier;
    function showResults(str){
      if (str=="") {

      }
    }
  </script>
  <div class="container">
    <div class="formholders">
      <select class="selectors" name="catselect" onchange="showmenu(this.value, 'a')" id="cat">
        <option value="0">Select a Category</option>
        <?php
          include_once("../support_files/sqlconn.php");
          $getcat = (isset($_GET["cat"]))?$_GET["cat"]:0;
          $conn = mysqli_connect($servername, $username, $password, "hugos");
          $catres = mysqli_query($conn, "Select id_category as id, category as des from category;");
          $modres = mysqli_query($conn, "Select id_modifier as id, modifier_description as des from modifier where id_modifier <> 8 ;");
          while ($row = mysqli_fetch_array($catres)) {
            echo ($row[id]==$getcat)?'<option selected value='.$row["id"].'>'.$row["des"].'</option>':'<option value='.$row["id"].'>'.$row["des"].'</option>';
          }
         ?>
      </select>
    </div>
    <div class="formholders">
      <select class="selectors" name="modselect" onchange="showmenu('a', this.value)" id="mod">
        <option value="0">Select a Modifier</option>
        <?php
          while ($row = mysqli_fetch_array($modres)) {
            echo '<option value='.$row["id"].'>'.$row["des"].'</option>';
          }
         ?>
      </select>

      <script type="text/javascript">
        function showmenu(str1, str2){
          var xhttp;
          if(str1=='a'){
            str1 = document.getElementById("cat").value;
          }
          if(str2=='a'){
            str2 = document.getElementById("mod").value;
          }
          if(str1=='0'&&str2=='0'){
            document.getElementById("results").innerHTML = "<b>Select one or more options from above</b>";
            return;
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("results").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "../getmenu.php?cat="+str1+"&que="+str2, true);
          xhttp.send();
        }
      </script>
      <script type="text/javascript">
        showmenu('a', 'a');
      </script>
    </div>
  <div id="results">
    <b>Select one or more options from above</b>
  </div>
</div>
  <?php include_once '../support_files/footer.php'; ?>
