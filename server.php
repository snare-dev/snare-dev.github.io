<?php

session_start();

$firstname ="";
$lastname ="";
$email ="";

$error =array();

$link = mysqli_connect('localhost', 'root','','practice2') or die("Could not connect to the database");

if (isset($_POST['reg_user'])) {

	$firstname = mysqli_real_escape_string($link, $_POST['firstname']);

	$lastname = mysqli_real_escape_string($link, $_POST['lastname']);

	$email = mysqli_real_escape_string($link, $_POST['email']);

	$password = mysqli_real_escape_string($link, $_POST['password']);

	if(empty($firstname)){
		array_push($error,"Firstname is required!");}

	if(empty($lastname)){
		array_push($error,"Lastname is required!");}

	if(empty($email)){
		array_push($error,"Email is required!");}

	if(empty($password)){
		array_push($error,"Password is required!");}

	$user_check_query ="SELECT * FROM users WHERE email ='$email' LIMIT 1";

	$result = mysqli_query($link,$user_check_query);

	$user = mysqli_fetch_assoc($result);

	if($user){
		if($user['email']){
			array_push($error, "Email is already taken!");
		}
	}

	//REGISTER IF NO ERRORS

	if (count($error)==0) {

		$password =md5($password);//encrypts password before saving in the database

		$query ="INSERT INTO users (firstname,lastname, email, password) VALUES ('$firstname','$lastname','$email','$password')";

		 mysqli_query($link, $query);
		 $_SESSION['email'] = $email;
		 $_SESSION['success'] = "You are logged in succesfully";

		 header('location: login.php');


	}

	
}

	//LOGIN USER

if (isset($_POST['login'])){

	$email =mysqli_real_escape_string($link, $_POST['email']);
	$password =mysqli_real_escape_string($link, $_POST['password']);

	if (empty($email)) {
		array_push($error, "Email is required!");
	}

	if (empty($password)) {
		array_push($error, "Password is required!");
	}
  	
  	if (count($error) == 0) {
  		
  		$password =md5($password);

  		$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

  		$result = mysqli_query($link, $query); 

  		if(mysqli_num_rows($result)) {

  			$_SESSION['email'] = $email;
  			$_SESSION['success'] = "Welcome!";

  			header('location: index.php');

  		}else{

  			array_push($error, "Wrong email/password, please try again.");

  		}
  	}


}

?>