<?php 
// Grievance form here
include_once('connection.php');
session_start();

// Check if session is established 
if ($_SESSION['name']) {
  $id = $_SESSION['id']; // Get id of user from url
  $name = $_SESSION['name'];
} else {
  header('Location: login.php');
}

// If the form is submitted
if (isset($_POST['submit'])) {
  // Set POST variables
  $eid = $_POST['eid'];
  $date = $_POST['grievance-date'];
  $timeAlone = $_POST['timeAlone'];
  $machineNumber = $_POST['machine'];
  $feedSweep = $_POST['radio'];
  $supervisor = $_POST['supervisor'];
  $mailProcessed = $_POST['mail-processed'];
  $timeHelped = $_POST['time-helped'];
  $timeSwept = $_POST['time-swept'];
  $timeWorkedAlone = ($_POST['hours-worked-alone'] * 60) + $_POST['minutes-worked-alone'];
  // Create query
  $query = "INSERT INTO filed_grievances(employee_id, date, machine_number, time_alone, supervisor_name, feed_sweep, mail_processed, time_help_received, time_help_swept_machine, time_worked_alone, registration_id) 
    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $handler->prepare($query);
  $stmt->bindValue(1, $eid );
  $stmt->bindValue(2, $date );
  $stmt->bindValue(3, $timeAlone );
  $stmt->bindValue(4, $machineNumber );
  $stmt->bindValue(5, $supervisor );
  $stmt->bindValue(6, $feedSweep );
  $stmt->bindValue(7, $mailProcessed );
  $stmt->bindValue(8, $timeHelped );
  $stmt->bindValue(9, $timeSwept );
  $stmt->bindValue(10, $timeWorkedAlone );
  $stmt->bindValue(11, $id );
  $stmt->execute();
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
      <div class="form-container">
        <a href="index.php"><img src="https://www.advsol.com/ASI/images/NewSite/Clients/cs_logo_apwu.png" alt="APWU" class="apwu-logo" height="100px"></a>
        
        <!--START OF FORM -->
        <form id="sign-up-form" method="post" action="create-grievance.php">
          <h3 style="margin-left: 85px">Grievance Reporting Form<br><small><?php echo $name; ?></small></h3><br>
          
          <div class="row"> <!--FORM ROW--> 
            <div class="six columns">
              <label>Employee ID:</label>
              <input id="eid" type="text" name="eid" size="8" maxlength="8" class="u-full-width">
              <div class="error" id = "eid-error">Employee ID field required</div>
            </div>
            <div class="six columns">
              <label>Date of Grievance</label>
              <input id="grievance-date" type="date" name="grievance-date" size="10" maxlength="10" class="u-full-width">
              <div class="error" id="grievanceDateError">Grievance date required</div>
            </div>
          </div> <!--END ROW-->
    
          <div class="row"> <!--FORM ROW--> 
            <div class="four columns">
              <label>Time Worked Alone<br><small>(e.g. 11:45 PM - 1:20 AM)</small></label>
              <input id="time-alone" type="text" name="timeAlone" size="20" maxlength="28" class="u-full-width">
              <div class="error" id="timeAlone">Must provide time worked alone</div>
            </div>
            <div class="four columns">
              <label>Machine Number</label><br>
              <input id="machine" type="text" name="machine" size="40" maxlength="10" class="u-full-width">
              <div class="error" id="machineNum">Machine # required</div>
            </div>
            <div class="four columns">
              <label class="m_p">Did you feed and sweep machine by yourself?<br>
                <div style="width: 100px; padding-top: 10px;">
                  <input id="radio-null" type="radio" name="radio" value="Yes">
                    <span class="label-body">Yes</span>&nbsp;&nbsp;&nbsp;
                  <input id="radio-null2" type="radio" name="radio" value="No"> 
                    <span class="label-body">No</span>
                </div>
              </label>
              <div class="error" id="feedSweep">Did you feed and sweep?</div>
            
            </div>
          </div> <!--END ROW-->
          
          <div class="row"> <!--FORM ROW--> 
            <div class="six columns">
              <label>Supervisor's Name</label><br>
              <input id="supervisor" type="text" name="supervisor" size="28" maxlength="28" class="u-full-width">
              <div class="error" id="supervisor-error">Supervisor on duty required</div>
            </div>
            <div class="six columns">
              <label>How many pieces of mail did you process during that time?</label>
              <input id="mail-processed" type="number" name="mail-processed" size="5" maxlength="10" class="u-full-width"> 
              <div class="error" id="mailProcessed">Pieces of mail processed required</div>
            </div>
          </div> <!--END ROW-->
          <hr>
          <h4 class="center-text" style="font-size: 23px">Only complete the below section if you received assistance.</h4>
          
          <div class="row"> <!--FORM ROW--> 
            <div class="four columns">
              <label>What time did you receive help?</label>
              <input id="time-helped" type="text" name="time-helped" size="5" maxlength="10" class="u-full-width">
            </div>
            <div class="four columns">
              <label>How long did the individual assist you?</label>
              <input id="time-swept" type="number" name="time-swept" size="5" maxlength="10" class="u-full-width">
            </div>
            
            
            <div class="four columns">
              <label>In total, how long did you work alone on the above date and macine?</label>
              <div class="row">
                <div class="six columns">
                  <input id="hours-worked-alone" type="number" name="hours-worked-alone" size="2" maxlength="2" placeholder="Hours" class="u-full-width">
                </div>
                <div class="six columns">
                  <input id="minutes-worked-alone" type="number" name="minutes-worked-alone" size="5" maxlength="10" placeholder="Minutes" class="u-full-width">
                </div>
              </div>
              <div class="error" id="totalHoursWorkedAlone">Total hours worked alone required</div>
            </div>
          </div> <!--END ROW-->
          <br>
          <input id="submit" type="submit" value="Submit Grievance" class="submit-button" name="submit">
        </form>
        <!--END OF FORM - tabbed left for spacing-->
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