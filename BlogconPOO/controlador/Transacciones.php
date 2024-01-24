<?php

include_once("../modelo/Objeto_Blog.php");
include_once("../modelo/Manejo_Objeto.php");

try {
    $miconexion = new PDO('mysql:host=localhost; dbname=bbddblog', 'root', '');
    $miconexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_FILES['imagen']['error']) {
        // Manejar errores de carga de archivos aquí
        // ...

    } else {
        echo "Entrada subida correctamente <br/>";

        if (isset($_FILES['imagen']['name']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
            $destino_de_ruta = "../imagenes/";
            
            // Verificar y crear el directorio si no existe
            if (!file_exists($destino_de_ruta)) {
                mkdir($destino_de_ruta, 0777, true); // El tercer parámetro "true" crea directorios recursivamente.
            }

            // Mover el archivo
            move_uploaded_file($_FILES['imagen']['tmp_name'], $destino_de_ruta . $_FILES['imagen']['name']);

            echo "El archivo " . $_FILES['imagen']['name'] . " se ha copiado en el directorio de imágenes";
        } else {
            echo "El archivo no se ha podido copiar";
        }
    }

    $Manejo_Objetos = new Manejo_Objeto($miconexion);

    $blog = new Objeto_Blog();
    $blog->setTitulo(htmlentities($_POST["campo_titulo"], ENT_QUOTES));
    $blog->setFecha(date("Y-m-d H:i:s"));
    $blog->setComentario(htmlentities($_POST["area_comentarios"], ENT_QUOTES));
    $blog->setImagen($_FILES["imagen"]["name"]);

    $Manejo_Objetos->insertaContenido($blog);

    echo " <br/> Entrada de blog agregada con éxito <br/>";
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>
