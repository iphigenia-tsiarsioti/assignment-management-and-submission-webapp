<?php $username = $_SESSION['username'];
    $query="SELECT * FROM students WHERE username='$username'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $student_id=$row['id'];
        }
    }

    if(isset($_GET['year']) && $_GET['year'] !== ''){
      $year = $_GET['year'];
    }
    if(isset($_GET['type']) && $_GET['type'] !== ''){
      $type = $_GET['type'];
    }
    if(isset($_GET['semester']) && $_GET['semester'] !== ''){
      $semester = $_GET['semester'];
    }
    if (isset($_GET['search']) && !$_GET['search'] !== '') {
      $search = $_GET['search'];
    }
    $year_flag=0;
    $type_flag=0;
    $semester_flag=0;
    $search_flag=0;
?>