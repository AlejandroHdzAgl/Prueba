<html>

<head>
    <title>Modificaciones</title>
    <link rel="stylesheet" type="text/css" href="estilos/pro1.css">
</head>

<body>

<?php

session_start();

include_once "conexion.php";

 

function verificar_login($user,$password,&$result) {

    $sql = "SELECT * FROM usuarios WHERE usuario = '$user' and password = '$password'";

    $rec = mysql_query($sql);

    $count = 0;

 

    while($row = mysql_fetch_object($rec))

    {

        $count++;

        $result = $row;

    }

 

    if($count == 1)

    {

        return 1;

    }

 

    else

    {

        return 0;

    }

}

 

if(!isset($_SESSION['userid']))

{

    if(isset($_POST['login']))

    {

        if(verificar_login($_POST['user'],$_POST['password'],$result) == 1)

        {

            $_SESSION['userid'] = $result->idusuario;

            header("location:index.php");

        }

        else

        {

            echo '<div class="error">Su usuario es incorrecto, intente nuevamente.</div>';

        }

    }

?>

 

<style type="text/css">

*{

    font-size: 14px;

}

body{

background-image:url('imagenes/cancha.jpg');
background-repeat:repeat; 
background-position:center; 
background-attachment: fixed;

}

form.login {

    background: none repeat scroll 0 0 #F1F1F1;

    border: 1px solid #DDDDDD;

    font-family: sans-serif;

    margin: 0 auto;

    padding: 20px;

    width: 278px;

    box-shadow:0px 0px 20px black;

    border-radius:10px;

}

form.login div {

    margin-bottom: 15px;

    overflow: hidden;

}

form.login div label {

    display: block;

    float: left;

    line-height: 25px;

}

form.login div input[type="text"], form.login div input[type="password"] {

    border: 1px solid #DCDCDC;

    float: right;

    padding: 4px;

}

form.login div input[type="submit"] {

    background: none repeat scroll 0 0 #DEDEDE;

    border: 1px solid #C6C6C6;

    float: right;

    font-weight: bold;

    padding: 4px 20px;

}

.error{

    color: red;

    font-weight: bold;

    margin: 10px;

    text-align: center;

}

</style>

 

<form action="" method="post" class="login">

    <div><label>Usario</label><input name="user" type="text" ></div>

    <div><label>Password</label><input name="password" type="password"></div>

    <div><input name="login" type="submit" value="login"></div>

</form>

<?php

} else {


    echo '<h2>Su usuario ingreso correctamente. Cargando...</h2>';

    //echo'<br/>Atrás...<br/><br/>'

    //echo '<meta http-equiv="Refresh" content="3;url=http://www.mediotiempo.com">';

    echo '<a href="logout.php"><IMG SRC="imagenes/flecha2.jpg"></a>';

}

?>

</body>
</html>