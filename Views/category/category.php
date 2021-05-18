<?php getModal('modalCategory',$data); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['page_title']?></title>
    <meta content="Elio Camisón Costa" name="author" />
    <meta content="Users" name="description" />

    <!-- jQuery  -->
<!--    <script src="http://localhost/tfg/constructalia/Assets/js/jquery_3.6.0.js"></script>-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="http://localhost/tfg/constructalia/Assets/js/jquery_validate.js"></script>


    <!-- FontAwesome   -->
    <script src="http://localhost/tfg/constructalia/Assets/plugins/awesome/awesome.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<!--    <link rel="stylesheet" href="http://localhost/tfg/constructalia/Assets/css/bootstrap.min.css" type="text/css" media="screen" />-->
<!--    <script src="http://localhost/tfg/constructalia/Assets/js/bootstrap.min.js"></script>-->

    <!--  TODO meter en assets  -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!--  Bootbox  -->
    <script src="http://localhost/tfg/constructalia/Assets/plugins/bootbox/bootbox.min.js"></script>
    <script src="http://localhost/tfg/constructalia/Assets/plugins/bootbox/bootbox.locales.js"></script>


    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" media="screen"/>
    <!--    <link rel="stylesheet" type="text/css" href="http://localhost/tfg/constructalia/Assets/plugins/DataTables1.10.24/css/jquery.dataTables.css" media="screen"/>-->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <!-- Custom CSS -->

</head>
<body>
<header style="background-color: #1C2833;height: 50px;color: white" class="text-right">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="40" height="40" class="rounded-circle me-2">
            <strong>mdo</strong>
        </a>
    </div>
</header>
<div class="row" >
    <div class="col-md-2">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px;height:975px;background-color: #1C2833">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">Menú</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="http://localhost/tfg/constructalia/home" class="nav-link active" aria-current="page">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"></use></svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/rol" class="nav-link text-white" title="Roles de usuario">
                        <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
                        Roles
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/user" class="nav-link text-white" title="Usuarios">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        Usuarios
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/staff" class="nav-link text-white" title="Personal">
                        <i class="far fa-address-card"></i>
                        Personal
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/buildingSite" class="nav-link text-white" title="Obras">
                        <i class="fas fa-building"></i>
                        Obras
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/machinery" class="nav-link text-white" title="Maquinaria">
                        <i class="fas fa-industry"></i>
                        Maquinaria
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/outsource" class="nav-link text-white" title="Subcontratas">
                        <i class="fas fa-briefcase"></i>
                        Subcontratas
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/outsourced" class="nav-link text-white" title="Subcontratados">
                        <i class="fas fa-boxes"></i>
                        Subcontratados
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/category" class="nav-link text-white" title="Categoria">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        Categoria
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/training" class="nav-link text-white" title="Formación">
                        <i class="fas fa-book"></i>
                        Formación
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/machineryFamily" class="nav-link text-white" title="Familia maquinaria">
                        <i class="fas fa-cogs"></i>
                        Familia maquinaria
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/supplier" class="nav-link text-white" title="Proveedores">
                        <i class="fas fa-balance-scale-left"></i>
                        Proveedores
                    </a>
                </li>
                <li>
                    <a href="http://localhost/tfg/constructalia/ordering" class="nav-link text-white" title="Pedidos">
                        <i class="fas fa-calendar-alt"></i>
                        Pedidos
                    </a>
                </li>
            </ul>
            <hr>
        </div>
    </div>
    <div class="col-md-10">
        <h1 class="align-items-center" style="background-color: whitesmoke;margin: 25px;box-shadow: 3px 3px lightgrey;height: 100px;display: flex">
            <?php echo $data['icon'];echo $data['page_title']?>
        </h1>
        <hr class="text-center" style="margin: 20px">
        <div class="row col-md-2" style="margin: 20px">
            <button type="button" class="btn btn-warning" title="Añadir obra" onclick="openModal();"><i class="fas fa-plus"></i> Añadir categoria</button>
        </div>
        <section>
            <div class="table-responsive" style="margin: 20px;height:650px;background-color: whitesmoke;box-shadow: 3px 3px lightgray;">
                <table class="table table-hover table-bordered" id="table-category"></table>
            </div>
        </section>
    </div>
</div>
<!-- BEGIN FOOTER -->
<footer class="text-center">
    <a class="custom-footer" href="https://github.com/ElioCamison/constructalia"><i class="fab fa-github" style="color: #1C2833"></i></a>
</footer>
<!-- END FOOTER -->
</body>
</html>
<script  src="http://localhost/tfg/constructalia/Assets/js/functions_category.js"></script>