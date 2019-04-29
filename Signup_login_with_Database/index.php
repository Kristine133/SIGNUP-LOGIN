<?php

session_start();
require_once 'Dbconfig.php';

// Check if login form is submitted

if(isset($_POST['btn-login']))
{
 $umail = $_POST['txt_email'];
 $upass = $_POST['txt_password'];

 if($user->login($umail,$upass))
 {
  $user->redirect('home.php');
 } 
}

// Check if register form is submitted

if(isset($_POST['btn-signup']))
{
   $uname = trim($_POST['txt_uname']);
   $umail = trim($_POST['txt_umail']);
   $upass = trim($_POST['txt_upass']); 
 
try
{
  $stmt = $DB_con->prepare("SELECT username,email FROM user2 WHERE username=:uname OR email=:umail");
  $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
    
{
// Check if the user may be registered

if ($user->register($uname, $umail, $upass)) {
	echo '<e style="color:#f89a35;font-family:"Source Sans Pro";font-size:18px;margin-left:-100px;">Thank You for Registered! Please fill the Login!</e>';
		}
	}
} catch (PDOException $e) {
	array_push($errors, $e->getMessage());
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign up</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
    <script src="main.js" defer></script>
</head>
<body>
  <section class="user" style="background:url(autumn.jpg) no-repeat center">
		<div class="user_options-container">	  
		<div class="user_options-text" style="opacity:0.8">
		<div class="user_options-unregistered">
			<h2 class="user_unregistered-title">Don't have an account?</h2>
			<hr>
			<p class="user_unregistered-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<button class="user_unregistered-signup" id="signup-button">Sign up</button>
		</div>
		<div class="user_options-registered">
			<h2 class="user_registered-title">Have an account?</h2>
			<hr>
			<p class="user_registered-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			<button class="user_registered-login" id="login-button">Login</button>
		</div>
		</div>
		<div class="user_options-forms" id="user_options-forms">
		<div class="user_forms-login">

<!-- Login -->

		  <h2 class="forms_title">Login</h2>
			<hr class="line_under_login">
		<form action="home.php" method="POST">
		<div class="forms_field">
		  <input type="text" class="forms_field-input" name="txt_email" placeholder="Email" required /><i class="fa fa-envelope-o" style="font-size:16px"></i>
			<span class="required">*</span>
		</div>
		<div class="forms_field">
			<input type="password" class="forms_field-input" name="txt_password" placeholder="Password" required /><i class="fa fa-lock" style="font-size:16px"></i>					
			<span class="required" style="margin-left:-196px">*</span>
		</div>
  </fieldset>
		<div class="forms_buttons">
			<input type="submit" name="btn-login" value="LogIn" class="forms_buttons-action">
			<button type="button" class="forms_buttons-forgot">Forgot?</button>	
		</div>
		</form>
		</div>
		<div class="user_forms-signup">

<!-- Sign Up -->

		  <h2 class="forms_title">Sign Up</h2>
			<hr class="line_under_login">
		<form action="index.php" method="POST">
		<div class="forms_field">
			<input type="text" class="forms_field-input" name="txt_uname" placeholder="Username" /><i class="fa fa-user-o" style="font-size:16px"></i>
			<span class="required" style="margin-left:-195px">*</span>
		</div>
		<div class="forms_field">
			<input type="text" class="forms_field-input" name="txt_umail" placeholder="Email" /><i class="fa fa-envelope-o" style="font-size:16px"></i>
			<span class="required">*</span>
		</div>
		<div class="forms_field">
			<input type="password" class="forms_field-input" name="txt_upass" placeholder="Password" /><i class="fa fa-lock" style="font-size:16px"></i>
			<span class="required" style="margin-left:-196px">*</span>
		</div>
  </fieldset>
		<div class="forms_buttons">
			<input type="submit" name="btn-signup" value="Sign up" class="forms_buttons-action">
		</div>
		</form>
		</div>
		</div>
		</div>
		  <p class="footer">ALL RIGHTS RESERVED 2019.</p>
  </section>
</body>
</html>


