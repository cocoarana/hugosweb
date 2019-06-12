<?php
  if (isset($_POST['submit'])) {
    $resName = $_POST['resName'];
    $resSize = $_POST['resSize'];
    $resDate = $_POST['resDate'];
    $resMail = $_POST['resMail'];
    $resPhone = $_POST['resPhone'];
    $resDetails = $_POST['resDetails'];

    $to = 'cocoarana@icloud.com';
    $subject = "Reservation request ".$resName.", ".$resSize." guests on ".$resDate;
    $message = '
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Test Calendar</title>
        <style media="screen">
          table, table td{
            border: 1px solid black;
            text-align: center;
          }
        </style>
      </head>
       <body>
         <table>
           <tr>
             <td>Reservation Name</td>
             <td>'.$resName.'</td>
           </tr>
           <tr>
             <td>Size of reservation</td>
             <td>'.$resSize.'</td>
           </tr>
           <tr>
             <td>Date for reservation</td>
             <td>'.$resDate.'</td>
           </tr>
           <tr>
             <td>Contact Email</td>
             <td>'.$resMail.'</td>
           </tr>
           <tr>
             <td>Contact Phone</td>
             <td>'.$resPhone.'</td>
           </tr>
           <tr>
             <td>Details</td>
             <td>'.$resDetails.'</td>
           </tr>
         </table>
       </body>
     </html>
     ';


  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


  $headers .= 'From: '.$resMail.'' . "\r\n";

  mail($to,$subject,$message,$headers);
  header("Location: index.php?mailsent");
  }
 ?>
