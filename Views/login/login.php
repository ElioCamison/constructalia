<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['page_title']?></title>
    <meta content="Elio Camisón Costa" name="author" />
    <meta content="Login" name="description" />

    <!-- jQuery  -->
    <script src="http://localhost/tfg/constructalia/Assets/js/jquery_3.6.0.js"></script>
    <script src="http://localhost/tfg/constructalia/Assets/js/jquery_validate.js"></script>

    <!-- FontAwesome   -->
    <script src="http://localhost/tfg/constructalia/Assets/plugins/awesome/awesome.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://localhost/tfg/constructalia/Assets/css/bootstrap.min.css" type="text/css" media="screen" />
    <script src="http://localhost/tfg/constructalia/Assets/js/bootstrap.min.js"></script>

</head>


<body class="text-center">
<section>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
                <h1>Constructalia</h1>
                <!-- BEGIN FORM -->
                <form id="formLogin" class="formLogin">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input class="form-control" type="text" name="loginNick" placeholder="Nombre de usuario">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input class="form-control" type="password" name="loginPswd" placeholder="Contraseña..." autocomplete="off">
                    </div>
                    <button class="btn btn-primary" type="submit">Iniciar sesión</button>
                </form>
                <!-- END FORM -->
            </div>
        </div>
    </div>
</section>
</body>
</html>
<script  src="http://localhost/tfg/constructalia/Assets/js/functions_login.js"></script>
