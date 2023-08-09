<?php

if (empty($_SESSION['active'])) {
    header('location: ../');
}

?>

<div class="sidebar close">
    <div class="logo-details">
        <i class="bxbxl-c-plis-plus"></i>
        <span class="logo_name">Inter UCSI</span>
    </div>
    <ul class="nav-links">
        <li>
            <a href="index.php">
                <i class="bx bx-grid-alt"></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Categoria Masculino</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-collection"></i>
                    <span class="link_name">Categoria Masculino</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Categoria Masculino</a></li>
                <li><a href="equipos_M.php">Equipos</a></li>
                <li><a href="jugadores_M.php">Jugadores</a></li>
                <li><a href="encuentros_M.php">Encuentros</a></li>
            </ul>
        </li>
        <li>
            <div class="icon-link">
                <a href="#">
                    <i class="bx bx-collection"></i>
                    <span class="link_name">Categoria Femenino</span>
                </a>
                <i class="bx bxs-chevron-down arrow"></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Categoria Femenino</a></li>
                <li><a href="equipos_F.php">Equipos</a></li>
                <li><a href="jugadores_F.php">Jugadores</a></li>
                <li><a href="encuentros_F.php">Encuentros</a></li>
            </ul>
        </li>
        <li>
            <a href="usuarios.php">
                <i class="bx bx-pie-chart-alt-2"></i>
                <span class="link_name">Usuarios</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Usuarios</a></li>
            </ul>
        </li>
        <li>
            <a href="#">
                <i class="bx bx-cog"></i>
                <span class="link_name">Configuración</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Configuración</a></li>
            </ul>
        </li>
    </ul>
</div>