<?php 
require_once('connection.php');
session_start();
// Check if session is established 
if ($_SESSION['name']) {
  $id = $_SESSION['id']; // Get id of user from url
} else {
  header('Location: login.php');
}

// Query database for name and email from 
$query = $handler->query("SELECT * FROM filed_grievances");



/*
 * Function format date
 */
function formatDate($date) {
  return date("M. j, Y, g:i A", strtotime($date));
}
?>


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <script src="https://use.fontawesome.com/51aa15acbd.js"></script>
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/skeleton/2.0.4/css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
  </head>
  <body>
    <div class="container">
      <div class="content-container">
        <a href="index.php"><img src="https://www.advsol.com/ASI/images/NewSite/Clients/cs_logo_apwu.png" alt="APWU" class="apwu-logo" height="100px"></a>
        <div style="padding-top: 80px">
          <h3>Filed Grievances<br><small><?php echo $name; ?></small></h3><br>
        <table class="u-full-width">
          <thead>
            <tr>
              <th>ID</th>
              <th>Date Filed</th>
              <th>Date of Grievance</th>
              <th>Supervisor</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            //if ($query->rowCount()) {
              while ($row = $query->fetch(PDO::FETCH_OBJ)) :
            ?>
            <tr>
              <td><?php echo $row->id; ?></td>
              <td><?php echo formatDate($row->date_filed); ?></td>
              <td><?php echo $row->date; ?></td>
              <td><?php echo $row->supervisor_name; ?></td>
            </tr>
            <?php
              endwhile;
            ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>

    <footer class="">
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
    <script src="js/script.js"></script>
  </body>
</html>