<?php
require("utils/Database/Database.php");
require("utils/Session.php");

// Define variables and initialize with empty values
$name = $surname = $numarTel = $email = $username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if(isset($_POST['register'])){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    }
    else {
        $username = trim($_POST['username']);
    }


    // Validare nume
    if(empty(trim($_POST["nume"]))){
        $name_err = "Numele nu este complet";
    } elseif(strlen(trim($_POST["nume"])) < 3){
        $name_err = "Numele trebuie sa contina minim 3 caractere";
    } else{
        $name = trim($_POST["nume"]);
    }

    //Validare email
    if(empty(trim($_POST["email"]))){
        $email_err = "Email-ul nu este complet";
    } elseif(strlen(trim($_POST["email"])) < 3) {
        $email_err = "Email-ul trebuie sa contina minim 3 caractere";
    } else {
        $email = trim($_POST["email"]);
    }

    //Validare numar de telefon
    if(empty(trim($_POST["telefon"]))) {
        $telefon_err = "Numarul de telefon nu este complet";
    } elseif(strlen(trim($_POST["telefon"])) < 10){
        $telefon_err = "Numarul de telefon trebuie sa contina maxim 10 caractere, doar cifre";
    }  else{
        }
    $numarTel= trim($_POST["telefon"]);
    }

    // Validare surname
    if(empty($_POST["surname"])){
        $surname_err = "surnamele nu este complet";
    } elseif(strlen(trim($_POST["surname"])) < 3){
        $surname_err = "surnamele trebuie sa contina minim 3 caractere";
    } else{
        $surname = trim($_POST["surname"]);
    }

    // Validare parola
    if(empty($_POST["password"])){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = $_POST["password"];
    }

    // Validarea parolei confirmate
    if(empty($_POST["confirm_password"])) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = $_POST["confirm_password"];
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($surname_err) && empty($email_err) && empty($telefon_err)){

        // Prepare an insert statement
        $today = date("Y-m-d H:i:s");
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $query = "INSERT INTO `user` (`id_p`,`nume`,`prenume`,`username`,`email`,`password`,`ph_number`,`register_date`,`agreed_ts`) VALUES (NULL,'$name','$surname','$username','$email','$password','$numarTel','$today',1)";
        //print_r($query);die();
        $sql = mysqli_query($link,$query);



            if($sql){
                // Redirect to login page
                header("location: login");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }



    }

    // Close connection
    mysqli_close($link);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Centrul Medical Brancusi | CRM</title>
    <link rel="stylesheet" href="utils/general.css">
    <link href="utils/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="utils/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
    <link href="utils/bootstrap/css/bootstrap-utilities.css" rel="stylesheet">

</head>
<body>
<?php require_once("header.php"); ?>
<div class="container">
    <section class="vh-100" >
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Inregistreaza-te</p>

                                    <form class="mx-1 mx-md-4" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Nume</label>
                                                <input type="text" name="nume" id="form3Example1c" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>" />

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Prenume</label>
                                                <input type="text" name="surname" id="form3Example1c" class="form-control <?php echo (!empty($surname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $surname; ?>" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example1c">Username</label>
                                                <input type="text" name="username" id="form3Example1c" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" />
                                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Email-ul dvs.</label>
                                                <input type="email" name="email" id="form3Example3c" class="form-control" <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"/>

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example3c">Numar de telefon</label>
                                                <input type="tel" name="telefon" id="form3Example3c" class="form-control" <?php echo (!empty($telefon_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $numarTel; ?>"/>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4c">Parola</label>
                                                <input type="password" name="password" id="form3Example4c" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"" />
                                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label" for="form3Example4cd">Confirma parola</label>
                                                <input type="password" name="confirm_password" id="form3Example4cd" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>"" />
                                                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input
                                                    class="form-check-input me-2"
                                                    type="checkbox"
                                                    value=""
                                                    id="form2Example3c"
                                            />
                                            <label class="form-check-label" for="form2Example3">
                                                Sunt de acord cu toate <a href="#!">Termenii si conditiile</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" name="register" id="register" class="btn btn-dark btn-lg">Inregistreaza-te</button>
                                        </div>

                                    </form>

                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.png" class="img-fluid" alt="Sample image">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php require_once("footer.php"); ?>
</body>
<script src="utils/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="utils/bootstrap/js/bootstrap.min.js"></script>
<script src="utils/bootstrap/js/bootstrap.esm.js"></script>
</html>
