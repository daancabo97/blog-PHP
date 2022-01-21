<?php

/*Validar errores de los cammpos del formulario registro*/
function mostrarError($errores, $campo){

    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)) {
        $alerta = "<div class='alerta alerta-error'>".$errores[$campo].'</div>';
    }

    return $alerta;   
    
}


/*Borrar la sesion de  errores validados de los campos*/
function borrarErrores(){
    $borrado = false;

    $_SESSION['errores'] = null;
    $borrado = session_unset();
    

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        $borrado = true;
    }

    return $borrado;
}

function conseguirCategorias($conexion){
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);

    $result = array();
    if($categorias && mysqli_num_rows($categorias) >=1) {
        $resultado = $categorias;
    }

    return $resultado;
}

function conseguirEntradas($conexion){
    $sql="SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
         "INNER JOIN categorias c ON e.categoria_id = c.id ".
         "ORDER BY e.id DESC LIMIT 4";
    
    $entradas = mysqli_query($conexion ,$sql);

    $resultado = array();
    if($entradas && mysqli_num_rows($entradas) >= 1){
        $resultado = $entradas;
    }

    return $entradas;
}

