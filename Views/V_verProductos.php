
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Lista de Productos</title>
</head>
<body>
    <!--MENU PRINCIPAL-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">The Editable Web</a>
        <ul class="nav justify-content-end ">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" style="color: white">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="verCarrito.php" style="color: white">Ver Carrito</a>
            </li>
            <li class="nav-item" style="cursor: pointer;">
                <a class="nav-link" style="color: white" id="logout" >Cerrar Sesion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Views/insertar_productos.php" style="color: white">Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
        
        <div align="center" style="padding: 20px;">
        <form action="" id="seccion_id">
            <input type="hidden" id='id_usuario' style='color:red;'>
            <!-- <input type="submit" id="enviar" value="enviar"> -->
        </form>
        
        <h3 id="titulo"></h3> 
            <?php
                //Recorro el array con los valores de la base de datos  
                foreach($productos as $producto){
                    if($producto['cantidad'] <= 0){
                        echo "<form action='index.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>";
                        echo "<div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >";
                        //Imprimo los valores por pantalla
                        echo "<div class='card-body'>";
                        echo "<img src='".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:350px; border-radius: 10px;'><br>";
                        echo "<input type='hidden' name='id_producto' placeholder='Descripcion' value='".$producto['id_producto'] ."'>";
                        echo "<h5 class='card-title'>". $producto['nombre_producto'] ."</h5>";
                        echo "<p class='card-text'>". $producto['descripcion'] ."</p>";
                        echo "<p class='card-text'> $". $producto['precio'] ."</p>";
                        echo "<p class='card-text'> Cantidad ". $producto['cantidad'] ."</p>";
                        echo "<input type='hidden' name ='boton' value='Añadir producto' >";
                        echo "<p class='card-text'>Producto Agotado</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</form>";
                    }else{
                        echo "<form action='index.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>";
                        echo "<div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >";
                        //Imprimo los valores por pantalla
                        echo "<div class='card-body'>";
                        echo "<img src='".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:350px; border-radius: 10px;'><br>";
                        echo "<input type='hidden' name='id_producto' placeholder='Descripcion' value='".$producto['id_producto'] ."'>";
                        echo "<h5 class='card-title'>". $producto['nombre_producto'] ."</h5>";
                        echo "<p class='card-text'>". $producto['descripcion'] ."</p>";
                        echo "<p class='card-text'> $". $producto['precio'] ."</p>";
                        echo "<p class='card-text'> Cantidad ". $producto['cantidad'] ."</p>";
                        echo "<input type='submit' name ='boton' value='Añadir producto' >";
                        echo "</div>";
                        echo "</div>";
                        echo "</form>";
                    }

                   
                }
            ?>
        </div>  
    <script src="usuario_activo.js" type="module"></script>
</body>

</html>