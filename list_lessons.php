<?php 
    include("php/log.php");
    include("php/functions.php");
    include("php/types.php");
?>
<!DOCTYPE html>
<html lang="el">

<head>

    <title>Μαθήματα</title>
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
                        <img src="images/logout.png" id="image-logout" alt="Logout image">Αποσύνδεση</a>
                </span>
            </div>
        </div>
    </nav>

    <div class="content">

        <!-- Filters -->
        <div class="filters">
            <h2><a href="list_lessons.php">Μαθήματα</a></h2>
            
            <!-- Filter by Category -->
            <div class="btn-group">
                <button type="button" class="btn ">Επιλέξτε Κατηγορία Μαθημάτων</button>
                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <?php
                        $length = count($typoi);
                        for($i=0;$i<$length;$i++)
                        echo "<a class='dropdown-item' href='?type=$typoi[$i]'>$typoi[$i]</a>";
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="list_lessons.php">Όλα τα μαθήματα</a>
                </div>
            </div>

            <!-- Filter by Year -->
            <div class="btn-group">
                <button type="button" class="btn ">Επιλέξτε Έτος</button>
                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <?php
                        $length = count($years);
                        for($i=0;$i<$length;$i++)
                        echo "<a class='dropdown-item' href='?year=$years[$i]'>$years[$i]</a>";
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="list_lessons.php">Όλα τα έτη</a>
                </div>
            </div>

            <!-- Filter by Semester -->
            <div class="btn-group">
                <button type="button" class="btn ">Επιλέξτε Εξάμηνο</button>
                <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <?php
                        $length = count($semesters);
                        for($i=0;$i<$length;$i++)
                        echo "<a class='dropdown-item' href='?semester=$semesters[$i]'>$semesters[$i]</a>";
                    ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="list_lessons.php">Όλα τα εξάμηνα</a>
                </div>
            </div>
        </div>

        <!-- Filter by shown Category with colors -->
        <div class="types">
            <?php
            $length = count($typoi);
            for($i=0;$i<$length;$i++){
                echo "<div class='types-box'><a href='?type=$typoi[$i]'>$typoi[$i]</a></div>";
                echo "<script>func_types('$typoi[$i]','$i');</script>";
            }
            ?>

            <!-- Search form -->
            <div class="search-form">
            <form class="form-inline d-flex justify-content-center md-form form-sm mt-0" method="get" >
                <i class="fa fa-search" aria-hidden="true"></i>
                <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Αναζήτηση" aria-label="Search" name="search" >
                <input type="submit" hidden>
            </form>
        </div>
        <?php
            echo "<script>init_types_color();</script>";
          ?>
        </div>

        <!-- Main Content -->
        <div class='card-box card-lessons'>
        <?php	
            // Analoga me ta filters ginetai kai to katallilo sql query gia na parei ta mathimata apo ti vasi
            if(isset($_GET['year']) && $_GET['year'] !== '')
                $year_flag=1;
            if(isset($_GET['type']) && $_GET['type'] !== '')
                $type_flag=1;
            if(isset($_GET['semester']) && $_GET['semester'] !== '')
                $semester_flag=1;
            if(isset($_GET['search']) && $_GET['search'] !== '')
                $search_flag=1;
            if($year_flag || $type_flag || $semester_flag || $search_flag){
                if($year_flag && !$type_flag && !$semester_flag && !$search_flag)
                    $sql="SELECT * FROM `lessons` WHERE lessons.year='$year' ORDER BY lesson_name";
                else if(!$year_flag && $type_flag && !$semester_flag && !$search_flag)
                    $sql="SELECT * FROM `lessons` WHERE type='$type' ORDER BY lesson_name";
                else if(!$year_flag && !$type_flag && $semester_flag && !$search_flag)
                    $sql="SELECT * FROM `lessons` WHERE semester='$semester' ORDER BY lesson_name";
                else if(!$year_flag && !$type_flag && !$semester_flag && $search_flag)
                    $sql="SELECT * FROM `lessons` WHERE CONCAT(lesson_code, lesson_name, professor, year, semester) LIKE '%$search%'"; 
                else if($year_flag && $type_flag && !$semester_flag && !$search_flag)
                    $sql="SELECT * FROM `lessons` WHERE lessons.year='$year' AND type='$type' ORDER BY lesson_name";
                else if($year_flag && !$type_flag && $semester_flag && !$search_flag)
                    $sql="SELECT * FROM `lessons` WHERE lessons.year='$year' AND semester='$semester' ORDER BY lesson_name";    
                else if($year_flag && $type_flag && $semester_flag && !$search_flag)
                    $sql="SELECT * FROM `lessons` WHERE lessons.year='$year' AND type='$type' AND semester='$semester' ORDER BY lesson_name";
                else if(!$year_flag && $type_flag && $semester_flag && !$search_flag)
                    $sql="SELECT * FROM `lessons` WHERE type='$type' AND semester='$semester' ORDER BY lesson_name";
            }else{                                 
                $sql="SELECT * FROM `lessons` ORDER BY lesson_name";
            }
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                $count=0;
                $types = array();
                while($row = $result->fetch_assoc()) {
                    $lesson_id = $row['lesson_id'];
                    $lesson_name = $row['lesson_name'];
                    $type=$row['type'];
                    $year=$row["year"];
                    $types[$count]=$type;
                    $semester=$row["semester"];
                echo "<div class='card' style='width: 19rem;'>
                
                        <div class=' card-body card-body-1'>
                            <h5 class='card-title'><a href='lesson.php?lesson_id=$lesson_id'>".$lesson_name."</a></h5>
                            </div>
                            <div class='card-body card-body-2'>
                            <p class='card-text'>Κωδικός Μαθήματος: HY-". $row["lesson_code"]."</p>                          
                            <p class='card-text'>Διδάσκων: ". $row["professor"]."</p>
                            <p class='card-text for-year'>Έτος: <a href='?year=$year'>".$row["year"]."</a></p>
                            <p class='card-text for-semester'>Εξάμηνο: <a href='?semester=$semester'>".$row["semester"]."</a></p>
                        </div>
                    </div>";
                    echo "<script>func('$type','$count');</script>";
                    $count++;
                }
          ?>
            <?php
        
        } else {
            echo "<p>Κανένα αποτέλεσμα</p>";
        }
      
        ?>
            <?php
        echo "<script>init();</script>";
        ?>
        </div>
    </div>
</body>

</html>