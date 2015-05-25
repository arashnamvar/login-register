<?php 

session_start();
require_once("new_connection.php");

if(isset($_POST["action"]) && $_POST["action"] == "register")
{
	register_user($_POST);
}


if(isset($_POST["action"]) && $_POST["action"] == "login" )
{
	login_user($_POST);
} 
else 
{
	session_destroy();
	header("location:index.php");
	die();
}





// FUNCTIONS TO LOGIN
function register_user($post)
{
	// BEGIN VALIDATION CHECKS
	$_SESSION["errors"] = array();

	if(empty($post["first_name"]))
	{
		$_SESSION["errors"][] = "First name can't be blank!";
	}

	if(empty($post["last_name"]))
	{
		$_SESSION["errors"][] = "Last name can't be blank!";
	}

	if(empty($post["password"]))
	{
		$_SESSION["errors"][] = "Password field is required!";
	}
	
	if($post["password"] !== $post["confirm_password"])
	{
		$_SESSION["errors"][] = "Passwords must match!";
	}

	if(!filter_var($post["email"], FILTER_VALIDATE_EMAIL))
	{
		$_SESSION["errors"][] = "Please enter valid email!";
	}

	// END OF VALIDATION CHECKS

	if(count($_SESSION["errors"])>0)
	{
		header("location:index.php");
		die();
	}
	else
	{
		$first_name = escape_this_string($_POST["first_name"]);
		$last_name = escape_this_string($_POST["last_name"]);
		$email = escape_this_string($_POST["email"]);
		$password = escape_this_string(md5($_POST["password"]));
		$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES ('{$first_name}', '{$last_name}', '{$email}', '{$password}', now(), now())";
		run_mysql_query($query);
		$_SESSION["success_message"] = "User Successfully Created";
		header("location:index.php");
		die();
	}

}

function login_user($post)
{	
	$email = escape_this_string($_POST["email"]);
	$password = escape_this_string(md5($_POST["password"]));
	$query = "SELECT * FROM USERS WHERE users.password = '{$password}' AND users.email = '{$email}'";
	$user = fetch_all($query);
	
	if(count($user) > 0)
	{
		$_SESSION["user_id"] = $user[0]["id"];
		$_SESSION["first_name"] = $user[0]["first_name"];
		$_SESSION["logged_in"] = TRUE;
		header("location:success.php");
		die();
	}
	else
	{
		$_SESSION["errors"][]= "Username or Password incorrect";
		header("location:index.php");
		die();
	}
}

 ?>
