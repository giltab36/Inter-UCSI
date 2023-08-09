<?php
session_start();

include "../conexion.php";

if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['nombre']) || empty($_POST['n_remera'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {

        $equipo = $_POST['equipo_id'];
        $nombre = $_POST['nombre'];
        $ruc = $_POST['cedula'];
        $n_remera = $_POST['n_remera'];
        $goles = $_POST['goles'];
        $targetas = $_POST['targetas'];
        $usuario_id = $_SESSION['idUser'];
        $estatus = $_POST['estatus'];

        $result = 0;
        if ((is_numeric($ruc)) and $ruc != 0) {
            $query = mysqli_query($conection, "SELECT * FROM jugadores WHERE cedula = '$ruc'");
            $result = mysqli_fetch_array($query);
        }
        if ($result > 0) {
            $alert = '<p class="msg_error">El numero de Cedula ya existe!</p>';
        } else {
            $query_insert = mysqli_query($conection, "INSERT INTO jugadores (equipo_id, nombre, cedula, n_remera, goles, targetas, usuario_id, estatus) VALUE ('$equipo', '$nombre', '$ruc', '$n_remera', '$goles', '$targetas' , '$usuario_id', '$estatus')");

            if ($query_insert) {
                $alert = '<p class="msg_save">Jugador creado correctamente.</p>';
            } else {
                $alert = '<p class="msg_error">Error al registras el Jugador.</p>';
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
    <title>Registrar Jugador</title>
</head>

<body>
    <?php include "include/nav.php"; ?>
    <section class="dashboard">

        <div class="form_register">
            <h1 class="user_new"><i class="fa-solid fa-user-plus"></i> Registrar Jugador</h1>
            <hr class="hr">
            <div class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>
            
            <form action="" method="post">
                <h3><u>Categoria Femenino</u></h3>
                <label for="equipo">Nombre del Equipo</label>

                <?php
                $query_equipo = mysqli_query($conection, "SELECT * FROM equipos");
                mysqli_close($conection);
                $result_equipo = mysqli_num_rows($query_equipo);
                ?>

                <select name="equipo_id" id="equipo">
                    <?php
                    if ($result_equipo > 0) {
                        while ($equipo = mysqli_fetch_array($query_equipo)) {
                    ?>
                            <option value="<?php echo $equipo["id"] ?>"><?php echo $equipo["nombre"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <label for="nombre">Nombre del Jugador</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre Completo">
                <label for="ruc">Cedula</label>
                <input type="text" name="cedula" id="cedula" placeholder="Numero de Cedula">
                <label for="n_remera">N° Remera</label>
                <input type="text" name="n_remera" id="n_remera" placeholder="Numero de Remera">
                <label for="goles">Goles Anotados</label>
                <input type="text" name="goles" id="goles" placeholder="Ingrese Goles Anotados">
                <label for="targetas">Targetas Acumuladas</label>
                <input type="text" name="targetas" id="tagetas" placeholder="Ingrese Camtidad de Targetas">

                <input type="hidden" name="estatus" id="" value='2' readonly>

                <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Registrar</button>

            </form>

        </div>

    </section>



    <?php
    include "include/footer.php";
    ?>
</body>

</html>