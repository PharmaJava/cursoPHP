<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


<style>

    h1{
        text-align:center;
        color: #00f;
        border-bottom: dotted#0000FF;
    }

    table{
        border:1px solid #F00;
        padding:20 px 50 px;
        margin-top:50px;
        
    }
    body{
        background-color: #ffc;
    }

    </style>
    </head>

    <body>
        <h1>Insertar Artículos</h1>

        <form name="form1" method="post" action ="pagina_eliminar_pdo.php">
            <table border="0" align="center" >
                <tr>
                    <td>Codigo Articulo</td>
                    <td><label for="c_art"></label>
                    <input type="text" name="c_art"id="c_art"></td>
</tr>
<tr>
   <td>Seccion</td>
   <td><label for="seccion"></label>
   <input type="text" name="seccion" id="seccion"></td>
</tr>
<tr>
   <td>Nombre de Articulo</td>
   <td><label for="n_art"></label>
   <input type="text" name="n_art" id="n_art"></td>
</tr>
<tr>
   <td>Precio</td>
   <td><label for="precio"></label>
   <input type="text" name="precio" id="precio"></td>
</tr>
<tr>
   <td>Fecha</td>
   <td><label for="fecha"></label>
   <input type="text" name="fecha" id="fecha"></td>
</tr>
<tr>
   <td>Importado</td>
   <td><label for="importado"></label>
   <input type="text" name="importado" id="importado"></td>
</tr>
<tr>
   <td>Pais de Origen</td>
   <td><label for="Pais_Origen"></label>
   <input type="text" name="p_orig" id="p_orig"></td>
</tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
</tr>
<tr>
    <td align="center"><input type="submit" name="Insertar" id="Insertar" value="Insertar"></td>
    <td align="center"><input type="reset" name="Borrar" id="Borrar" value="Borrar"></td>
</table>
</form>
</body>
</html>