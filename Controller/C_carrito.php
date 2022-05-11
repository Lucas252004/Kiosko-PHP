<?php
require('Model/Conexion.php');
$con = new Conexion();
$producto_carrito = $con->verCarrito();
//-----------------BORRAR PRODUCTOS DEL CARRITO-------------------
if(isset($_POST['boton_borrar'])){
    $id_producto = 0;
    $id_producto = $_POST['id_producto'];
    $id_sesion = $_POST['id_sesion'];
    $con->sumarStock($id_producto);
    $con->borrarProductoCarrito($id_sesion);
    echo "<script>alert('Producto Borrado');</script>";
}
//-----------------BORRAR TODOS LOS PRODUCTOS DEL CARRITO AL REALIZAR LA COMPRA--------------
if(isset($_POST['comprar'])){
    $con->borrarTodoCarrito();
    echo "<script>alert('Compra Realizada con Exito !');</script>";
}
?>