<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header("location: ./");
}
include "../conexion.php";

if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['nombre'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {

        $nombre = $_POST['nombre'];
        $usuario_id = $_SESSION['idUser'];


        $query = mysqli_query($conection, "SELECT * FROM equipos WHERE nombre = '$nombre'");
        $result = mysqli_fetch_array($query);

        if ($result > 0) {
            $alert = '<p class="msg_error">El equipo ya existe.</p>';
        } else {
            $query_insert = mysqli_query($conection, "INSERT INTO equipos (nombre, usuario_id) VALUE ('$nombre', '$usuario_id')");

            if ($query_insert) {
                $alert = '<p class="msg_save">Equipo creado correctamente.</p>';
            } else {
                $alert = '<p class="msg_error">Error al crear el equipo.</p>';
            }
        }
    }
}

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
    <title>Registrar Equipos</title>
</head>

<body>
    <?php include "include/navlateral.php"; ?>
    <section class="dashboard">

        <div class="form_register">
            <h1 class="user_new"><i class="fa-solid fa-user-plus"></i> Registrar Equipo</h1>
            <hr class="hr">
            <div class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
                
                <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Registrar</button>

            </form>

        </div>

    </section>



    <?php
    include "include/footer.php";
    ?>
</body>

</html>