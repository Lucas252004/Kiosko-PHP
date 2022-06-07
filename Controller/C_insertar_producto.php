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
    $con->insertar($nombre_producto, $descripcion, $precio, $imagen, $cantidad);
}
//Borrar Producto del catalogo
if(isset($_POST['borrar_producto'])){
    print_r($_POST['id_producto']);
    $id_producto =  $_POST['id_producto'];
    $con->borrarProductoCatalogo($id_producto);
    print_r("Producto Borrado");
    
}
//Editar Producto del catalogo
if(isset($_POST['editar_producto'])){
    print_r($_POST['id_producto']);
}
require_once('../Views/insertar_productos.php');
?>