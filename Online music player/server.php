<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'demos');

	// initialize variables
	$name = "";
	$email = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['user'];
		$address = $_POST['email'];

		mysqli_query($db, "INSERT INTO users (user, email) VALUES ('$user', '$email')"); 
		$_SESSION['message'] = "Address saved"; 
        header('location: admin.php');
        
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['user'];
            $address = $_POST['email'];
        
            mysqli_query($db, "UPDATE users SET user='$name', email='$email' WHERE id=$id");
            $_SESSION['message'] = "Address updated!"; 
            header('location: admin.php');
        }

        if (isset($_GET['del'])) {
            $id = $_GET['del'];
            mysqli_query($db, "DELETE FROM users WHERE id=$id");
            $_SESSION['message'] = "Address deleted!"; 
            header('location: admin.php');
        }
	}