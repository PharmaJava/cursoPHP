<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usu"];
        $contrasenia = $_POST["contra"];

        $pass_cifrado = password_hash($contrasenia, PASSWORD_DEFAULT, array ("cost"=>12));

        try {
            $base = new PDO('mysql:host=localhost; dbname=pruebas', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            $sql = "INSERT INTO USUARIO_PASS (USUARIOS, PASSWORD) VALUES (:usu, :contra)";

            $resultado = $base->prepare($sql);

            $resultado->execute(array(":usu" => $usuario, ":contra" => $pass_cifrado));

            echo "Registro insertado";
        } catch (PDOException $e) {
            echo "Error en la conexión a la base de datos: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
