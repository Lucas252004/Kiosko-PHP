<html>
<head>
<title>Elegir color de fondo con PHP</title>
<?php
$fondo = $_POST['colorlista'];
$nombre = $_POST['nombrecolor'];
?>
<style>
body {
<?php
if (empty($nombre)) {
if (!empty($fondo)) { ?>
background: <?php echo $fondo ?>;
<?php
} else { ?>
background: LimeGreen ;
<?php } ?>
<?php
} else {
?>
background: <?php echo $nombre?>;
<?php
}
?>
}
</style>
</head>
 
<body>
<form action="#" method="POST">
<span>Selecciona un color de la lista: </span>
<select id=”colorlista” name="colorlista">
<option value="LimeGreen" >Lima</option>
<option value="YellowGreen">Amarillo verdoso</option>
<option value="Crimson" >Carmesí</option>
<option value="SteelBlue" >Azul Acero</option>
</select>
<span>ó Escribe el nombre en inglés de un color:</span>
<input type="text" name="nombrecolor" /><br/>
<input name="cambiarfondo" type="submit" value="Cambiar el fondo!" />
</form>
</body>
</html>