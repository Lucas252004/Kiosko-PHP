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
    echo  "<script>alert('Producto Guardado');</script>";
}
//Borrar Producto del catalogo
if(isset($_POST['borrar_producto'])){
    print_r($_POST['id_producto']);
    $id_producto =  $_POST['id_producto'];
    $con->borrarProductoCatalogo($id_producto);
    print_r("Producto Borrado");
    
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
    $tipo = $file['type'];
    $size = $file['size'];
     //Condicional si el archivo no es una imagen
        if($tipo != 'image/jpg' && $tipo != 'image/JPG' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
            echo "El archivo no es una imagen";
            //En caso que no haya una imagen para cambiar, actualizo el producto sin imagen
            $con->actualizarProductoSinImagen($id_producto, $nombre_producto, $descripcion, $precio, $cantidad);
            echo "Producto Actualizado sin Imagen"; 
        //Condicional si el archivo es superior a 3MB
        }else if($size > 3*1024*1024){
            echo "Error, el tamaño maximo es de 3MB";
        }else{
            $src = $carpeta.$nombre_producto;
            move_uploaded_file($ruta_provisional, $src);
            $imagen='img/'.$nombre_producto;
            //Actualizo el producto con la imagen
            $con->actualizarProducto($id_producto, $nombre_producto, $descripcion, $precio, $cantidad, $imagen);
            echo "Producto Actualizado";
        }
    }
}
//Diseño de colores de la Pagina
if(isset($_POST['cambiar_color'])){
    //echo "OK";
    $color = $_POST['colorlista'];
    //print_r($color);
    $con->insertarColores($color);
    //echo "COLOR OK";
}
//Diseño de colores de la Pagina
if(isset($_POST['cambiar_color_menu'])){
    //echo "OK";
    $color = $_POST['colorlista_menu'];
    //print_r($color);
    $con->insertarColoresMenu($color);
    //echo "COLOR OK";
}
$color_actual = $con->getColorActual();
//-----------COLOR ACTUAL DEL MENU------------------
$color_actual_menu = $con->getColorMenuActual();
//----------ENCABEZADO DE LA PAGINA-----------------
$titulo_actual = $con->getTitulo();
if(isset($_POST['cambiar_titulo'])){
    print_r($_POST['titulo_actual']);
    $titulo_nuevo = $_POST['titulo_actual'];
    $con->cambiarTitulo($titulo_nuevo);
    echo "Titulo Cambiado";
}
//Guardar imagen en el caso que el usuario haya deseado cambiar la imagen del producto
if(isset($_FILES['icono'])){
    
    $file = $_FILES['icono'];
    $nombre_icono = $file['name'];
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
            $src = $carpeta.$nombre_icono;
            move_uploaded_file($ruta_provisional, $src);
            $imagen='img/'.$nombre_icono;
            //Actualizo el producto con la imagen
            $con->cambiarIcono($imagen);
            echo "Icono Actualizado";
        }
}
$icono_actual = $con->getIcono();
require_once('../Views/insertar_productos.php');
?>