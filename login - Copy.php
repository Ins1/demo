<?php
$tag = 'Login';

require 'head.php';
//call the search box which is after the navbar
require 'connect.php';

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = ("SELECT * FROM users WHERE username=:username");
	$results = $pdo->prepare($sql);
	//binding the parameter
	//this will only be called when the prepared stmt is run
	$results->bindParam('username', $username);
	$results->execute();
	//fetch the row from the stmt executed before
	$row = $results->fetch();

	// Check the plain text password against the 
	// hashed value from table 'users' in $row['Password']
	//if it matches then run this
	if (password_verify($password, $row['password'])) {

		//if user password is matched then set the sesssion from

		// echo $username;
		$_SESSION['users'] = $username;
		// echo $_SESSION['users'];

		//redirect to home page
		header("location:index.php");
	} else {
		echo "Invalid email or password";
	}
}
require 'loginform.php';
require 'footer.php';
