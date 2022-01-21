<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>Blog de productos</title>

    <!--short icon!-->
    <link rel="shortcut icon" href="#">

    <!--CSS !-->
    <link rel="stylesheet" href="style.css">

    <!--font awesome!-->
    <script src="https://kit.fontawesome.com/46fc319774.js" crossorigin="anonymous"></script>
    <script defer src="index.js"></script>
</head>

<body>

    <div class="contenedor-general">

        <!-- CABECERA header -->
        <header class="header" id="cabecera">

            <!-- LOGO -->
            <div id="logo" class="logo">
                <a class="titulo" href="index.php">
                    <i class="fab fa-php"></i> Blog
                </a>
            </div>


            <!-- MENU -->
            <nav id="menu" class="nav">

                <button class="toggle" aria-label="Abrir menu">
                    <i class="fas fa-bars"></i>
                </button>

                <ul class="nav-menu ">
                    <!--!-->
                    <li class="nav-menu-item">
                        <a href="index.php" class="nav-menu-link nav-link">Inicio</a>
                    </li>
                    <!--!-->

                        <?php

                            $categorias = conseguirCategorias($db);
                            if(!empty($categorias)):
                            while ($categoria = mysqli_fetch_assoc($categorias)) :
                        ?>

                        <!--!-->
                            <li class="nav-menu-item">
                                <a href="categoria.php?id<?=$categoria['id']?>"class="nav-menu-link nav-link"><?=$categoria['nombre']?></a>
                            </li>
                        <!--!-->

                        <?php 
                                endwhile;
                            endif;
                        ?>  

                        <!--!-->
                            <li class="nav-menu-item">
                                <a href="index.php" class="nav-menu-link nav-link">Sobre mi</a>
                            </li>
                        <!--!-->
                            <li class="nav-menu-item">
                                <a href="index.php" class="nav-menu-link nav-link nav-menu-link_active">Contacto</a>
                            </li>
                    <!--!-->
                </ul>
            </nav>

            <div class="clearfix"></div>
        </header>

        
