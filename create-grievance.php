<?php 
// Grievance form here
include_once('connection.php');
session_start();

// Check if session is established 
if ($_SESSION['name']) {
  $id = $_SESSION['id']; // Get id of user from url
} else {
  header('Location: login.php');
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
        <form id="sign-up-form" method="post" action="<?php echo $formAction; ?>">
          <h3 style="margin-left: 85px"><?php echo $name; ?> - Grievance Reporting Form</h3><br>
          
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
              <label class="m_p"><small>Fed and Swept Machine by Myself</small><br><br>
                <input id="radio-null" type="radio" name="radio" value="Yes">
                  <span class="label-body">Yes</span>&nbsp;&nbsp;&nbsp;
                <input id="radio-null2" type="radio" name="radio" value="No"> 
                  <span class="label-body">No</span>
              </label>
              <div class="error" id="feedSweep">Did you feed and sweep?</div>
            
            </div>
          </div> <!--END ROW-->
          
          <div class="row"> <!--FORM ROW--> 
            <div class="six columns">
              <label>Supervisor's Name</label>
              <input id="supervisor" type="text" name="supervisor" size="28" maxlength="28" class="u-full-width">
              <div class="error" id="supervisor-error">Supervisor on duty required</div>
            </div>
            <div class="six columns">
              <label>I worked approximatedly pieces of mail during the time I worked alone.</label>
              <input id="mail-processed" type="number" name="mail-processed" size="5" maxlength="10"> 
              <div class="error" id="mailProcessed">Pieces of mail processed required</div>
            </div>
          </div> <!--END ROW-->
    
          <h4>Only complete if you received assistance.</h4>
          
          <div class="row"> <!--FORM ROW--> 
            <div class="six columns">
              <label>I did receive help at approximately <input id="time-helped" type="text" name="time-helped" size="5" maxlength="10">
              this person only swept the machine which took about
              <input id="time-swept" type="number" name="time-swept" size="5" maxlength="10" placeholder="Minutes">
              then I worked by myself again.</label>
            </div>
            <div class="six columns">
              <label>I worked alone for a total of <br><input id="hours-worked-alone" type="number" name="hours-worked-alone" size="2" maxlength="2" placeholder="Hours"> and <input id="minutes-worked-alone" type="number" name="minutes-worked-alone" size="5" maxlength="10" placeholder="Minutes"> <br> on the above date and machine.</label>
              <div class="error" id="totalHoursWorkedAlone">Total hours worked alone required</div>
            </div>
          </div> <!--END ROW-->

        

          <input id="submit" type="submit" value="Submit Grievance" class="submit-button" name="submit">
        </form>
        <!--END OF FORM - tabbed left for spacing-->
      </div>
    </div>
    
    <!--START OF CHRIS' FORM-->
        <form id="userPageForm" action="../inc.phpLogic/fileGrievance.php" method="POST">

          <label> Employee ID:</label>
          <input id="eid" type="text" name="eid" size="8" maxlength="8">

          <div class="error" id = "eid-error">Employee ID field required</div>


                <label>Date of Grievance (mm/dd/yy):</label>
                <input id="grievance-date" type="date" name="grievance-date" size="10" maxlength="10">

             <div class="error" id="grievanceDateError">Grievance date required</div>


             <label>I worked alone from (Example: 11:45pm until 1:20am)</label>
             <input id="time-alone" type="text" name="timeAlone" size="20" maxlength="28">

           <div class="error" id="timeAlone">Must provide time worked alone</div>



                <label> Machine Number</label>
                <input id="machine" type="text" name="machine" size="40" maxlength="10">

            <div class="error" id="machineNum">Machine # required</div>


              <label class="m_p">I had to feed and sweep the machine myself
              <input id="radio-null" type="radio" name="radio" value="Yes"><span class="label-body">Yes</span><input id="radio-null2" type="radio" name="radio" value="No"><span class="label-body">No</span>
          </label>
          <div class="error" id="feedSweep">Did you feed and sweep?</div>



<div class="s_m">
                <label>SUPERVISORS NAME:</label>
                <input id="supervisor" type="text" name="supervisor" size="28" maxlength="28">

              <div class="error" id="supervisor-error">Supervisor on duty required</div>
            </div>

                <label>I worked approximatedly <input id="mail-processed" type="number" name="mail-processed" size="5" maxlength="10"> pieces of mail during the time I worked alone.</label>
                  <div class="error" id="mailProcessed">Pieces of mail processed required</div>
<div class="row">
              <div class="w_m"><h2>Only complete field if you receieved help</h2>
                <label>I did receive help at approximately <input id="time-helped" type="text" name="time-helped" size="5" maxlength="10">
                  this person only swept the machine which took about
                  <input id="time-swept" type="number" name="time-swept" size="5" maxlength="10" placeholder="Minutes">
                  then I worked by myself again.</label>
</div>

</div>
                <label>I worked alone for a total of <br><input id="hours-worked-alone" type="number" name="hours-worked-alone" size="2" maxlength="2" placeholder="Hours"> and <input id="minutes-worked-alone" type="number" name="minutes-worked-alone" size="5" maxlength="10" placeholder="Minutes"> <br> on the above date and machine.</label>
                <div class="error" id="totalHoursWorkedAlone">Total hours worked alone required</div>

            <input id="submit" type="submit" value="Submit Grievance">

        </form>
        <!--END OF CHRIS' FORM-->
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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