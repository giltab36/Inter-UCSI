<?php

if (empty($_SESSION['active'])) {
    header('location: ../');
}

?>

<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="./IMG/logoUcsi2.png" alt="">
        </div>

        <span class="logo_name">Inter UCSI</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="index.php">
                    <i class="uil uil-calendar-alt"></i>
                    <span class="link-name">Dashborad</span>
                </a>
            </li>
            <li><a href="equipos.php">
                    <i class="uil uil-bed"></i>
                    <span class="link-name">Registrar Equipos</span>
                </a>
            </li>
            <li><a href="jugadores.php">
                    <i class="uil uil-clipboard-notes"></i>
                    <span class="link-name">Registrar Jugadores</span>
                </a>
            </li>
            <li><a href="encuentros.php">
                    <i class="uil uil-file-graph"></i>
                    <span class="link-name">Registrar Encuentros</span>
                </a>
            </li>
            <li><a href="usuarios.php">
                    <i class="uil uil-file-graph"></i>
                    <span class="link-name">Registrar Usuarios</span>
                </a>
            </li>
            <li><a href="listado.php">
                    <i class="uil uil-file-graph"></i>
                    <span class="link-name">Listado</span>
                </a>
            </li>
            <li><a href="configuracion.php">
                    <i class="uil uil-setting"></i>
                    <span class="link-name">Configuración</span>
                </a>
            </li>
        </ul>

        <ul class="logout-mode">
            <li><a href="salir.php">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Cerrar Sesión</span>
                </a>
            </li>
            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>

        </ul>
    </div>
</nav>

<!-- <section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>

        <div class="search-box">
             <i class="uil uil-search"></i>
            <input type="text" placeholder="Search here..."> 
        </div>

        <img src="./IMG/user.jpg" alt="">
    </div>



    </div>
</section> -->

<script src="./JS/navlateral.js"></script>