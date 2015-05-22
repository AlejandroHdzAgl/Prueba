<?php

include("conexionGeneral.php");

$con=mysql_connect($host,$user,$pw) or die("Problemas al conectar.");

mysql_select_db($db,$con) or die("Problema con Base de Datos");

mysql_query("UPDATE Sede set NOMBRE='$_POST[nuevo]' WHERE NOMBRE='$_POST[viejo]'",$con)or die(mysql_error());

?>