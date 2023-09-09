<?php include("php/log.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Αρχική</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS files -->
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
                <li class="nav-item active">
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
    
    <!-- Main Content -->
    <div class="content">
        <!-- Homepage pou exei tis treis kyries katigories Mathimata - Arxeia - Programma -->
        <div class="card-box home">

            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="images/university.png" alt="University image">
                <div class="card-body">
                    <h5 class="card-title">Μαθήματα</h5>
                    <p class="card-text">Όλα τα μαθήματα της σχολής που έχουν διαθέσιμες εργασίες.</p>
                    <a href="list_lessons.php" class="btn btn-primary">Περισσότερα</a>
                </div>
            </div>

            <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="images/folder.png" alt="Folder image">
                <div class="card-body">
                    <h5 class="card-title">Αρχεία</h5>
                    <p class="card-text">Τα αρχεία που έχετε παραδώσει.</p>
                    <a href="list_files.php" class="btn btn-primary">Περισσότερα</a>
                </div>
            </div>

            <div class="card-box">
                <div class="card" style="width: 20rem;">
                    <img class="card-img-top" src="images/calendar.png" alt="Calendar image">
                    <div class="card-body">
                        <h5 class="card-title">Πρόγραμμα</h5>
                        <p class="card-text">Το πρόγραμμα των μαθημάτων για το τρέχον εξάμηνο.</p>
                        <a href="calendar.php" class="btn btn-primary">Περισσότερα</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>