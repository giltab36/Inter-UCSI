<?php
class Conexion{
    public static function Conectar(){
        define('servidor', 'localhost');
        define('nombre_db', 'interucsi');
        define('usuario', 'root');
        define('password', '');
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_db, usuario, password, $opciones);
            return $conexion;
        }catch(Exception $e){
            die("El error de conexion es: ".$e->getMessage());
        }
    }
}

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT encuentros.id, encuentros.campeonato, encuentros.fecha, encuentros.partido, 
             equipo_a.nombre AS equipo_A, equipo_b.nombre AS equipo_B, encuentros.gol_a, encuentros.gol_b 
             FROM encuentros
             INNER JOIN equipos AS equipo_a ON encuentros.equipo_a = equipo_a.id 
             INNER JOIN equipos AS equipo_b ON encuentros.equipo_b = equipo_b.id  where encuentros.estatus = 1";

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion=null;
?>