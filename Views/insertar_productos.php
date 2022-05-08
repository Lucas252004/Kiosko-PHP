
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!--MENU PRINCIPAL-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">The Editable Web</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php" style="color: white">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../verCarrito.php" style="color: white">Ver Carrito</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="color: white" >Iniciar Sesion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="Views/insertar_productos.php" style="color: white">Añadir Productos</a>
            </li>
        </ul>
    </div>
    </nav>
    <!--Formulario para añadir productos-->
    <div align="center">
    <div align="center" style="background-color: #DEDEDE;" class="col-6">
        <form action="../index.php" method="POST" enctype="multipart/form-data" style="padding: 10px; margin: 10px;">
            <input type="text" name="nombre" placeholder="Nombre del Producto"style="padding: 10px; margin: 10px;"><br>
            <input type="text" name="descripcion" placeholder="Descripcion"style="padding: 10px; margin: 10px;"><br>
            <input type="text" name="precio" placeholder="Precio"style="padding: 10px; margin: 10px;">
            <div class="mb-3 col-6">
                <label for="formFileMultiple" class="form-label">Imagen del Producto</label>
                <input class="form-control" type="file" name ="foto" id="formFileMultiple" multiple>
            </div>
            <input type="submit" value="Añadir producto" >
        </form>
    </div>
    </div>


</body>
</html>

