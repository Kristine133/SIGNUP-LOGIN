<?php

session_start();
require_once 'Dbconfig.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Source Sans Pro' rel='stylesheet'>
  <title>Homepage</title>
</head>
<body>
  <div class="homepage-title" style="margin-top: 200px">
    <h2>Welcome in homepage!:)"</h2>
  </div>
  <div class="homepage-title" style="margin-top: 250px">
  <label><a href="logout.php" style="font-size:18px;color:lightblue"><i class="fa fa-sign-out" style="font-size:14px;color:lightblue"></i>logout</a></label>
  </div>
</body>
</html>
