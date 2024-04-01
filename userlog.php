<?php 
session_start(); 
include "connection.php";

if (isset($_POST['user_name']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$user_name = validate($_POST['user_name']);
	$password = validate($_POST['password']);

	if (empty($user_name)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM user WHERE user_name='$user_name' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['user_name'] === $user_name && $row['password'] === $password) {
            	$_SESSION['user_name'] = $row['user_name'];
            	header("Location: index.php");
		        exit();
            }else{
				echo "Email atau password salah!";
			}
		}else{
			echo "Email atau password salah!";
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}