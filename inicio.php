<!DOCTYPE html>
<html>

<head>
	<title>Liga Azteca</title>
	<link rel="stylesheet" type="text/css" href="estilos/pro1.css">
</head>

<body>

    <br/><center><IMG SRC="imagenes/banner3.gif" width='750' height='60'></center>
	<h1><center>~ BIENVENIDOS ~</center></h1>
	
<div class="derecha"><IMG SRC="imagenes/ligaazteca.gif" ></div>

<div class="izquierda"><IMG SRC="imagenes/inicio.gif" width='480' height='320'></div>


<br/><br/><br/><br/>

<!-- Equipos !-->

<center>
<br/><br/>

<div><center><IMG SRC="imagenes/equipos.gif"></center></div>
<br/><br/>
<center>

<div class="escudos"><a href="america.php"><IMG SRC="imagenes/america.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="atlas.php"><IMG SRC="imagenes/atlas.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="jaguares.php"><IMG SRC="imagenes/jaguares.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="chivas.php"><IMG SRC="imagenes/chivas.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="gallos.php"><IMG SRC="imagenes/gallos.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="xolos.php"><IMG SRC="imagenes/xolos.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="azul.php"><IMG SRC="imagenes/azul.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="leon.php"><IMG SRC="imagenes/leon.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="leonesnegros.php"><IMG SRC="imagenes/leonesnegros.gif" width='80' height='80'></a></div>
</center>

<br/><br/><br/><br/>
<center>

<div class="escudos"><a href="monterrey.php"><IMG SRC="imagenes/monterrey.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="monarcas.php"><IMG SRC="imagenes/monarcas.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="pachuca.php"><IMG SRC="imagenes/pachuca.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="puebla.php"><IMG SRC="imagenes/puebla.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="pumas.php"><IMG SRC="imagenes/pumas.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="santos.php"><IMG SRC="imagenes/santos.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="tigres.php"><IMG SRC="imagenes/tigres.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="toluca.php"><IMG SRC="imagenes/toluca.gif" width='80' height='80'></a></div>
<div class="escudos"><a href="veracruz.php"><IMG SRC="imagenes/veracruz.gif" width='80' height='80'></a></div>

<br/><br/><br/>
</center>

<br/><br/>


<!-- Tabla General con Conexión Base de Datos !-->
<div><center><IMG SRC="imagenes/tablagral.gif"></center></div>
<br/><br/><br/>


<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', '123')
    or die('No se pudo conectar: ' . mysql_error());

//echo 'Connected successfully'; //Lo uso para saber si sí conectó a la B.D.

mysql_select_db('LIGA_FUTBOL') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL


$query = "SELECT * FROM Equipo ORDER BY Total_Puntos DESC"; //ORDER BY Nom_Equipo='America'

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
echo "<center><table border=1 width=250>\n";
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td width=100><h3>$col_value</h3></td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table></center>\n";

// Liberar resultados
mysql_free_result($result);

// Cerrar la conexión
mysql_close($link);
?>


<br/><br/><br/>


<br/><br/><br/><center><IMG SRC="imagenes/banner3.gif" width='750' height='60'></center>

<!-- Acceso Administradores !-->

<br/><br/><center>
<div><center><a href="index.php"><IMG SRC="imagenes/acceso.gif" ></a></center></div><br/>
<br/><br/>
</center>


</body>
</html>
