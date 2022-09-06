
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
            <li class='nav-item'>
                <a class='nav-link' href='http://localhost/proyecto_php/Controller/C_cerrar_sesion_admin.php' style='color: white'>Cerrar Sesion Admin</a>
            </li>
        </ul>
    </div>
    </nav>
    
    <div align="center">
    <h1>Hola, <?php echo $_SESSION['nombre']; ?></h1>
    <button type='button' class='btn btn-danger'><a href='http://localhost/proyecto_php/Controller/C_cerrar_sesion_admin.php' style='color: white; text-decoration: none;'>Cerrar Sesion Admin</a></button>
    <h2>Productos del Catalogo</h2>
    <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#exampleModal' data-bs-whatever='@mdo'>Añadir un nuevo Producto</button><br>
    <?php
    foreach($productos as $producto){
        echo "
        <form action='http://localhost/proyecto_php/Controller/C_admin.php' method='POST' enctype='multipart/form-data' style='display: inline-block'>
        <div class='card mb-3' style='max-width: 540px; margin:10px;'>
        <div class='row g-0'>
            <div class='col-md-4'>
            <img src='../".$producto['imagen']."' style='width:250px; height:250px;' class='img-fluid rounded-start' alt='...'>
            </div>
            <div class='col-md-8'>
            <div class='card-body'>
                <input type='text' class='list-group-item' name='id_producto' value='".$producto['id_producto'] ."' readonly >
                <input type='text' class='list-group-item' name='nombre_producto' value='" . $producto['nombre_producto'] . "'>
                <input type='text' class='list-group-item' name='descripcion' value='" . $producto['descripcion'] . "'>
                <input type='text' class='list-group-item' name='precio' value='" . $producto['precio'] . "'>
                <input type='text' class='list-group-item' name='cantidad' value='" . $producto['cantidad'] . "'>
                <input type='text' class='list-group-item' name='categoria' value='" . $producto['categoria'] . "' readonly>
                <br><input class='form-control' type='file' name='foto_editar' multiple>
                <br><p>Mover de Categoria</p>";
                echo "<select id='colorlista_menu' name='lista_categoria' class='form-select' aria-label='Default select example'>";
                foreach($categorias as $categoria){
                    echo "<option value='".$categoria['nombre_categoria']."' >" . $categoria['nombre_categoria'] . "</option>";
                }
                echo "</select>";
                echo "<br><input type='submit' name='editar_producto' class='btn btn-primary' value='Editar'>
                <input type='submit' class='btn btn-danger' name='borrar_producto' value='Borrar'>
            </div>
            </div>
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
                    <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Categoria:</label>
                    <select id=”colorlista_menu” name="lista_categorias" class="form-select" aria-label="Default select example">
                    <?php
                    foreach($categorias as $categoria){
                        echo "<option value='".$categoria['nombre_categoria']."' >" . $categoria['nombre_categoria'] . "</option>";
                    }
                    ?>
                    </select>
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
    <!----------------------------------COLOR DE FONDO------------------------------------------------->
    <div class='card mb-3' style='max-width: 540px; display:inline-block;'>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST">
    <div class='row g-0'>
        <div class='col-md-4'>
        <br><h2>Cambiar Color de Fondo</h2>
        </div>
        <div class='col-md-8'>
        <div class='card-body'>
            <h5 class='card-title'>Escribe el codigo del color:</h5>
            <input type="text" class="form-control" id="floatingInput" placeholder="Color de Fondo" name="colorlista" required/>
            <br><input name="cambiar_color" class="btn btn-primary" type="submit" value="Cambiar el fondo" />
        </div>
        </div>
    </div>
    </form>
    </div>
    


<!----------------------------------------------------------------------->
    <div class='card mb-3' style='max-width: 540px; display:inline-block;'>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST">
    <div class='row g-0'>
        <div class='col-md-4'>
        <br><h2>Cambiar Titulo de la Pagina</h2>
        </div>
        <div class='col-md-8'>
        <div class='card-body'>
            <h5 class='card-title'>Escribe el nuevo titulo</h5>
            <input type="text" class="form-control" id="floatingInput" placeholder="Nuevo titulo" name="titulo_actual" required/>
            <br><input name="cambiar_titulo" class="btn btn-primary" type="submit"  value="Cambiar el titulo" />
        </div>
        </div>
    </div>
    </div>
    </form>
    <!----------------------------------------------------------------------->
    <div class='card mb-3' style='max-width: 540px; display:inline-block;'>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST">
    <div class='row g-0'>
        <div class='col-md-4'>
        <br><h2>Cambiar Color del Menu</h2>
        </div>
        <div class='col-md-8'>
        <div class='card-body'>
            <h5 class='card-title'>Elige un nuevo color:</h5>
            <select id=”colorlista_menu” name="colorlista_menu" class="form-select" aria-label="Default select example">
            <option value="secondary" >Gris</option>
            <option value="success">Verde</option>
            <option value="info" >Celeste</option>
            <option value="danger" >Rojo</option>
            <option value="dark" >Negro</option>
            </select>
            <br><input class="btn btn-primary"  name="cambiar_color_menu" type="submit" value="Cambiar el menu" />
        </div>
        </div>
    </div>
    </div>
    </form>
    <!----------------------------------------------------------------------->
    <div class='card mb-3' style='max-width: 540px; display:inline-block;'>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST" enctype='multipart/form-data'>
    <div class='row g-0'>
        <div class='col-md-4'>
        <br><h2>Cambiar Icono de la Pagina</h2>
        </div>
        <div class='col-md-8'>
        <div class='card-body'>
            <h5 class='card-title'>Elige el nuevo icono</h5>
            <input class='form-control' type='file' name ='icono' multiple>
            <br><input type='submit' class="btn btn-primary" value='Cambiar Icono' name='cambiar_icono'>
        </div>
        </div>
    </div>
    </div>
    </form>
    <!----------------------------------------------------------------------->
    <h2>Categorias de la Pagina</h2>
    <div class='card mb-3' style='max-width: 540px; display:inline-block;'>
    <form action="http://localhost/proyecto_php/Controller/C_admin.php" method="POST">
    <div class='row g-0'>
        <div class='col-md-4'>
        <br><h4>Nueva Categoria</h4>
        </div>
        <div class='col-md-8'>
        <div class='card-body'>
            <h5 class='card-title'>Escribe la nueva categoria</h5>
            <input type="text" class="form-control" id="floatingInput" placeholder="Nueva Categoria" name="categoria" required/>
            <br><input name="agregar_categoria" class="btn btn-primary" type="submit"  value="Agregar" />
        </div>
        </div>
    </div>
    </div>
    </form>
    <div class="col-6">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Editar</th>
        <th scope="col">Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($categorias as $categoria){
            echo "
            <form action='http://localhost/proyecto_php/Controller/C_categorias.php' method='POST'>
            <tr>
            <th scope='row'><input type='text' value='". $categoria['id'] ."' name='id_categoria' readonly style='border:0;'></th>
            <td><input type='text' value='". $categoria['nombre_categoria'] ."' name='nombre_categoria' style='border:0;'></td>
            <td>
            <input type='submit' name='editar_categoria' value='Cambiar' class='btn btn-warning'>
            </td>
            <td>
            <input type='submit' name='borrar_categoria' value='Eliminar' class='btn btn-danger'>
            </td>
            </tr>
            </form>       
            ";
        }
        ?>
    </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src='../js/verificar_admin.js' type='module'></script>
</body>
</html>

