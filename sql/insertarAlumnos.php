<?php
require_once('../config/conexion.php');


$nombre = $_POST['nombre'];
$apellidoP = $_POST['apellidoP'];

try {
    $stmt = $conexion->prepare("INSERT INTO talumnos (nombre, apellidoP) VALUES (:nombre, :apellidoP)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellidoP', $apellidoP);
    $stmt->execute();

    echo "Datos insertados correctamente";
} catch(PDOException $e) {
    echo "Error al insertar datos: " . $e->getMessage();
}
?>