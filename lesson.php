<?php 
    include("php/log.php");
    include("php/lesson.php");
?>
<!DOCTYPE html>
<html lang="el">

<head>

    <title><?php echo $lesson_name; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <!-- CSS link files -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">

    <!-- javascript files -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="js/myscript.js"></script>
    
</head>

<body>
    <!-- Menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="ham-menu" onclick="open_ham()"><img src="images/ham-menu.png" alt="Ham-menu image"></button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav menu-left">
                <li class="nav-item">
                    <img class="header-img" src="images/home.png" alt="Home image">
                    <a class="nav-link" href="index.php">Αρχική </a>
                </li>
                <li class="nav-item active">
                    <img class="header-img" src="images/university.png" alt="University image">
                    <a class="nav-link" href="list_lessons.php">Μαθήματα</a>
                </li>
                <li class="nav-item">
                    <img class="header-img" src="images/folder.png" alt="Folder image">
                    <a class="nav-link" href="list_files.php">Αρχεία</a>
                </li>
                <li class="nav-item">
                    <img class="header-img" src="images/calendar.png" alt="Calendar image">
                    <a class="nav-link" href="calendar.php">Πρόγραμμα</a>
                </li>
            </ul>
            <div class="div-log-out">
                <span id="login-name"><?php echo $username; ?></span>
                <span>
                    <a href="php/logout.php" id="logout">
                        <img src="images/logout.png" id="image-logout" alt="Loggout image">Αποσύνδεση</a>
                </span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">

        <?php
        //elegxos ean to mathima yparxei
        if($invalid_lesson==0){     
            // Psaxnei sti vasi gia na dei ean o xristis einai eggegrammenos sto mathima
            $check="SELECT * FROM enrollment WHERE enrollment.student_id='$student_id' AND enrollment.lesson_id='$lesson_id'";
            $n_result = $db->query($check);
            // Ean exei kanei eggrafi 
            if ($n_result->num_rows > 0) {      
                $sql="SELECT * FROM `lessons` JOIN `assignments` WHERE lessons.lesson_id='$lesson_id' AND assignments.lesson_id='$lesson_id' ORDER BY deadline";
                $result = $db->query($sql);
                if ($result->num_rows > 0) {
                    $tmp=0;
                    while($row = $result->fetch_assoc()) {
                        if($tmp==0){
                            echo "<h2 id='lesson-title'> HY-".$row['lesson_code']. " ".$lesson_name." ( ".$row['year']." )</h2>";
                            echo "<div class='tasks'>";
                        }
                        $file=$row["assignment_file"];
                        $assignment_id=$row["assignment_id"];
                        echo    "<div class='task'>
                                <div class='task-header'>
                                    <h4>".$row["assignment_name"]. "</h4>
                                </div>
                                <div class='task-body'>
                                <h6> ".$row["details"]."</h6>
                                
                                <div class='card-text files-section'>
                                <div class='content-up'>
                                <a class='file-button' href='$file' target='_blank'>Εκφώνηση</a>";
                                $check="SELECT * FROM files WHERE files.student_id='$student_id' AND files.assignment_id='$assignment_id'";
                                $n_result = $db->query($check);
                                // Emfanisi olwn twn assignments pou exei to mathima
                                if ($n_result->num_rows > 0) {
                                    $rw = $n_result->fetch_assoc();
                                    $filepath=$rw["filepath"];
                                    // ean to deadline exei perasei den mporei na to paradwsei 
                                    if($today<=$row['deadline'])                                 
                                        echo"<a class='upload-button' href='upload.php?assignment_id=$assignment_id'><i class='fa fa-upload'></i> Re-Upload</a>";
                                    // emfanisi ekfwnisis kai download 
                                    echo "</div><div class='content-down'><a class='file-button' href='$filepath' target='_blank'>".$rw['filename']."</a>";
                                    echo "<a class='download-button' href='php/download.php?assignment_id=$assignment_id'><i class='fa fa-download'> </i> Download</a></div>";
                                }else{
                                    if($today<=$row['deadline'])
                                        echo "<a class='upload-button' href='upload.php?assignment_id=$assignment_id'><i class='fa fa-upload'></i> Upload</a>" ;                 
                                    echo "</div><div class='content-down'><a class='file-btn' >Δεν έχετε παραδώσει κάποιο αρχείο</a></div>";
                                }
                                $date=date_create($row["deadline"]);
                                echo "</div></div><div class='deadline'><p>Deadline: ".date_format($date,"d/m/Y")."</p></div></div>";
                                $tmp++;
                    }
                }
                echo "
                </div><form action='' method='post' enctype='multipart/form-data' class='undo-form'>
                <input type='submit' value='Διαγραφή εγγραφής' name='undo-enroll' id='input-enroll' class='undo-enroll'>
                </form>";
            }else{
                // edw mpainei ean o xristis den exei kanei eggrafi sto mathima
                $sql="SELECT * FROM `lessons`  WHERE lesson_id='$lesson_id'";
                $result = $db->query($sql);
                $tmp=0;
                while($row = $result->fetch_assoc()) {
                    if($tmp==0)
                        echo "<h2 id='lesson-title'> HY-".$row['lesson_code']. " ".$lesson_name." ( ".$row['year']." )</h2>";
                    $tmp++;
                }
                echo "
                <form action='' method='post' enctype='multipart/form-data'>
                <input type='submit' value='Εγγραφή' name='enroll' id='input-enroll'>
                </form></div>";
            }
        }else   // ean to mathima pou ziteitai den yparxei
            echo"Το μάθημα δεν βρέθηκε!";
        ?>
    
    </div>
</body>

</html>