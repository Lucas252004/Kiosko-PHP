
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
                <a class='nav-link' href='http://localhost/proyecto_php/Controller/C_admin.php' style='color: white'>Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
    
    <div align="center">
    <h1>Productos del Catalogo</h1>
    <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo'>Añadir un nuevo Producto</button><br>
    <?php
    foreach($productos as $producto){
        echo "
        <form action='http://localhost/proyecto_php/Controller/C_admin.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>
            <div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >
            <div class='card-body'>
            
            <img src='../".$producto['imagen']."' class='card-img-top' alt='foto' style=' height:350px; border-radius: 10px;'><br>
            <br><input type='text' class='list-group-item' name='id_producto' value='".$producto['id_producto'] ."' readonly ><br>
            <br><input type='text' class='list-group-item' name='nombre_producto' value='" . $producto['nombre_producto'] . "'><br>
            <br><input type='text' class='list-group-item' name='descripcion' value='" . $producto['descripcion'] . "'><br>
            <br><input type='text' class='list-group-item' name='precio' value='" . $producto['precio'] . "'><br>
            <br><input type='text' class='list-group-item' name='cantidad' value='" . $producto['cantidad'] . "'><br>
            <br><input class='form-control' type='file' name='foto_editar' multiple><br>
        
            <br><input type='submit' name='editar_producto' class='btn btn-primary' value='Editar'>
            <input type='submit' class='btn btn-danger' name='borrar_producto' value='Borrar'>
            </div>
            </div>
        </form>
        ";
    }
    ?>
    </div>
    <div align="center">
    <!--Formulario para añadir productos-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir un Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="post" enctype='multipart/form-data'>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre del Producto:</label>
                        <input type="text" class="form-control" id="recipient-name" name='nombre' placeholder='Nombre del Producto' required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripcion:</label>
                        <textarea class="form-control" id="message-text" name="descripcion"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Precio:</label>
                        <input type="number" class="form-control" id="recipient-name" name='precio' placeholder='Precio' required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Cantidad:</label>
                        <input type="number" class="form-control" id="recipient-name" name='cantidad' placeholder='Cantidad' required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Imagen:</label>
                        <input type="file" class="form-control" id="recipient-name" name='foto' multiple>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary"  name='insertar' value="Añadir">
                    </div>
                    </form>
                </div>
                </div>
            </div>
    </div>

    <h2>Diseño de la Pagina</h2>
    <div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >
    <h4>Cambiar color de Fondo</h4>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST">
        <span>Escribe el codigo del color:</span>
        <div class="col-8"><input type="text" class="form-control" id="floatingInput" placeholder="Color de Fondo" name="colorlista" /></div></br>
        <br><input name="cambiar_color" class="btn btn-secondary" type="submit" class="btn btn-secondary" value="Cambiar el fondo" />
    </form>
    </div>

    <div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >
    <h4>Cambiar color de la barra de navegacion</h4>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST">
        <span>Selecciona un color de la lista: </span><br>
        <div class="col-8">
        <select id=”colorlista_menu” name="colorlista_menu" class="form-select" aria-label="Default select example">
        <option value="secondary" >Gris</option>
        <option value="success">Verde</option>
        <option value="info" >Celeste</option>
        <option value="danger" >Rojo</option>
        <option value="dark" >Negro</option>
        </select><br>
        </div>
        <!-- <span>ó Escribe el nombre en inglés de un color:</span>
        <input type="text" name="nombrecolor" /><br/> -->
        <br><input class="btn btn-secondary" name="cambiar_color_menu" type="submit" value="Cambiar el menu" />
    </form>
    </div>
    <div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >
    <h4>Cambiar Titulo Actual de la Pagina</h4>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST">
    <?php
    foreach($titulo_actual as $titulo){
        echo "<div class='col-8'><input type='text' class='form-control' name='titulo_actual' value='" . $titulo['codigo_color'] . "'></div>";
    }
    ?><br>
    <br><input type="submit" class="btn btn-secondary" name='cambiar_titulo' style="margin-button: 20px;">
    </form>
    </div>
    <div class='card' style='width: 18rem; display: inline-block ; margin: 10px;'align='center'; >
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST" enctype='multipart/form-data'>
        <div class='mb-3 col-8'>
            <h4>Cambiar Icono de la Pagina</h4>
            <input class='form-control' type='file' name ='icono' multiple>
        </div>
        <input type='submit' class="btn btn-secondary" value='Cambiar Icono' name='cambiar_icono'> 
    </form>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src='../verificar_admin.js' type='module'></script>
</body>
</html>

