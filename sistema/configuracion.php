<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "include/script.php"; ?>
    <title>Document</title>
</head>

<body>
    <?php include "include/nav.php"; ?>
    <section class="dashboard">
        <div class="conatinerDataEmpresa">
            <div class="logoEmpresa">
                <img src="img/logoEmpresa.png">
            </div>
            <h3>Datos del Sistema</h3>
            <form method="POST" name="formEmpresa" id="formEmpresa">
                <input type="hidden" name="action" value="updateDataEmpresa">
                <div>
                    <label>Nombre del Sistema:</label>
                    <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre de la empresa" value="<?php echo $nombreEmpresa ?>" required>
                </div>
                <div>
                    <label>Teléfono:</label>
                    <input type="text" name="txtTelEmpresa" id="txtTelEmpresa" placeholder="Número de teléfono" value="<?php echo $telEmpresa ?>" required>
                </div>
                <div>
                    <label>Correo electrónico:</label>
                    <input type="email" name="txtEmailEmpresa" id="txtEmailEmpresa" placeholdera="Correo electrónico" value="<?php echo $emailEmpresa ?>" required>
                </div>
                <div class="alertFormEmrpresa" style="display: none;"></div>
                <div>
                    <button type="submit" class="btn_save btnChangePass"><i class="far fa-save fa-lg"></i> Guardar datos</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>