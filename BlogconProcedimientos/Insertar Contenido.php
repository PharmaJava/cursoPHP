<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    $miconexion= mysqli_connect("localhost","root","","bbddblog");

    //comprobar conexion

    if(!$miconexion){

        echo"La conexion ha fallado" . mysqli_error();

        exit();
    }
    if($_FILES['imagen']['error']){

        switch($_FILES ['imagen']['error']){

            case 1://Error exceso de tamaño de archivo en php.ini
                    echo "El tamaño del archivo excede lo permtido";
                    break;
            case 2: //Error tamaño del archivo marcado desde formulario
                echo "El tamaño del archivo excede 2 MB";
                break;
            case 3://Corrupcion de archivo
                echo "El envio de archivo se interrumpio";
            case 4: // No hay fichero
                echo "No se ha enviado ningun archivo";
            break;    
            }    
        }else{
            echo "Entrada subida correctamente <br/>";

            if((isset($_FILES['imagen']['name']) && $_FILES['imagen']['error']== UPLOAD_ERR_OK)){
              
                // Creamos el directorio de imágenes

$destino_de_ruta="imagenes/";

// if(!file_exists($destino_de_ruta)){
//     mkdir($destino_de_ruta, 0777);
// }
                // $destino_de_ruta="imagen/";

                move_uploaded_file($_FILES['imagen']['tmp_name'],$destino_de_ruta . $_FILES ['imagen']['name']);
           
                echo "El archivo" . $_FILES['imagen']['name'] . " Se ha copiado en el directorio de imagenes";
            
            
            }else{
                echo "El archivo no se ha podido copiar";
            }
        }
    

    $eltitulo=$_POST['campo_titulo'];
    $lafecha=date("Y-m-d h:i:s");
    $elcomentario=$_POST['area_comentarios'];
    $laimagen=$_FILES['imagen']['name'];

    $miconsulta= "INSERT INTO contenido (Titulo, Fecha, Comentario, Imagen) VALUES ('".$eltitulo."','".$lafecha."', '".$elcomentario."', '".$laimagen."')";

    $resultado=mysqli_query($miconexion,$miconsulta);

    /*cerramos conexion */

    mysqli_close($miconexion);

    echo "<br/> Se ha agregado el comentario con exito . <br/><br/>";
?>

<a href="Formulario.php"> Añadir nueva entrada</a>
<a href="Mostrar Blog.php">Mostrar el Blog</a>


</body>
</html>