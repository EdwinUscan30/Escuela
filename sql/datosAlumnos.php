<?php
include_once('../config/conexion.php');

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$sql = "SELECT * FROM talumnos";
$resultado = $conexion->prepare($sql);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);

$conexion = null;




?>