<?php
require("Controller/C_carrito.php");
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">The Editable Web</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" style="color: white">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="verCarrito.php" style="color: white">Ver Carrito</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white">Iniciar Sesion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Views/insertar_productos.php" style="color: white">Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
    <div align="center">
        <?php
            $precio = 0;
            //Recorro el array con los valores de la base de datos  
            foreach($producto_carrito as $producto){
                echo "<form action='verCarrito.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>";
                echo "<div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >";
                //Imprimo los valores por pantalla
                echo "<div class='card-body'>";
                echo "<img src='".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:350px; border-radius: 10px;'><br>";
                echo "<input type='hidden' name='id_producto' placeholder='Descripcion' value='".$producto['id_producto'] ."'>";
                echo "<input type='hidden' name='id_sesion' placeholder='Descripcion' value='".$producto['id_carrito'] ."'>";
                echo "<h5 class='card-title'>". $producto['nombre_producto'] ."</h5>";
                echo "<p class='card-text'>". $producto['descripcion'] ."</p>";
                echo "<p class='card-text'> $". $producto['precio'] ."</p>";
                echo "<input type='submit' name ='boton_borrar' value='Borrar producto' >";
                echo "</div>";
                echo "</div>";
                echo "</form>";   
                $precio += $producto['precio'];  
            }
        ?>
    </div>
    <div align="center">
        <?php
            echo "<h2>Precio Total: $".$precio."</h2>";
        ?>  
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Finalizar Compra</button>
            <!--Ventana Emergente para finalizar la compra-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Informacion para la Compra</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="verCarrito.php" method="post">
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Numero de Tarjeta:</label>
                        <input type="number" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Fecha de Vencimiento:</label>
                        <input type="date" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Clave de Seguridad:</label>
                        <input type="password" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Añada un Comentario:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary" name="comprar" value="Comprar">
                    </div>
                    </form>
                </div>
            </div>
            </div>
    </div>
    <!--Scripts de JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="usuario_activo.js" type="module"></script>
</body>
</html>