    <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Test Page Mysql Results and Ajax</title>
      <script type="text/javascript">
        var value_category;
        var value_modifier;
        function showResults(str){
          if (str=="") {

          }
        }
      </script>
      <style media="screen">
        .container{
          border-bottom: 2px solid #00fafa;
          height: 100px;
          margin-top: 50px;
        }

        .formholders{
          width: 50%;
          display: inline;
          padding: 10px 0 10px 20%;
        }

        .selectors{
          font-size: 24px;
          width: 250px;
        }

        .results{
          text-align: center;
          margin-top: 15px;
        }

        table, th, td{
          text-align: center;
          border: 1px solid black;
        }
      </style>
    </head>
    <body>
      <div class="container">
        <div class="formholders">
          <a href="#" ></a>
          <select class="selectors" name="catselect" onchange="showmenu(this.value, 'a')" id="cat" >
            <option value="0">Select a Category</option>
            <?php
              include_once("support/sqlconn.php");
              $conn = mysqli_connect($servername, $username, $password, "hugos");
              $catres = mysqli_query($conn, "Select id_category as id, category as des from category;");
              $modres = mysqli_query($conn, "Select id_modifier as id, modifier_description as des from modifier where id_modifier <> 8 ;");
              while ($row = mysqli_fetch_array($catres)) {
                echo '<option value='.$row["id"].'>'.$row["des"].'</option>';
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
                document.getElementById("results").innerHTML = "Select one or more options from above";
                return;
              }
              xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("results").innerHTML = this.responseText;
                  }
                };
                xhttp.open("GET", "getmenu.php?cat="+str1+"&que="+str2, true);
              xhttp.send();
            }
          </script>
        </div>
      </div>
      <div id="results">
        <b>Select one or more options from above</b>
      </div>
  </body>
</html>
