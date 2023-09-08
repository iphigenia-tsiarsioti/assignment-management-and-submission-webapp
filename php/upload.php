<?php 
    if(empty($_SESSION['username']))
    {
        header("location: login.php");
        die("Redirecting to login.php");
    }

    if(isset($_GET['assignment_id']) && $_GET['assignment_id'] !== ''){
    $assignment_id = $_GET['assignment_id'];
    } 

    //vriskw to foitiiti me username $username
    $query="SELECT * FROM students WHERE username='$username'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $student_id=$row['id'];
            //vriskw to mathima
            $sql="SELECT * FROM assignments JOIN lessons WHERE assignment_id='$assignment_id' AND assignments.lesson_id=lessons.lesson_id ";
            $result = $db->query($sql);
            while($row = $result->fetch_assoc()) {
                $lesson_id=$row['lesson_id'];
                $lesson_name=$row['lesson_name'];
                $lesson_code=$row['lesson_code'];
                $assignment_name=$row['assignment_name'];
                $year=$row['year'];
                $details=$row['details'];       
                $deadline=$row['deadline'];             
            }      
        }
    }else{
        echo "user no found";
    }

    if(isset($_POST["upload"]))
    {
        if($_FILES["fileToUpload"]["error"] == 4) {
            echo "Error no file to upload!"; 
        }else{
        $check="SELECT * FROM files WHERE files.student_id='$student_id' AND files.assignment_id='$assignment_id'";
        $c_result = $db->query($check);
        if ($c_result->num_rows == 0) { //ean o foititis den exei kanei upload askisi gia to mathima dinourgoume nea eggrafi
            $sql="INSERT INTO `files` (student_id,assignment_id) VALUES ('$student_id','$assignment_id')"; 
            if ($db->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }
        }  
        $folder_path = 'student_files/'.$username.'/'.$lesson_id.'/';
        $filename = basename($_FILES['fileToUpload']['name']);
        
        // Edw epilegete to path pou tha apothikeftei to arxeio
        $newname = $folder_path . $filename;
        if(!file_exists("student_files/".$username.'/'))
            mkdir("student_files/".$username.'/');
        if(!file_exists("student_files/".$username.'/'.$lesson_id))
            mkdir("student_files/".$username.'/'.$lesson_id);
        $FileType = pathinfo($newname,PATHINFO_EXTENSION);
        // Ean o xristis kanei re-upload kanoume update ti vasi me to neo arxeio
        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $newname)){
            $filesql="UPDATE `files` SET filename='$filename', filepath='$folder_path$filename' WHERE student_id='$student_id' AND assignment_id='$assignment_id'";
            $fileresult = $db->query($filesql);

            if (isset($fileresult))
            {
                echo 'File Uploaded';
            } else
            {
                echo 'Something went Wrong';
            }
        }else{
            echo "<p>Upload Failed.</p>";
        }
            
        echo "<script>alert('Το αρχείο $filename ανέβηκε επιτυχώς!');document.location='lesson.php?lesson_id=$lesson_id&lesson_name=$lesson_name'</script>";
          }    
}
?>