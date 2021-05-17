<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['page_title']?></title>
    <!-- jQuery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!--    <script src="./Assets/js/jquery_3.6.0.js"></script>-->

    <!-- FontAwesome   -->
    <script src="http://localhost/tfg/constructalia/Assets/plugins/awesome/awesome.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
<!--    <link href="./Assets/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <script src="./Assets/js/bootstrap.min.js"></script>-->


</head>
<body>
<?php include 'header.php';?>
<h1>
    <?php echo $data['tag_page']?>
</h1>
<div class="row" >
    <div class="col-md-2">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 280px;height:900px;background-color: #1C2833">
            <a href="http://localhost/tfg/constructalia/home" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4 text-center">Menú</span>
            </a>
            <hr>
            <?php include 'sidebar.php'; ?>
            <hr>
        </div>
    </div>
</div>
<!-- BEGIN FOOTER -->
<?php include 'footer.php';?>
<!-- END FOOTER -->
</body>
</html>