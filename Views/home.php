<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['tag_page'] ?></title>
    <meta content="Elio Camisón Costa" name="author" />
    <meta content="Constructalia" name="description" />

</head>
<body style="background-color: #2C3E50">
<header>
    <h1 style="color: white"><?php echo $data['page_title'] ?></h1>
</header>
<nav></nav>

<section id="<?php echo $data['page_id'] ?>">

    <p><?php echo $data['page_content'] ?></p>

<!--    <div style="background-color: #808B96; width: 250px; height: 1000px">-->
<!--        <ul>-->
<!--            <li><a href="">Maquinaria</a></li>-->
<!--            <li><a href="">Pedidos</a></li>-->
<!--            <li><a href="">Personal</a></li>-->
<!--            <li><a href="">Configuración</a></li>-->
<!--        </ul>-->
<!--    </div>-->

</section>
</body>



</html>
