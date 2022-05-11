<?php
//Creo una clase conexion
class Conexion{
    private $con; 
    //constructor
    public function __construct()
    {
        //me conecto a la base de datos bd_prueba
        $this->con = new mysqli('localhost', 'root', '', 'bd_test');
    }
    //Funcion getProductos
    public function getProductos(){
        //Guardo la consulta en una variable
        $query = $this->con->query('SELECT * FROM productos');
        $i = 0;
        $retorno = [];

        while($fila = $query->fetch_assoc()){
            $retorno[$i] = $fila;  //Almaceno los valores de la consulta en array
            $i++;
        }
        //devuelvo el array con los valores de la base de datos
        return $retorno;
    }
    //Esta funcion se utiliza para insertar productos a la base de datos
    public function insertar($nombre_producto, $descripcion, $nombre, $imagen, $cantidad){
        $sql = $this->con->query("INSERT INTO productos (nombre_producto, descripcion, precio, imagen, cantidad) VALUES ('$nombre_producto', '$descripcion', '$nombre', '$imagen', '$cantidad')");
        echo  "<script>alert('Producto Guardado');</script>";
       
    }
    public function agregarCarrito($id_producto){
        $sql = $this->con->query("INSERT INTO carrito_usuarios(id_producto) VALUES ('$id_producto')");
    }
    public function verCarrito(){
        $sql = $this->con->query("SELECT * FROM productos INNER JOIN carrito_usuarios ON productos.id_producto = carrito_usuarios.id_producto");
        $i = 0;
        $retorno = [];
        while($fila = $sql->fetch_assoc()){
            $retorno[$i] = $fila;
            $i++;
        }
        return $retorno;
    }
    public function borrarProductoCarrito($id_sesion){
        $sql = $this->con->query("DELETE FROM carrito_usuarios WHERE id_sesion = '$id_sesion'");
       // echo "Producto supuestamente borrado";
    }
    public function borrarTodoCarrito(){
        $sql = $this->con->query("DELETE FROM carrito_usuarios");
    }
    public function restarStock($id_producto){
        $sql = $this->con->query("UPDATE productos SET cantidad = cantidad - 1 WHERE id_producto = '$id_producto'");
    }
    public function sumarStock($id_producto){
        $sql = $this->con->query("UPDATE productos SET cantidad = cantidad + 1 WHERE id_producto = '$id_producto'");
    }

}

?>