<?php
session_start();
if ($_SESSION['rol'] != 1) {
    header("location: ./");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "include/script.php"; ?>
    <title>Registrar Equipos</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- datatables css basico-->
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <!---datatables bootstrap 4 css-->
    <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.13.1/css/dataTables.bootstrap.css">
</head>

<body>
    <?php include "include/nav.php"; ?>
    <section class="dashboard">
            <div class="container">
                <br>
                <h1 align="center">ENCUENTROS REGISTRADOS</h1>
                <div class"row">
                    <div class="col-lg-12">
                        <table id="tablaUsuarios" class="table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Campeonato</th>
                                    <th>Fecha</th>
                                    <th>Partido</th>
                                    <th>Equipo A</th>
                                    <th>Equipo B</th>
                                    <th>Goles Equipo A</th>
                                    <th>Equipo Equipo B</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <!--Jquery. popper.js, Bootstrap JS-->
            <script src="jquery/jquery-3.5.1.min.js"></script>
            <script src="popper/popper.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <!--Datatables JS-->
            <script type="text/javascript" src="datatables/datatables.min.js"></script>
            <!--Para usar botones en datatables JS-->
            <script src="datatables/Buttons-2.3.2/js/dataTables.buttons.js"></script>
            <script src="datatables/JSZip-2.5.0/jszip.min.js"></script>
            <script src="datatables/pdfmake-0.1.36/pdfmake.js"></script>
            <script src="datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
            <script src="datatables/Buttons-2.3.2/js/buttons.html5.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#tablaUsuarios').DataTable({
                        //para usar botones
                        responsive: "true",
                        dom: 'Bfrtilp',
                        buttons: [{
                                extend: 'excelHtml5',
                                text: 'Excel',
                                titleAttr: 'Exportar a Excel',
                                className: 'btn btn-success'
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'PDF',
                                titleAttr: 'Exportar a PDF',
                                className: 'btn btn-danger'
                            },
                            {
                                extend: 'print',
                                text: 'imprimir',
                                titleAttr: 'imprimir',
                                className: 'btn btn-info'
                            },
                        ],
                        "ajax": {
                            "url": "backEncuentroF.php",
                            "dataSrc": ""
                        },
                        "columns": [{
                                "data": "id"
                            },
                            {
                                "data": "campeonato"
                            },
                            {
                                "data": "fecha"
                            },
                            {
                                "data": "partido"
                            },
                            {
                                "data": "equipo_A"
                            },
                            {
                                "data": "equipo_B"
                            },
                            {
                                "data": "gol_a"
                            },
                            {
                                "data": "gol_b"
                            },
                        ]
                    });
                });
            </script>
        </div>
    </section>