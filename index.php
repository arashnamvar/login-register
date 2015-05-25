<?php 
session_start();
require_once("new_connection.php");
var_dump($_SESSION);


if(isset($_SESSION["errors"]))
{
	foreach ($_SESSION["errors"] as $error) 
	{
			echo  error_style_begin() . $error . "</span></div></div></div>" ;
	}
	unset($_SESSION["errors"]);
}

if(isset($_SESSION["success_message"]))
{
	echo success_style_begin() . $_SESSION["success_message"] . "</span></div></div></div>";
	unset($_SESSION["success_message"]);
}



function error_style_begin()
{
	echo '<div class="container"><div class="row"><div class="12 columns"><span class="error">';
}

function success_style_begin()
{
	echo '<div class="container"><div class="row"><div class="12 columns"><span class="success">';
}
?>

<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Registration with PHP and MySQL</title>
  <meta name="description" content="Registration with PHP and MySQL">
  <meta name="author" content="Arash Namvar">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<!-- REGISTER -->
  <div class="container">
	   <form method="post" action="process.php">
		   <h1>Register</h1>
			<div class="row">
			    <div class="six columns">
			     First Name: <input class="u-full-width" name="first_name" type="text">
			    </div>
				<div class="six columns">
				    Last Name: <input class="u-full-width" name="last_name" type="text">
				</div>
			</div>
			<div class="row">
				<div class="12 columns">
				    Email: <input class="u-full-width" name="email" type="text">
				</div>
			</div>
			<div class="row">
				<div class="six columns">
				    Password: <input class="u-full-width" name="password" type="password">
				</div>
				<div class="six columns">
				    Confirm Password: <input class="u-full-width" name="confirm_password" type="password">
				</div>
			</div>
			<input type="hidden" name="action" value="register">
			<input class="button-primary" type="submit" value="register">
		</form>
   </div>

<!-- LOGIN -->

	<div class="container">
		<form method="post" action="process.php">
			<h1>Login</h1>
			<div class="row">
					<div class="12 columns">
					    Email: <input class="u-full-width" name="email" type="text">
					</div>
				</div>
			<div class="row">
				<div class="12 columns">
				    Password: <input class="u-full-width" name="password" type="password">
				</div>
			</div>
			<input type="hidden" name="action" value="login">
			<input class="button-primary" type="submit" value="Login">			
		</form>
	</div>



<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
