<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'includes/cabecera.php'; ?>
<?php require_once 'includes/lateral.php'; ?>

<!-- CAJA PRINCIPAL contenido -->
<main class="contenido">
    <div id="principal">
        <h1>Crear Categoria</h1>
        <form action="guardar-categoria php" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre" />

            <input type="submit" value="guardar" />
        </form>


    </div><!-- Fin principal contenido -->

</main>