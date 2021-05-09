<?php getModal('modalRol',$data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['page_title']?></title>
    <meta content="Elio Camisón Costa" name="author" />
    <meta content="Rol" name="description" />

    <!-- jQuery  -->
    <script src="./../Assets/js/jquery_3.6.0.js"></script>
    <script src="./../Assets/js/jquery_validate.js"></script>


    <!-- FontAwesome   -->
    <!--<link rel="stylesheet" href="./assets/font-awesome/css/font-awesome.min.css">-->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="./../Assets/css/bootstrap.min.css" type="text/css" media="screen" />
    <script src="./../Assets/js/bootstrap.min.js"></script>

    <!--  TODO meter en assets  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="./../Assets/plugins/DataTables1.10.24/css/jquery.dataTables.css" media="screen"/>
    <script type="text/javascript" src="./../Assets/plugins/DataTables1.10.24/js/jquery.dataTables.js"></script>

    <!-- Custom CSS -->

</head>
<body>

    <h1>
        <?php echo $data['tag_page']?>
        <button type="button" class="btn btn-primary" onclick="openModal();">Añadir un rol</button>
    </h1>

    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="table-rol"></table>
            </div>
        </div>
    </div>

</body>
</html>
<script  src="./../Assets/js/functions_rol.js"></script>