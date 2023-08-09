<?php
include "../conexion.php";
session_start();

if (!empty($_POST)) {
    //  Actualizar datos de la Empresa
    if ($_POST['action'] == 'updateDataEmpresa') {
        if ((empty($_POST['txtNombre']) || empty($_POST['txtTelEmpresa'])) || empty($_POST['txtEmailEmpresa'])) {
            $code = '1';
            $msg = "Todos los campos son obligatorios";
        } else {
            $strNombre = $_POST['txtNombre'];
            $intTel = $_POST['txtTelEmpresa'];
            $strEmail = $_POST['txtEmailEmpresa'];

            $queryUpd = mysqli_query($conection, "UPDATE configuracion SET nombre = '$strNombre', telefono = '$intTel', email = '$strEmail' WHERE id = 1");
            mysqli_close($conection);

            if ($queryUpd) {
                $code = '00';
                $msg = "Datos actualizados correctamente.";
            } else {
                $code = '2';
                $msg = "Error al actualizar los datos.";
            }
        }
        $array_data = array('cod' => $code, 'msg' => $msg);
        echo json_encode($array_data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
exit;