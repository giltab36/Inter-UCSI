<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header("location: ./");
}
include "../conexion.php";

if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['equipo_id']) || empty($_POST['jugador_id'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {

        $equipo = $_POST['equipo_id'];
        $jugador = $_POST['jugador_id'];
        $usuario_id = $_SESSION['idUser'];


        $query_insert = mysqli_query($conection, "INSERT INTO equipos_jugadores (equipo_id, jugador_id, usuario_id) VALUE ('$equipo', '$jugador', '$usuario_id')");

        if ($query_insert) {
            $alert = '<p class="msg_save">Relacion creado correctamente.</p>';
        } else {
            $alert = '<p class="msg_error">Error al crear la relacion.</p>';
        }
    }
}

// Datos para el formulario
$query_equipo = mysqli_query($conection, "SELECT * FROM equipos");
$result_equipo = mysqli_num_rows($query_equipo);
$query_jugador = mysqli_query($conection, "SELECT id, nombre FROM jugadores");
$result_jugador = mysqli_num_rows($query_jugador);



//	Datos de la Empresa
/* $nombreEmpresa = '';

$query_empresa = mysqli_query($conection, "SELECT nombre FROM configuracion");
$row_empesa = mysqli_num_rows($query_empresa);

if ($row_empesa > 0) {
	while ($arrayInfoEmpresa  = mysqli_fetch_assoc($query_empresa)) {
		$nombreEmpresa = $arrayInfoEmpresa['nombre'];
	}
} */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "include/script.php"; ?>
    <title>Registrar</title>
</head>

<body>
    <?php include "include/navlateral.php"; ?>
    <section id="dashboard">

        <div class="form_register">
            <h1 class="user_new"><i class="fa-solid fa-user-plus"></i> Registrar Relaicion</h1>
            <hr class="hr">
            <div class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">

                <label for="nombre">Nombre</label>
                <select name="nombre" id="nombre">
                    <?php
                    if ($result_equipo > 0) {
                        while ($equipos = mysqli_fetch_array($query_equipo)) {
                    ?>
                            <option value="<?php echo $equipos["id"] ?>"><?php echo $equipos["nombre"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>


                <label for="jugador1">Jugadores</label>
                <select name="jugador1" id="jugador1">
                    <?php
                    if ($result_jugador > 0) {
                        while ($jugador = mysqli_fetch_array($query_jugador)) {
                    ?>
                            <option value="<?php echo $jugador["id"] ?>"><?php echo $jugador["nombre"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="jugador2"></label>
                <select name="jugador2" id="jugador2">
                    <?php
                    if ($result_jugador > 0) {
                        while ($jugadores = mysqli_fetch_array($query_jugador)) {
                    ?>
                            <option value="<?php echo $jugadores["id"] ?>"><?php echo $jugadores["nombre"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Registrar</button>

            </form>

        </div>

    </section>



    <?php
    include "include/footer.php";
    mysqli_close($conection);
    ?>
</body>

</html>