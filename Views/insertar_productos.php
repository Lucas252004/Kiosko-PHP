
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Insertar Productos</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
</head>
<body>
    <!--MENU PRINCIPAL-->
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
    <div class='container-fluid'>
        <a class='navbar-brand' href='#'>The Editable Web</a>
        <ul class='nav justify-content-end'>
            <li class='nav-item'>
                <a class='nav-link active' aria-current='page' href='http://localhost/proyecto_php/' style='color: white'>Inicio</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='http://localhost/proyecto_php/Controller/C_carrito.php' style='color: white'>Ver Carrito</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='#' style='color: white' >Iniciar Sesion</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='http://localhost/proyecto_php/Controller/C_insertar_producto.php' style='color: white'>Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
    <!--Formulario para añadir productos-->
    <div align='center'>
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

    <?php
        echo "<table class='table table-dark table-striped'>
        <thead>
        <tr>
            <th scope='col'>ID</th>
            <th scope='col'>Nombre</th>
            <th scope='col'>Descripcion</th>
            <th scope='col'>Precio</th>
            <th scope='col'>Cantidad</th>
            <th scope='col'>Imagen</th>
            <th scope='col'>Editar</th>
            <th scope='col'>Borrar</th>
        </tr>
        </thead>";
        //Recorro el array con los valores de la base de datos  
        foreach($productos as $producto){
        echo " 
        <form action='http://localhost/proyecto_php/Controller/C_insertar_producto.php' method='POST'> 
        <tbody>
        <tr>
            <th scope='row'><input type='text' hidden name='id_producto' value='" . $producto['id_producto'] . "'></th>
            <td name='nombre_producto'> " . $producto['nombre_producto'] . "</td>
            <td>" . $producto['descripcion'] . "</td>
            <td>" . $producto['precio'] . "</td>
            <td>" . $producto['cantidad'] . "</td>
            <td><img src='../".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:50px; width:50px; border-radius: 10px;'></td>
            <td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo'>Editar</button></td>
            <td><input type='submit' class='btn btn-danger' name='borrar_producto' value='Borrar'></td>
        </tr>

        </tbody>";

        echo "</form>";

        }
        echo "</table>";
        
    ?>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src='../usuario_activo.js' type='module'></script>
</body>
</html>

