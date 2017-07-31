<?php

if (isset($_POST['submit'])) {
  require_once('connection.php');
  // If the submit button is clicked -> set post variables -> athenticate user
  $email = $_POST['email'];
  $password = trim($_POST['password']);
  
  $query = $handler->query("SELECT * FROM account_information WHERE email = '$email'");
  
  $row = $query->fetch(PDO::FETCH_OBJ); // Variable to hold row - OO
  $hashedPassword = $row->password;
  $admin = $row->admin === '1';
  if(password_verify($password, $hashedPassword)) {
    session_start();
    $_SESSION['name'] = $row->full_name;
    $_SESSION['id'] = $row->id;
    if ($admin) {
      $_SESSION['admin'] = $admin;
      header('Location: admin/index.php');
    } else {
      header('Location: index.php');
    }
  } else {
    echo "You've entered an incorrect password.";
  }
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
        <div class="six columns border">
          <form class="login" method="post" action="login.php">
            <input type="text" placeholder="email address" name="email" class="center">
            <input type="password" placeholder="password" name="password" class="center">
            <button class="center" name="submit">LOGIN</button>
            <div>
              <span class="pull-left">
                <small>Do not have an account?</small>
              </span>
              <span class="right">
                <small><a href="#" class="create-account">Create Account</a></small>
              </span>
            </div>
          </form>
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
    
    <div class="overlay"></div>
    <div class="registration-form">
    
      <!--START OF FORM - tabbed left for spacing-->
      <form id="sign-up-form" method="post" action="add-acct-info.php">
        <h3 class="center-text">APWU Grievance Reporting System
          <br>Registration Form - Create Your Profile</h3><br>
        <div class="row"> <!--FORM ROW--> 
          <div class="eight columns">
            <label for="fullName">Full Name</label>
            <input class="u-full-width" id="full-name" type="text" name="full-name" maxlength="128">
          </div>
          <div class="error" id = "full-name-error">Full Name Required</div>
          <div class="four columns">
            <label for="employee-status">Employee Status</label>
            <select name="employeeStatus" id="drop-down-menu" class="u-full-width">
              <option value="none">Select Employee Type</option>
              <option value="FTR">Full Time Regular</option>
              <option value="PTR">Part Time Regular</option>
              <option value="PSE">Postal Support Employee</option>
            </select>
          </div>
          <div class="error" id = "drop-down-menu-error">Please select your Employee Status</div>
        </div> <!--END ROW-->
      
        <div class="row"> <!--FORM ROW--> 
          <div class="twelve columns">
            <label for="address">Street Address</label>
            <input id="address" type="text" name="address" maxlength="80" class="u-full-width">
          <div class="error" id = "address-error">Address field required</div>
          </div>
        </div> <!--END ROW-->
      
        <div class="row"> <!--FORM ROW--> 
          <div class="six columns">
            <label for="city">City</label>
            <input id="city" type="text" name="city" maxlength="50" class="u-full-width">
          <div class="error" id ="city-error">City field required</div>
          </div>
          <div class="three columns">
            <label for="state">State</label>
            <input id="state" type="text" name="state" class="u-full-width" maxlength="25">
            <div class="error" id = "state-error">State field required</div>
          </div>
          <div class="three columns">
            <label for="zip">Zip Code</label>
            <input id="zipCode" type="text" name="zipCode" class="u-full-width" maxlength="25">
            <div class="error" id = "zipCode-error">Zip-Code field required</div>
          </div>
        </div> <!--END ROW-->
        
         <div class="row"> <!--FORM ROW--> 
          <div class="four columns">
            <label for="phone">Phone Number</label>
            <input id="phone-number" type="text" name="phone" class="u-full-width" maxlength="11">
            <div class="error" id="phoneNumber-error">Phone Number field required</div>
          </div>
          <div class="four columns">
            <label for="employeeId">Employeee Id</label>
            <input id="eid" type="text" name="eid" class="u-full-width" maxlength="8">
            <div class="error" id = "eid-error">Employee ID field required</div>
          </div>
          <div class="four columns">
            <label for="seniority">Seniority Date</label>
            <input id="seniorityDate" type="date" name="seniority" maxlength="10" class="u-full-width">
            <div class="error" id = "seniorityDate-error">Seniority Date field required</div>
          </div>
        </div> <!--END ROW-->
          
        <div class="row"> <!--FORM ROW--> 
          <div class="four columns">
            <label for="pay-status">Pay Status Level</label>
            <input id="payLevel" type="text" name="payLevel" class="u-full-width" maxlength="10">
            <div class="error" id = "payLevel-error">Pay Level field required</div>
          </div>
          <div class="four columns">
            <label for="pay-step">Pay Step</label>
            <input id="payStep" type="text" name="payStep" class="u-full-width" maxlength="10">
            <div class="error" id = "payStep-error">Pay Step field required</div>
          </div>
          <div class="four columns">
            <label for="tour">Tour</label>
            <input id="tour" type="text" name="tour" class="u-full-width" maxlength="10">
            <div class="error" id = "tour-error">Tour field required</div>
          </div>
        </div> <!--END ROW-->
      
        <div class="row"> <!--FORM ROW--> 
          <div class="four columns">
            <label for="days-off">Days Off</label>
            <input id="daysOff" type="text" name="daysOff" maxlength="10" class="u-full-width">
          </div>
          <div class="four columns">
            <label for="veteran-status">Veteran Status</label>
            <select name="veteranStatus" class="veteranStatus u-full-width" id="drop-down-menu">
              <option value="Yes">Yes</option>
              <option value="NO">No</option>
            </select>
            <div class="error" id = "veteranStatus-error">Veteran Status field required</div>
          </div>
          <div class="four columns">
            <label for="layoff-protected">Layoff Protected</label>
            <select name="layOffProtected" class="layOffProtected u-full-width" id="drop-down-menu">
              <option value="YES">Yes</option>
              <option value="NO">No</option>
            </select>
            <div class="error" id ="layOffProtected-error">Lay-off Protected field required</div>
          </div>
        </div> <!--END ROW-->  
      
        <div class="row"> <!--FORM ROW--> 
          <div class="six columns">
            <label for="email">Email</label>
            <input id="email-address1" type="email" name="email1" class="u-full-width" maxlength="120">
            <div class="error" id = "email1-error">Please enter a email address.</div>
          </div>
          <div class="six columns">
            <label for="email-confirm">Reenter Email</label>
            <input id="email-address2" type="email" name="email2" class="u-full-width" maxlength="120">
            <div class="error" id = "email2-error">Please verify email address</div>
          </div>
        </div> <!--END ROW-->
      
        <div class="row"> <!--FORM ROW--> 
          <div class="six columns">
            <label for="password">Password</label>
            <input id="passwordField1" type="password" name="password1" class="u-full-width" maxlength="120">
            <div class="error" id = "password1-error">Please create a password.</div>
          </div>
          <div class="six columns">
            <label for="email-password">Reenter Password</label>
            <input id="passwordField2" type="password" name="password2" class="u-full-width" maxlength="120">
            <div class="error" id = "password2-error">Please verify password</div>
          </div>
        </div> <!--END ROW-->
        <input id="submit" type="submit" value="Register Account" class="submit-button" name="submit">
      </form>
      <!--END OF FORM - tabbed left for spacing-->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>