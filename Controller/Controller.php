<?php
//Llamo al archivo Conexion.php
require('Model/Conexion.php');

//Creo una clase Conexion
$con = new Conexion();
//Llamo a la funcion getProductos() y almaceno el valor en una variable
$productos = $con->getProductos();

//Si existe un archivo con el nombre fotos...
if(isset($_FILES['foto'])){
    //Variables nombre, precio y descripcion
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $nombre_producto = $_POST['nombre'];
    //Guardar imagen
    $file = $_FILES['foto'];
    $carpeta = "img/";
    $ruta_provisional = $file['tmp_name'];
    $tipo = $file['type'];
    $size = $file['size'];
    //Condicional si el archivo no es una imagen
    if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
        echo "El archivo no es una imagen";
    //Condicional si el archivo es superior a 3MB
    }else if($size > 3*1024*1024){
        echo "Error, el tamaño maximo es de 3MB";
    }else{
        $src = $carpeta.$nombre_producto;
        move_uploaded_file($ruta_provisional, $src);
        $imagen='img/'.$nombre_producto;
    }
    //Instruccion SQL
    //Llamo a la funcion insertar
    $con->insertar($nombre_producto, $descripcion, $precio, $imagen);
    
}
//-----------------AÑADIR AL CARRITO---------------------
if(isset($_POST['boton'])){
    $id_producto = [];
    $id_producto = $_POST['id_producto'];
    echo "<script>alert('Has añadido el producto al carrito');</script>";
    $con->agregarCarrito($id_producto);
}
//-----------------VER PRODUCTOS QUE ESTAN EN EL CARRITO----------
$producto_carrito = $con->verCarrito();
//-----------------BORRAR PRODUCTOS DEL CARRITO-------------------
if(isset($_POST['boton_borrar'])){
    $id_producto = [];
    $id_producto = $_POST['id_producto'];
    $con->borrarProductoCarrito($id_producto);
    echo "<script>alert('Producto Borrado');</script>";
}
//-----------------BORRAR TODOS LOS PRODUCTOS DEL CARRITO AL REALIZAR LA COMPRA--------------
if(isset($_POST['comprar'])){
    $con->borrarTodoCarrito();
    echo "<script>alert('Compra Realizada con Exito !');</script>";
}
?>