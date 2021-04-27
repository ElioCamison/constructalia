
<?php

require '../config/BbConnection.php';
session_start();
$pdo = BbConnection::getConnection();
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

if(isset( $_POST) && !empty($_POST)) {

    foreach ($_POST as $key => $value){
        $$key = addslashes($value);
    }


    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ? AND pswd = ?");
//    var_dump($username, $pswd);
    $stmt->execute([$username, md5($pswd)]);
    $user = $stmt->fetch(PDO::FETCH_OBJ);
    var_dump($user);
    if($user){
        $_SESSION['user']=$user;
        header("Location:http://localhost/tfg/constructalia/index.php");
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title>Constructalia | loguin</title>
    <meta content="Elio Camisón Costa" name="author" />
    <meta content="Login" name="description" />

    <!-- jQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!--    FontAwesome  -->
<!--    <link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">-->
<!---->
<!--     Bootstrap -->
<!--    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css" type="text/css" media="screen" />-->
<!--    <script src="./bootstrap/js/bootstrap.min.js"></script>-->
<!---->
<!--     Custom CSS -->
<!--    <link rel="stylesheet" href="./assets/custom_css/restyle.css" type="text/css" media="screen" />-->

</head>

<!-- BEGIN BODY -->
<body>

<!-- BEGIN SECTION -->
<section>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <!-- BEGIN FORM -->
                <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input class="form-control" type="text" name="username" placeholder="Nombre de usuario...">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input class="form-control" type="password" name="pswd" placeholder="Contraseña...">
                    </div>
                    <button class="btn btn-primary custom_button" type="submit">Iniciar sesión</button>
                </form>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</section>
<!-- END SECTION -->

<!-- BEGIN FOOTER -->
<footer>
    <div>
        <p><a class="custom-footer" href="mailto:eliocamison@gmail.com">Constructalia</a></p>
    </div>
</footer>
<!-- END FOOTER -->
</body>
<!-- END BODY -->
</html>