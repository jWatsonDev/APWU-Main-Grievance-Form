<?php 
require_once('../connection.php');
session_start();
// Check if session is established 
if ($_SESSION['admin']) {
  $id = $_SESSION['id']; // id of user
  $name = $_SESSION['name'];
} else {
  header('Location: ../index.php');
}
$perPage = 2; // number of results per page
if (isset($_GET['page']) && !empty($_GET['page'])){
  $currentPage = $_GET['page'];
} else {
  $currentPage = 1;
}
$start = ($currentPage * $perPage) - $perPage;
// get all filed grievances
$query = $handler->query("SELECT * FROM filed_grievances");
$totalResults = $query->rowCount(); // get total number of grievances
$query = $handler->query("SELECT * FROM filed_grievances LIMIT $start, $perPage");
$endPage = ceil($totalResults / $perPage);
$startPage = 1;
$nextpage = $curentPage + 1;
$previousPage = $curentPage - 1;




// add comments to db
if (isset($_POST['submit-comment'])) {
  $topic = $_POST['topic'];
  $comment = $_POST['comment'];
  $grievance_id = $_POST['id'];
  try {
    $stmt = $handler->prepare("INSERT INTO comments (name, topic, comment, account_information_id) VALUES (?, ?, ?, ?)");
    $stmt->bindValue(1, $name);
    $stmt->bindValue(2, $topic);
    $stmt->bindValue(3, $comment);
    $stmt->bindValue(4, $grievance_id);
    $stmt->execute();
    echo "Inserted";
  } catch (PDOException $e) {
    echo "We have an error: " . $e->getMessage() . "<br>";
  }
}

/*
 * Function format date
 */
function formatDate($date) {
  return date("M. j, Y", strtotime($date));
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
    <link rel="stylesheet" href="../css/custom.css">
  </head>
  <body>
    <div class="container">
      <div class="content-container">
        <a href="index.php"><img src="https://www.advsol.com/ASI/images/NewSite/Clients/cs_logo_apwu.png" alt="APWU" class="apwu-logo" height="100px"></a>
        <div style="padding-top: 80px">
          <h3>Manage Grievances</h3><br>
          
        <?php
          for ($i = $startPage; $i <= $endPage; $i++) { 
            echo "<a href='?page={$i}'>" . $i . "</a> ";
          }
        
        
        
        ?>

          
        <table class="u-full-width">
          <thead>
            <tr>
              <th></th>
              <th>Date Filed</th>
              <th>Date of Grievance</th>
              <th>Supervisor</th>
              <th>Status</th>
              <th>Comment/s</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            //if ($query->rowCount()) {

              
              while ($row = $query->fetch(PDO::FETCH_OBJ)) :
            ?>
            <tr>
              <td><a href="#"><i class="fa fa-eye fa-2x fa-panel" aria-hidden="true"></i></a></td>
              <td><?php echo formatDate($row->date_filed); ?></td>
              <td><?php echo formatDate($row->date); ?></td>
              <td><?php echo $row->supervisor_name; ?></td>
              <td>
                <i class="fa fa-pencil-square-o fa-1x fa-panel" aria-hidden="true"></i> &nbsp; Submitted
              </td>
              <td>
                <i class="fa fa-plus-square-o fa-2x fa-panel postButton" aria-hidden="true" id="add-comment" data-key="<?php echo $row->id; ?>" onclick="getIdCreateComment(this)"></i>&nbsp;
                
                <form method="post" action="all-grievances.php?id=<?php echo $row->id; ?>" class="blah" name="view-all-comments<?php echo $row->id; ?>">
                  <i class="fa fa-comment-o fa-2x fa-panel view-comments" aria-hidden="true" data-id="<?php echo $row->id; ?>"  onclick="document.forms['view-all-comments<?php echo $row->id; ?>'].submit();"></i>
                  <input type="hidden" name="get-apwu-id" value="<?php echo $row->id; ?>">
                  
                </form>
              </td>
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
    
    <div class="overlay"></div>
    
<!--START OF COMMENT SUBMISSION FORM-->
    <div class="comment-form">
      <!--START OF FORM - tabbed left for spacing-->
      <form id="sign-up-form" method="post" action="all-grievances.php">
        <h3 class="center-text">Add Comment</h3><br>
        <div class="row"> <!--FORM ROW--> 
          <div class="twelve columns">
            <label for="topic">Topic</label>
            <input class="u-full-width" id="topic-name" type="text" name="topic">
          </div>
          <div class="error" id = "full-name-error">Full Name Required</div>
        </div> <!--END ROW-->
        <div class="row"> <!--FORM ROW--> 
          <div class="twelve columns">
            <label for="comment">Comment</label>
            <textarea class="u-full-width" placeholder="Comment here..." id="comment" name="comment"></textarea>
          </div>
        </div> <!--END ROW-->
        <input type="hidden" id="setId" value="" name="id">
        <input id="submit" type="submit" value="Add Comment" class="submit-button" name="submit-comment">
      </form>
      <!--END OF FORM - tabbed left for spacing-->
    </div>
<!--END OF COMMENT SUBMISSION FORM-->
     
<!--START OF VIEW COMMENTS-->
    <div class="view-related-comments">
      <?php $id = $_GET['id']; ?>
      <?php $query = $handler->query("SELECT * FROM comments Where account_information_id = '$id'"); ?>
      <div>
        <h3 class="center-text">Comment/s</h3><br>
        <table>
          <thead>
            <tr>
              <th>Name</th>
              <th>Message</th>
            </tr>
          </thead>
          <?php 
            if (isset($_GET['id'])) {
              $id = $_GET['id'];
          ?>
          <tbody>
            <?php while ($row = $query->fetch(PDO::FETCH_OBJ)) : ?>
            <tr>
              <td><?php echo $row->name; ?></td>
              <td><?php echo $row->comment; ?></td>
            </tr>
            <?php endwhile; ?>
            
            <script>
            // NEED TO CHECK AND see if there is any comments first. 
              // waiting for the page to load
              document.addEventListener("DOMContentLoaded", function() {
                viewComments();
              });
            </script>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
<!--END OF VIEW COMMENTS-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
    <script>
      /*
       * gets data-key of comment that is clicked on
       * Will move into main script later
       */
      function getIdCreateComment(e){
        var theId = e.getAttribute("data-key");
        document.getElementById('setId').value = theId;
        createComment();
      }
    </script>
    
  </body>
</html>