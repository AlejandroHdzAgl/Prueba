<html>

<head>
	<title>Club Queretaro</title>
	<link rel="stylesheet" type="text/css" href="estilos/pro1.css">

<body>

<br/><br/><br/>

<div class="escudos"><center><IMG SRC="imagenes/gallos.gif" width='80' height='80'></center></div>
<center><h2>Club Queretaro</h2></center>

<br/><br/><center><h2>~ Jugadores ~</h2></center>

<center><table border=1 width=900>
	<tr>
		<td width=100><h3>ID_Jugador</h3></td>
		<td width=100><h3>Nombre</h3></td>
		<td width=100><h3>Equipo</h3></td>
		<td width=100><h3>Posicion</h3></td>
		<td width=100><h3>Numero</h3></td>
		<td width=100><h3>Amonestaciones</h3></td>
		<td width=100><h3>Expulsiones</h3></td>
	</tr>
</center></table>

<?php
// Conectando, seleccionando la base de datos
$link = mysql_connect('localhost', 'root', '123')
    or die('No se pudo conectar: ' . mysql_error());

//echo 'Connected successfully'; //Lo uso para saber si sí conectó a la B.D.

mysql_select_db('LIGA_FUTBOL') or die('No se pudo seleccionar la base de datos');

// Realizar una consulta MySQL

$query = "SELECT * FROM Jugador Where Nom_Equipo='Club Queretaro'";

$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

// Imprimir los resultados en HTML
echo "<center><table border=1 width=900>\n";
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
<center><h1>Regresar</h1><a href="inicio.php"><IMG SRC="imagenes/flecha.gif"></a><center>

</body>
</html>
