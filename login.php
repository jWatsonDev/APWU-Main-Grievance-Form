<?php

if (isset($_POST['submit'])) {
  require_once('connection.php');
  // If the submit button is clicked -> set post variables -> athenticate user
  $email = $_POST['email'];
  $password = trim($_POST['password']);
  
  $query = $handler->query("SELECT * FROM registration WHERE email = '$email'");
  
  $row = $query->fetch(PDO::FETCH_OBJ); // Variable to hold row - OO
  $hashedPassword = $row->password;

  if(password_verify($password, $hashedPassword)) {
    session_start();
    $_SESSION['name'] = $row->full_name;
    $_SESSION['id'] = $row->id;
    header('Location: index.php');
    echo $_SESSION['name'];
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
    <form id="sign-up-form" method="post" action="register.php">
      <h3 class="center-text">APWU Grievance Reporting System
        <br>Registration Form - Create Your Profile</h3><br>
      <div class="row"> <!--FORM ROW--> 
        <div class="twelve columns">
          <label for="fullName">Full Name</label>
          <input class="u-full-width" id="full-name" type="text" name="full-name" maxlength="128">
        </div>
        <div class="error" id = "full-name-error">Full Name Required</div>
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
      <input id="submit" type="submit" value="Register Account" class="submit-button">
    </form>
    <!--END OF FORM - tabbed left for spacing-->
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>