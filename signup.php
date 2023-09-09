<?php include("php/signup.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Εγγραφή</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS link files -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

</head>

<body>
    <div class="container signup register">
        <div id="reg-title">
            <h2>Φόρμα Εγγραφής</h2>
        </div>
        <!-- Forma eggrafis opou o xristis prepei na eisagei username, password, onoma, epwnimo, email kai am 
             me to kathena apo auta na exei kai kapoio pattern pou apaiteitai -->
        <form class="form-horizontal" method="post">
            <?php include('php/errors.php'); ?>
            
            <div class="form-group">
                <label class="col-sm-2" for="username">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,}"
                        title="Απαιτούνται τουλάχιστον 5 χαρακτήρες στα λατινικά" name="username">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2" for="password">Κωδικός Πρόσβασης</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="password"
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}"
                        title="Απαιτούνται τουλάχιστον 8 χαρακτήρες, με τουλάχιστον 1 γράμμα, 1 αριθμό και 1 σύμβολο"
                        name="my_password">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2" for="confirm_password">Επιβεβαίωση Κωδικού Πρόσβασης</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirm_password"
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}" name="confirm_password">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2" for="firstname">Όνομα</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname" pattern="[a-zA-Z]{3,}" name="firstname">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2" for="lastname">Επώνυμο</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" pattern="[a-zA-Z]{3,}" name="lastname">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2" for="email">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2" for="am">AM</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="am" name="am">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10">
                    <a class="btn btn-default" href="login.php">Επιστροφή</a>
                    <button type="submit" class="btn btn-default" name="reg_user">Εγγραφή</button>
                </div>
            </div>
        </form>

    </div>

</body>

</html>