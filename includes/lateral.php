

<!-- BARRA LATERAL sidebar -->
<aside class="sidebar" id="sidebar">


    <?php if (isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
        </div>
        <!-- Botones -->
        <a href="cerrar.php" class="boton boton-crear">Crear entradas <i class="fas fa-pencil-alt"></i></a><br>
        <a href="crear-categoria.php" class="boton boton-categoria">Crear categoria <i class="fas fa-pencil-alt"></i></a><br>
        <a href="cerrar.php" class="boton boton-ver">Ver mis datos <i class="fas fa-eye"></i></a><br>
        <a href="cerrar.php" class="boton">Cerrar Sesion <i class="fas fa-door-closed"></i></a><br>
    <?php endif; ?>

    <?php if (!isset($_SESSION['usuario'])): ?>
    <div id="login" class="bloque">
        <h3>Iniciar Sesion</h3>

        <?php if (isset($_SESSION['error_login'])) : ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['error_login'];?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="post">
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" />

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña" />

            <input type="submit" value="Entrar" />
        </form>
    </div>

    <div id="register" class="bloque">

        <?php
        /* if(isset($_SESSION['errores'])): ?>  
                <?php var_dump($_SESSION['errores']); ?> 
                <?php endif;*/
        ?>

        <!-- Mostrar errores -->
        <h3>Registro</h3>
        <?php if (isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?= $_SESSION['completado'] ?>
            </div>
        <?php elseif (isset($_SESSION['errores']['general'])) : ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['errores']['general'] ?>
            </div>
        <?php endif; ?>
        <!-- -->

        <form action="registro.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" placeholder="Nombre" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : '' ?>
            <!-- llamada a la funcion "mostrarError" proveniente de helpers para mostrar validacion del error en el campo -->

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" placeholder="Apellidos" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : '' ?>
            <!-- llamada a la funcion "mostrarError" proveniente de helpers para mostrar validacion del error en el campo -->

            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Email" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : '' ?>
            <!-- llamada a la funcion "mostrarError" proveniente de helpers para mostrar validacion del error en el campo -->

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña" />
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : '' ?>
            <!-- llamada a la funcion "mostrarError" proveniente de helpers para mostrar validacion del error en el campo -->

            <input type="submit" value="Registrar" name="submit" />
        </form>
        <?php borrarErrores(); ?>
        <!-- llamada a la funcion para borrar validaciones de los errores mostrados en cada uno de los campos -->
    </div>
    <?php endif;?>
</aside>