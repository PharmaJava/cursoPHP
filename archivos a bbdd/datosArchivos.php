<?php
// Recibimos los datos del archivo
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamagno_archivo = $_FILES['archivo']['size'];

// Ruta de la carpeta destino en el servidor
$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '/img/';

// Verificamos el tamaño del archivo
if ($tamagno_archivo <= 10000000) {
    
    // Movemos el archivo del directorio temporal al directorio escogido
    move_uploaded_file($_FILES['archivo']['tmp_name'], $carpeta_destino . $nombre_archivo);

    // Conectamos a la base de datos
    require("datos_conexion.php");
    $conexion = mysqli_connect($db_host, $db_usuario, $db_contra, $db_nombre);

    if (mysqli_connect_errno()) {
        echo "Fallo al conectar con la BBDD <br>";
        exit();
    }
    mysqli_select_db($conexion, $db_nombre) or die("No se pudo seleccionar la base de datos");
    mysqli_set_charset($conexion, "utf8");

    // Abrimos el archivo y leemos su contenido
    $archivo_objetivo = fopen($carpeta_destino . $nombre_archivo, "rb"); // "rb" para lectura binaria
    $contenido = fread($archivo_objetivo, $tamagno_archivo);
    fclose($archivo_objetivo);

    // Preparamos la consulta SQL con parámetros preparados
    $sql = "INSERT INTO ARCHIVOS (Id, Nombre, Tipo, Contenido) VALUES (0, ?, ?, ?)";
    $consulta = mysqli_prepare($conexion, $sql);

    // Ligamos los parámetros
    mysqli_stmt_bind_param($consulta, "sss", $nombre_archivo, $tipo_archivo, $contenido);

    // Ejecutamos la consulta
    $resultado = mysqli_stmt_execute($consulta);

    if ($resultado) {
        echo "Se ha insertado el registro con éxito";
    } else {
        echo "No se ha podido insertar el registro";
    }

    // Cerramos la conexión
    mysqli_close($conexion);
} else {
    echo "El tamaño del archivo es demasiado grande";
}
?>
