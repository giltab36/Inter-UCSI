<?php

$alert = '';

session_start();

if (!empty($_SESSION['active'])) {
    header('location: sistema/');
} else {

    if (!empty($_POST)) {
        if (empty($_POST['nombre']) || empty($_POST['clave'])) {
            $alert = "Ingrese su nombre de usuario y su clave";
        } else {

            require_once "conexion.php";

            $user = mysqli_real_escape_string($conection, $_POST['nombre']);
            $pass = md5(mysqli_real_escape_string($conection, $_POST['clave']));

            $query = mysqli_query($conection, "SELECT u.id, u.nombre, u.correo, u.state, u.rol, r.rol AS n_rol FROM usuarios u
                                                INNER JOIN rol r ON u.rol = r.id
                                                WHERE u.nombre = '$user' AND u.clave = '$pass' AND u.state = 1");
            mysqli_close($conection);
            $result = mysqli_num_rows($query);

            if ($result > 0) {
                $data = mysqli_fetch_array($query);
                $_SESSION['active'] = true;
                $_SESSION['idUser'] = $data['id'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['email'] = $data['correo'];
                $_SESSION['rol'] = $data['rol'];
                $_SESSION['Nrol'] = $data['n_rol'];

                header('location: sistema/');
            } else {
                $alert = "El usuario o la clave son incorrectos";
                session_destroy();
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/png" href="./images/logo.png" sizes="16x16">
</head>

<body style="background: url('./images/fondo1.jpg') no-repeat; background-size: 100% 100%; background-position: center;">

    <div class="content">
        <form action="" method="post">
            <h3>Iniciar Sesión</h3>
            <img src="./images/logoUcsi2.png" alt="Login">

            <input type="text" name="nombre" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Contraseña">
            <div class="alert" style="color: red;"><b><?php echo isset($alert) ? $alert : ''; ?></b></div>
            <input type="submit" value="Ingresar">

        </form>
    </div>

</body>

</html>