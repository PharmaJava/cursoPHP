<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    try{

        $base= new PDO ('mysql:host=localhost; dbname=pruebas' ,'root', '');

        echo "Conexion ok <br>";

    }catch(Exception $e){

        die ('Error: ' . $e->GetMessage());

    }finally{

        $base=null;
    }

?>

</body>
</html>