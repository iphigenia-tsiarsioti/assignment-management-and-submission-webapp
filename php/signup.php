<?php
  include("php/connect.php");

    // Selida back-end pou diaxeirizetai tis eisodous sti forma eggrafis kai elegxei ean einai swsta auta pou eisagontai
    // kai ean einai ola swsta kanei insert ta dedomena sti vasi 
    $username = " ";
    $email = " ";
    $my_password = " ";
    $confirm_password = " ";
    $firstname = " ";
    $lastname =" ";
    $am = " ";

    if (isset($_POST['reg_user'])) {

        //receive all input values from the form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $my_password = mysqli_real_escape_string($db, $_POST['my_password']);
        $confirm_password = mysqli_real_escape_string($db, $_POST['confirm_password']);
        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $am = mysqli_real_escape_string($db, $_POST['am']);

        // form validation: ensure that the form is correctly filled
        if (empty($username)) { array_push($errors, "Το Username απαιτείται!"); }
        else{
          //check if user with this username already exists
          $query = "SELECT * FROM students WHERE username='$username'";
			  $results = mysqli_query($db, $query);
			  if (mysqli_num_rows($results) !=0) 
          array_push($errors, "Αυτό το username χρησιμοποιείται ήδη!");
        }
        if (empty($email)) { array_push($errors, "Το Email απατείται!"); }
        if (empty($my_password)) { array_push($errors, "Το Password απατείται!"); }
        if (empty($firstname)) { array_push($errors, "Το Firstname απατείται!"); }
        if (empty($lastname)) { array_push($errors, "Το Lastname απατείται!"); }
        if (empty($am)) { array_push($errors, "Το AM απατείται!"); }
        else{
        //check id user with this am already exists
        $query = "SELECT * FROM students WHERE am='$am'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) !=0) 
            array_push($errors, "Αυτό το AM χρησιμοποιείται ήδη!");
        }
        //check if passwords match
        if ($my_password != $confirm_password) {
            array_push($errors, "Οι δύο κωδικοί δεν ταυτίζονται!");
        }
        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($my_password);  //encrypt the password before saving in the database
            $sql = "INSERT INTO students (username, email, password , firstname , lastname, am) 
                        VALUES('$username', '$email', '$password', '$firstname', '$lastname', '$am')";
            header('location: index.php');

            if(mysqli_query($db, $sql)){
                echo "Records inserted successfully.";
            } else{
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
            }
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
                        
        }

    }

?>