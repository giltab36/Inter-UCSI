<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header("location: ./");
}
include "../conexion.php";

if (!empty($_POST)) {
    $alert = '';
    if (empty($_POST['campeonato']) || empty($_POST['partido']) || empty($_POST['equipo_a']) || empty($_POST['equipo_b']) || empty($_POST['gol_a']) || empty($_POST['gol_b'])) {
        $alert = '<p class="msg_error">Todos los campos son obligatorios.</p>';
    } else {

        $campeonato = $_POST['campeonato'];
        $partido = $_POST['partido'];
        $equipo_a = $_POST['equipo_a'];
        $equipo_b = $_POST['equipo_b'];
        $gol_a = $_POST['gol_a'];
        $gol_b = $_POST['gol_b'];
        $usuario_id = $_SESSION['idUser'];
        $estatus = $_POST['estatus'];


        $query_insert = mysqli_query($conection, "INSERT INTO encuentros (campeonato, partido, equipo_a, equipo_b, gol_a, gol_b, usuario_id, estatus) VALUE ('$campeonato', '$partido', '$equipo_a', '$equipo_b', '$gol_a', '$gol_b', '$usuario_id', $estatus)");

        if ($query_insert) {
            $alert = '<p class="msg_save">Encuento registrado correctamente.</p>';
        } else {
            $alert = '<p class="msg_error">Error al registrar el encuentro.</p>';
        }
    }
}
//}

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
    <title>Registrar Encuentro</title>
</head>

<body>
    <?php include "include/nav.php"; ?>
    <section class="dashboard">

        <div class="form_register">
            <h1 class="user_new"><i class="fa-solid fa-user-plus"></i> Registrar Encuentros</h1>
            <hr class="hr">
            <div class="alerta"><?php echo isset($alert) ? $alert : ''; ?></div>

            <form action="" method="post">

                <h3><u>Categoria Masculino</u></h3>
                <label for="campeonato">Nombre del Campeonato</label>
                <input type="text" name="campeonato" id="campeonato" placeholder="Nombre Completo">

                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha">

                <label for="partido">N° de Partido</label>
                <input type="text" name="partido" id="partido" placeholder="N° del Partido Jugado">

                <label for="equipo_a">Equipo A</label>
                <?php
                $query_equipo_a = mysqli_query($conection, "SELECT * FROM equipos");
                $result_equipo_a = mysqli_num_rows($query_equipo_a);
                ?>
                <select name="equipo_a" id="equipo_a">
                    <?php
                    if ($result_equipo_a > 0) {
                        while ($equipo_1 = mysqli_fetch_array($query_equipo_a)) {
                    ?>
                            <option value="<?php echo $equipo_1["id"] ?>"><?php echo $equipo_1["nombre"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="equipo_b">Equipo B</label>
                <?php
                $query_equipo_b = mysqli_query($conection, "SELECT * FROM equipos");
                mysqli_close($conection);
                $result_equipo_b = mysqli_num_rows($query_equipo_b);
                ?>
                <select name="equipo_b" id="equipo_b">
                    <?php
                    if ($result_equipo_b > 0) {
                        while ($equipo_2 = mysqli_fetch_array($query_equipo_b)) {
                    ?>
                            <option value="<?php echo $equipo_2["id"] ?>"><?php echo $equipo_2["nombre"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="gol_a">Goles del Equipo A</label>
                <input type="number" name="gol_a" id="gol_a" placeholder="Ingrese la cantidad de goles del primer equipo">

                <label for="gol_b">Goles del Equipo B</label>
                <input type="number" name="gol_b" id="gol_b" placeholder="Ingrese la cantidad de goles del segundo equipo">

                <input type="hidden" name="estatus" id="" value='1' readonly>

                <button type="submit" class="btn_save"><i class="fa-regular fa-floppy-disk"></i> Registrar</button>

            </form>

        </div>

    </section>



    <?php
    include "include/footer.php";
    ?>
</body>

</html>