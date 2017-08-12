<?php
require_once('../connection.php');
session_start();
$id = $_GET['id'];

if (isset($_POST['status-change'])) {
    $status = $_POST['status-change'];
    //echo $id;
    try  {
      $sql = "UPDATE filed_grievances SET grievance_status = :status WHERE id = {$id}";
      //$sql = "UPDATE account_information SET password = :password WHERE id = '$id'";
      $stmt = $handler->prepare($sql);
      $stmt->bindParam(':status', $status, PDO::PARAM_STR, 20);
      $stmt->execute();
      //echo 'Updated successfully.';
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} 
?>

<!DOCTYPE html>
<html>
  <head>
    <script src="https://use.fontawesome.com/1c43e5f606.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/skeleton/2.0.4/css/skeleton.css">
    <link rel="stylesheet" href="../css/custom.css">
  </head>
  <body>
    <div class="container wrapper-before-sf">
      <!--<div class="row" style="margin-top: 10%">
        <h1 class="center-text">APWU Grievance Reporting System</h1>
      </div>-->
      <div class="row" style="padding-top: 18%">
         <div class="six columns border" style="position: relative;">
            <img src="https://www.advsol.com/ASI/images/NewSite/Clients/cs_logo_apwu.png" alt="APWU" class="center">
            <h3 class="center-text">APWU Grievance<br> Reporting System</h3>
           <span id="dividing-border"><span>
        </div>
        <div class="six columns" style="padding-top: 5%;">
            <div class="button-container">
            <h3 class="center-text">Status Updated</h3>
            <p class="center-text"></p>
            <br>
            <a class="button u-full-width" href="index.php"><i class="fa fa-sign-in fa-2x fa-panel" aria-hidden="true"></i>&nbsp;&nbsp; Admin Panel</a>
          </div>
        </div>
      </div>
    </div>
    
    <footer class="sticky-footer">
      <small>&copy; 2017 American Postal Workers Union</a></small>
      <div class="social-box">
        <a href="http://www.facebook.com/apwunational" class="facebook" target="_blank">
          <i class="fa fa-facebook-official fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="http://twitter.com/apwunational" class="twitter" target="_blank">
          <i class="fa fa-twitter-square fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="http://www.youtube.com/apwucommunications" class="youtube">
          <i class="fa fa-youtube-square fa-fw social-icon" aria-hidden="true"></i>
        </a>
        <a href="https://www.flickr.com/photos/123834212@N05/" class="flickr" target="_blank">
          <i class="fa fa-flickr fa-fw social-icon" aria-hidden="true"></i>
        </a>
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>