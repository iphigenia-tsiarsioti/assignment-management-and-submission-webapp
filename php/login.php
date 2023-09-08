<?php
// Login page gia tin eisodo tou xristi sto systima
if (isset($_POST['login_user'])) {
    // username and password apo to form 
    $username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "*Το username είναι υποχρεωτικό!");
		}
		if (empty($password)) {
			array_push($errors, "*Ο κωδικός πρόσβασης είναι υποχρεωτικός!");
		}

		if (count($errors) == 0) {
      //Encrypt password
			$password = md5($password);
			$query = "SELECT * FROM students WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				array_push($errors, "Λάθος συνδυασμός του username με τον κωδικό πρόσβασης!");
			}
		}
  }
  ?>