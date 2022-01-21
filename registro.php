<?php
if (isset($_POST)) {

    // Conexion a la base de datos
    require_once 'includes/conexion.php';

    // Iniciar sesion
    if(!isset($_SESSION)){
		session_start();
	}
   
    // RECOGER LOS VALORES DEL FORMULARIO DE REGISTRO - " si existen los valores que el valor recogido sea $_POST'variable' y si no que sea 'false' "
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

    // Array de errores
    $errores = array();

    // Validar los datos antes de guardarlos en la base de datos
    // Validar campo nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {     /* => Si la variable nombre no esta vacia y ademas no es numerico y ademas no hay ningun numero del 0 al 9 , estara valido el nombre */
        $nombre_validado = true;
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }


    // Validar apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }


    // Validar el email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
        
    } else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }


    // Validar la contraseña
    if (!empty($password)) {
        $password_validado = true;
    } else {
        $password_validado = false;
        $errores['password'] = "La contraseña  esta vacia";
    }


    // Guardar usuario
    $guardar_usuario = false;

    if (count($errores) == 0) {  /* => Cuando no halla ningun error guardar eL usuario*/
        $guardar_usuario = true;

        // Encriptar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);

        /* var_dump($password);
        var_dump($password_segura);
        var_dump(password_verify($password,$password_segura));
        die(); */

        // INSERTAR UN USUARIO EN TABLA DE USUARIOS DE LA BDD
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);

        /*var_dump(mysqli_error($db));
        die();*/

        if ($guardar) {
            $_SESSION['completado'] = "El registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general'] = "Error al guardar el usuario!!";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');
