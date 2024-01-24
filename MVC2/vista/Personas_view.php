<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- <link rel="stylesheet" type="text/css" href="hoja.css"> -->

</head>
<body>

<?php

    require("modelo/paginacion.php");
?>

<table>

<tr><td>Nombre del Articulo</td>

<?php

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

<table width="50%" border="0" align="center">
    <tr>
        <td class="primera_fila">Id</td>
        <td class="primera_fila">Nombre</td>
        <td class="primera_fila">Apellido</td>
        <td class="primera_fila">Dirección</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
        <td class="sin">&nbsp;</td>
    </tr>

    <?php foreach($matrizPersonas as $persona): ?>
        <tr>
            <td><?php echo $persona->["Id"]?></td>
            <td><?php echo $persona->["Nombre"]?></td>
            <td><?php echo $persona->["Apellido"]?></td>
            <td><?php echo $persona->["Direccion"]?></td>
            <td class="bot">
                <a href="borrar.php?Id=<?php echo $persona->Id?>">
                    <input type='button' name='del' id='del' value='Borrar'>
                </a>
            </td>
            <td class='bot'>
                <a href="editar.php?Id=<?php echo $persona["Id"]?>&nom=<?php echo urlencode($persona["Nombre"]) ?>&ape=<?php echo urlencode($persona["Apellido"]) ?>&dir=<?php echo urlencode($persona["Direccion"]) ?>">
                    <input type='button' name='up' id='up' value='Actualizar'>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <td class="sin">&nbsp;</td>
        <td><input type='text' name='Nom' size='10' class='centrado'></td>
        <td><input type='text' name='Ape' size='10' class='centrado'></td>
        <td><input type='text' name='Dir' size='10' class='centrado'></td>
        <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
    </tr>
    <tr><td><?php
//   ----------------PAGINACION--------------//

    for ($i=1; $i<=$total_paginas; $i++) {

    echo "<a href='?pagina=" . $i . "'>" . $i . "</a>";
}

?></td></tr>
</table>
</form>

?>
</table>

</body>
</html>