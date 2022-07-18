<?php
//Llamo al archivo Conexion.php
require_once('../Model/Conexion.php');
$con = new Conexion();
$productos = $con->getProductos();
 //Si existe un archivo con el nombre fotos...
if(isset($_FILES['foto'])){
     //Variables nombre, precio y descripcion
     $descripcion = $_POST['descripcion'];
     $precio = $_POST['precio'];
     $nombre_producto = $_POST['nombre'];
     $cantidad = $_POST['cantidad'];
     //Guardar imagen
     $file = $_FILES['foto'];
     $carpeta = "../img/";
     $ruta_provisional = $file['tmp_name'];
     $nombre_imagen = $file['name'];
     $tipo = $file['type'];
     $size = $file['size'];
     //Condicional si el archivo no es una imagen
    if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
        echo "El archivo no es una imagen";
     //Condicional si el archivo es superior a 3MB
    }else if($size > 3*1024*1024){
        echo "Error, el tamaño maximo es de 3MB";
    }else{
        $src = $carpeta.$nombre_imagen;
        move_uploaded_file($ruta_provisional, $src);
        $imagen='img/'.$nombre_imagen;
    }
    //Instruccion SQL
    //Llamo a la funcion insertar
    $con->insertar($nombre_producto, $descripcion, $precio, $imagen, $cantidad);
    echo  "<script>alert('Producto Guardado');</script>";
    header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
}
//Borrar Producto del catalogo
if(isset($_POST['borrar_producto'])){
    print_r($_POST['id_producto']);
    $id_producto =  $_POST['id_producto'];
    $con->borrarProductoCatalogo($id_producto);
    print_r("Producto Borrado");
    header("Location: http://localhost/proyecto_php/Controller/C_admin.php");
    
}
//Editar Producto del catalogo
$producto_elegido = [];
if(isset($_POST['editar_producto'])){
    //Obtengo los valores enviados por POST
    $id_producto =  $_POST['id_producto'];
    $nombre_producto =  $_POST['nombre_producto'];
    $descripcion =  $_POST['descripcion'];
    $precio =  $_POST['precio'];
    $cantidad =  $_POST['cantidad'];
    //Guardar imagen en el caso que el usuario haya deseado cambiar la imagen del producto
    if(isset($_FILES['foto_editar'])){
        $file = $_FILES['foto_editar'];
        $carpeta = "../img/";
        $ruta_provisional = $file['tmp_name'];
        $nombre_imagen = $file['name'];
        $tipo = $file['type'];
        $size = $file['size'];
        //Condicional si el archivo no es una imagen
        if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
            echo "El archivo no es una imagen";
            //En caso que no haya una imagen para cambiar, actualizo el producto sin imagen
            $con->actualizarProductoSinImagen($id_producto, $nombre_producto, $descripcion, $precio, $cantidad);
            echo "<script>alert('Producto Actualizado')</script>"; 
        }else if($size > 3*1024*1024){
            echo "Error, el tamaño maximo es de 3MB";
        }else{
            $src = $carpeta.$nombre_imagen;
            move_uploaded_file($ruta_provisional, $src);
            $imagen='img/'.$nombre_imagen;
            //Actualizo el producto con la imagen
            $con->actualizarProducto($id_producto, $nombre_producto, $descripcion, $precio, $cantidad, $imagen);
            echo "<script>alert('Producto Actualizado con Imagen')</script>";
           // header("Location: http://localhost/proyecto_php/Controller/C_insertar_producto.php");
        }
    }
}
?>