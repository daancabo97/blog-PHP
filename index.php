<?php require_once 'includes/cabecera.php'; ?>

<!-- <div id="contenedor"> -->
<?php require_once 'includes/lateral.php'; ?>


<!-- CAJA PRINCIPAL contenido -->
<main class="contenido">
    <div id="principal">
        <h1>Ultimas Entradas</h1>
        <!--!-->
        <?php
        $entradas = conseguirEntradas($db);
        if (!empty($entradas)) :
            while ($entrada = mysqli_fetch_assoc($entradas)) :
        ?>
                <!--!-->
                <article class="entrada">

                    <a href="">
                        <h2><?= $entrada['titulo'] ?></h2>
                        <span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha']; ?></span>
                        <p>
                            <?= substr($entrada['descripcion'], 0, 130) . "..." ?>
                        </p>
                    </a>
                </article>
                <!--!-->

        <?php
            endwhile;
        endif;
        ?>
        <!--!-->

        <div id="ver-todas">
            <a href="">Ver todas las entradas</a>
        </div>
    </div><!-- Fin principal contenido -->

</main>
<!-- Fin contenido principal-->
<!-- </div>-->


<?php require_once 'includes/pie.php'; ?>