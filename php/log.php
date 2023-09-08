
<?php 
    include("connect.php");
    $db->set_charset('utf8'); 
    
    // o xristis prepei prwta na sindethei gia na apoktisei prosvasi sto systima
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }else{
        $username = $_SESSION['username'];
        // Eyresi kai apothikeusi tou student id otan ginei i sindesi
        $query="SELECT * FROM students WHERE username='$username'";
        $result = $db->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $student_id=$row['id'];
            }
        }
    }

    if (isset($_GET['logout'])) {            
        session_destroy();
        unset($_SESSION['username']);             
        header('location: ../login.php');
    }
?>