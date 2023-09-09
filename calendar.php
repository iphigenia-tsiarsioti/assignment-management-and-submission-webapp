<?php
include("php/log.php");    
// Dhmiourgia tou calendar pou periexei ta deadlines gia ta mathimata pou einai eggegrammenos enas foititis
date_default_timezone_set('Europe/Athens');
setlocale(LC_CTYPE, 'greek');  
setlocale(LC_TIME, 'greek');

if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else {
    $ym = date('Y-m');
}

$timestamp = strtotime($ym . '-01');
if ($timestamp === false) {
    $ym = date('Y-m');
    $timestamp = strtotime($ym . '-01');
}
$today = date('Y-m-j', time());

// Dimiourgia twn ellinwn minwn, tis ploigisis aristera kai deksia sto imerologio, to plithos imerwn gia kathe mina kai orismos arxis evdomadas
$greekMonths = array('Ιανουάριος','Φεβρουάριος','Μάρτιος','Απρίλιος','Μάϊος','Ιούνιος','Ιούλιος','Αύγουστος','Σεπτέμβριος','Οκτώβριος','Νοέμβριος','Δεκέμβριος');
$greekDate = $greekMonths[intval(date('m', $timestamp))-1].' '. date('Y',$timestamp);
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
$day_count = date('t', $timestamp);
$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp)));
$weeks = array();
$week = '';
$week .= str_repeat('<td></td>', $str);

for ( $day = 1; $day <= $day_count; $day++, $str++) {
    $date = $ym . '-' . $day;
    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day.'<br>';
    }
    // euresi twn mathimatwn pou einai eggegrammenos o foititis kai exei na paradwsei askiseis kai emfanisi twn deadlines
    $sql="SELECT * FROM assignments NATURAL JOIN lessons WHERE lesson_id IN(SELECT lesson_id FROM enrollment WHERE enrollment.student_id='$student_id')";
    $result = $db->query($sql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            if($row["deadline"]==$date){
                if ($today == $date) {
                    $week .= '<div class="ask"><a class="assignment-link" href="upload.php?assignment_id='.$row["assignment_id"].'" >'.$row["assignment_name"].'</a> - <a class="lesson-link" href="lesson.php?lesson_id='.$row["lesson_id"].'&lesson_name='.$row["lesson_name"].'" >'.$row["lesson_name"].'</a></div>';
                } else {
                    $week .= '<div class="ask"><a class="assignment-link" href="upload.php?assignment_id='.$row["assignment_id"].'" >'.$row["assignment_name"].'</a> - <a class="lesson-link" href="lesson.php?lesson_id='.$row["lesson_id"].'&lesson_name='.$row["lesson_name"].'" >'.$row["lesson_name"].'</a></div>';
                }
            }
        }
		
    }
    $week .= '</td>';
    if ($str % 7 == 6 || $day == $day_count) {
        if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }
        $weeks[] = '<tr>' . $week . '</tr>';
        $week = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Πρόγραμμα</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS link files -->
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
      <li class="nav-item">
      <img class="header-img" src="images/university.png" alt="University image">
        <a class="nav-link" href="list_lessons.php">Μαθήματα</a>
      </li>
      <li class="nav-item">
      <img class="header-img" src="images/folder.png" alt="Folder image">
        <a class="nav-link" href="list_files.php">Αρχεία</a>
      </li>
      <li class="nav-item active">
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

<!-- Main Content -->
<div class="content">
    <div class="calendar-container">
    <h3>Πρόγραμμα</h3>

        <div class="cal-title">
                <div class="arrows">
                    <a class="arrow" href="?ym=<?php echo $prev; ?>"><img src="images/left-arrow.png" alt="Leftarrow image"></a>
                <h3> <?php echo $greekDate; ?></h3>

                    <a class="arrow" href="?ym=<?php echo $next; ?>"><img src="images/right-arrow.png" alt="Rightarriw image"></a>
            </div>
        </div>
        <table id="calendar" class="table table-bordered">
            <thead >
            <tr>
                <th>Δ</th>
                <th>Τ</th>
                <th>Τ</th>
                <th>Π</th>
                <th>Π</th>
                <th>Σ</th>
                <th>Κ</th>
            </tr>
</thead>
<tbody>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
            </tbody>
        </table>
    </div>
            </div>
</body>
</html>
