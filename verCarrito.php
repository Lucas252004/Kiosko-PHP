<?php
require("Controller/Controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Productos del Carrito</title>
</head>
<body>
    <!--MENU PRINCIPAL-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="verCarrito.php">Ver Carrito</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Views/insertar_productos.php">Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
    <div align="center">
        <?php
            $precio = 0;
            //Recorro el array con los valores de la base de datos  
            foreach($producto_carrito as $producto){
                echo "<form action='index.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>";
                echo "<div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >";
                //Imprimo los valores por pantalla
                echo "<div class='card-body'>";
                echo "<img src='".$producto['imagen']."' class='card-img-top' alt='foto'><br>";
                echo "<input type='hidden' name='id_producto' placeholder='Descripcion' value='".$producto['id_producto'] ."'>";
                echo "<h5 class='card-title'>". $producto['nombre_producto'] ."</h5>";
                echo "<p class='card-text'>". $producto['descripcion'] ."</p>";
                echo "<p class='card-text'> $". $producto['precio'] ."</p>";
                echo "<input type='submit' name ='boton_borrar' value='Borrar producto' >";
                echo "</div>";
                echo "</div>";
                echo "</form>";   
                $precio += $producto['precio'];  
            }
            echo $precio;
        ?>
    </div>
    <div>
    </div>
</body>
</html>