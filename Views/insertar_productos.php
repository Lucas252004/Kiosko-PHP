
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Insertar Productos</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>
<style>
    #icono{
        width: 50px;
        height: 50px;
        border-radius: 10px;
        margin-left: 10px;
    }
</style>
<?php
$prueba = "white";
foreach($color_actual as $color){
    $prueba = $color['codigo_color'];
}
echo "<body style='background-color:". $prueba . ";'>";
?>
    <!--MENU PRINCIPAL-->
    <?php
    $test = "dark";
    foreach($color_actual_menu as $color_menu){
        $test = $color_menu['codigo_color'];
    }
    foreach($icono_actual as $icono){
        $imagen_icono = $icono['codigo_color'];
    }
    echo "<nav class='navbar navbar-expand-lg navbar-dark bg-". $test ."' ><img src='../". $imagen_icono ."' alt='' id='icono'>";
    ?>
    <div class='container-fluid'>
    <?php
        //TITULO DE LA PAGINA GUARDADA EN LA BASE DE DATOS
        foreach($titulo_actual as $titulo){
           echo "<a class='navbar-brand' href='#'>". $titulo['codigo_color'] ."</a>";
        }
        ?>
        <ul class='nav justify-content-end'>
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='http://localhost/proyecto_php/' style='color: white'>Inicio</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='http://localhost/proyecto_php/Controller/C_carrito.php' style='color: white'>Ver Carrito</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='http://localhost/proyecto_php/Controller/C_insertar_producto.php' style='color: white'>Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
    <!--Formulario para añadir productos-->
    <div align='center'>
    <h2>Agregar Producto</h2>
    <div align='center' style='background-color: #DEDEDE;' class='col-6'>
        <form action='http://localhost/proyecto_php/Controller/C_insertar_producto.php' method='POST' enctype='multipart/form-data' style='padding: 10px; margin: 10px;'>
            <input type='text' name='nombre' placeholder='Nombre del Producto'style='padding: 10px; margin: 10px;'><br>
            <input type='text' name='descripcion' placeholder='Descripcion'style='padding: 10px; margin: 10px;'><br>
            <input type='text' name='precio' placeholder='Precio'style='padding: 10px; margin: 10px;'>
            <input type='text' name='cantidad' placeholder='Cantidad'style='padding: 10px; margin: 10px;'>
            <div class='mb-3 col-6'>
                <label for='formFileMultiple' class='form-label'>Imagen del Producto</label>
                <input class='form-control' type='file' name ='foto' id='formFileMultiple' multiple>
            </div>
            <input type='submit' value='Añadir producto' name='insertar'>
        </form>
    </div>
    </div>
    <div>
    <?php
        echo "<table class='table table-dark table-striped'>
        <thead>
        <tr>
            <th scope='col' type='hidden'>ID</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Descripcion</th>
            <th scope='col'>Precio</th>
            <th scope='col'>Cantidad</th>
            <th scope='col'>Imagen</th>
            <th scope='col'>Cambiar Imagen</th>
        </tr>
        </thead>";
        //Recorro el array con los valores de la base de datos  
        foreach($productos as $producto){
        echo " 
        <form action='http://localhost/proyecto_php/Controller/C_insertar_producto.php' method='POST' enctype='multipart/form-data'> 
        <tbody>
        <tr>
            <th scope='row'><input type='text' name='id_producto' value='" . $producto['id_producto'] . "' readonly></th>
            <td><input type='text' name='nombre_producto' value='" . $producto['nombre_producto'] . "'></td>
            <td><input type='text' name='descripcion' value='" . $producto['descripcion'] . "'></td>
            <td><input type='text' name='precio' value='" . $producto['precio'] . "'></td>
            <td><input type='text' name='cantidad' value='" . $producto['cantidad'] . "'></td>
            <td><img src='../".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:50px; width:50px; border-radius: 10px;'></td>
            <div class='col-6'><td><input class='form-control' type='file' name='foto_editar' multiple></div><td>
            <td><input type='submit' name='editar_producto' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo' value='Editar'></td>
            <td><input type='submit' class='btn btn-danger' name='borrar_producto' value='Borrar'></td>
            
        </tr>

        </tbody>";
        echo "</form>";

        }

        echo "</table>";
 
        
    ?>
    </div>
    <div align="center">
    <h2>Edicion de Diseño</h2>
    <h3>Cambiar color de Fondo</h3>
    <form action="http://localhost/proyecto_php/Controller/C_insertar_producto.php" method="POST">
        <span>Selecciona un color de la lista: </span>
        <select id=”colorlista” name="colorlista">
        <option value="White" >Blanco</option>
        <option value="LimeGreen" >Lima</option>
        <option value="YellowGreen">Amarillo verdoso</option>
        <option value="Crimson" >Carmesí</option>
        <option value="SteelBlue" >Azul Acero</option>
        <option value="#9D649B" >Violeta</option>
        </select>
        <!-- <span>ó Escribe el nombre en inglés de un color:</span>
        <input type="text" name="nombrecolor" /><br/> -->
        <input name="cambiar_color" type="submit" value="Cambiar el fondo!" />
    </form>
    <h3>Cambiar color de la barra de navegacion</h3>
    <form action="http://localhost/proyecto_php/Controller/C_insertar_producto.php" method="POST">
        <span>Selecciona un color de la lista: </span>
        <select id=”colorlista_menu” name="colorlista_menu">
        <option value="secondary" >Gris</option>
        <option value="success">Verde</option>
        <option value="info" >Celeste</option>
        <option value="danger" >Rojo</option>
        <option value="dark" >Negro</option>
        </select>
        <!-- <span>ó Escribe el nombre en inglés de un color:</span>
        <input type="text" name="nombrecolor" /><br/> -->
        <input name="cambiar_color_menu" type="submit" value="Cambiar el menu!" />
    </form>
    <form action="http://localhost/proyecto_php/Controller/C_insertar_producto.php" method="POST">
    <?php
    foreach($titulo_actual as $titulo){
        echo "<input type='text' name='titulo_actual' value='" . $titulo['codigo_color'] . "'>";
    }
    ?>
    <input type="submit" name='cambiar_titulo'>
    </form>
    <form action="http://localhost/proyecto_php/Controller/C_insertar_producto.php" method="POST" enctype='multipart/form-data'>
        <div class='mb-3 col-6'>
            <label for='formFileMultiple' class='form-label'>Cambiar Icono de la Pagina</label>
            <input class='form-control' type='file' name ='icono' multiple>
        </div>
        <input type='submit' value='Añadir producto' name='cambiar_icono'> 
    </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src='../verificar_admin.js' type='module'></script>
</body>
</html>

