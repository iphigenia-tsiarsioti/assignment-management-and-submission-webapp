<?php 
    include("log.php");

    if(empty($_SESSION['username']))
    {
        header("location: ../login.php");
        die("Redirecting to login.php");
    }

    // vriskw to assignment id
    if(isset($_GET['assignment_id']) && $_GET['assignment_id'] !== ''){
        $assignment_id = $_GET['assignment_id'];
    }else{
        echo "Το assignment δεν βρέθηκε!";
    }

    //vriskw to foitiiti me username $username
    $query="SELECT * FROM students WHERE username='$username'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo $row['username']."kai to id einai ".$row['id'];
            $student_id=$row['id'];
            //vriskw to mathima pou exei to assignment
            $sql="SELECT * FROM assignments JOIN lessons WHERE assignment_id='$assignment_id' AND assignments.lesson_id=lessons.lesson_id ";
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()) {
                $lesson_id=$row['lesson_id'];
                $lesson_name=$row['lesson_name'];
                $assignment_name=$row['assignment_name'];                    
            }
        }       
    }else{
        echo "Ο χρήστης δε βρέθηκε!";
    }

    // Epilegw apo ti vasi to arxeio pou exw apothikevmeno gia to sygkekrimeno assignment kai to katevazw
    $sql="SELECT * FROM files WHERE student_id='$student_id' AND assignment_id='$assignment_id'";
    $result = $db->query($sql);
    if($result->num_rows>=1){
        $row = $result->fetch_assoc();
        $myfile= $row['filename'];
        echo $myfile;
        header('Content-Description: File Transfer');
        header('Content-Type: application/force-download');
        header("Content-Disposition: attachment; filename=\"" . basename($myfile) . "\";");
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($myfile));
        ob_clean();
        flush();
        readfile("Downloads/".$myfile); // edw apothikevete to arxeio topika ston ypologisti otan patame download
        exit;
    }
?>