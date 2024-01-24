<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

if($_POST["nombre"] == "" || $_POST["apellido"] ==""|| $_POST["email"] == "" || $_POST["comentarios"]==""){

    echo "Ha habido un error. Revisa los campos";
    die();
}
    $texto_mail=$_POST["comentarios"];

    $destinatario= $_POST["email"];

    $asunto=$_POST["asunto"];

    $headers="MIME-Version: 1.0\r\n";

    //para concatenar variable con ella misma + otra cosa .=
    $headers.="Content-Type: text/html; charset=iso-8859-1\r\n";

    $headers.="From: Prueba Juan <cursos@pildorasinformaticas.es>\r\n";

    $exito=mail($destinatario, $asunto,$texto_mail,$headers);

    if($exito){
        echo "Mensaje enviado con exito";

    }else{
        echo "Ha habido un error";
    }

?>
</body>
</html>