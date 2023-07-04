<?php
require_once('../config/conexion.php');


$objeto = new Conexion();
$conexion = $objeto->Conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellidoP = $_POST["apellidoP"];
    $apellidoM = $_POST["apellidoM"];
    $nacimiento = $_POST["nacimiento"];
    $curp = $_POST["curp"];

    $sql = "INSERT INTO talumnos (nombre, apellidoP, apellidoM, nacimiento, curp) 
            VALUES (:nombre, :apellidoP, :apellidoM, :nacimiento, :curp)";
    $sentencia = $conexion->prepare($sql);

    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":apellidoP", $apellidoP);
    $sentencia->bindParam(":apellidoM", $apellidoM);
    $sentencia->bindParam(":nacimiento", $nacimiento);
    $sentencia->bindParam(":curp", $curp);

    $response = array(); // Array para almacenar la respuesta

    if ($sentencia->execute()) {
        $response['success'] = true;
        $response['message'] = "Los datos se han agregado correctamente";
    } else {
        $response['success'] = false;
        $response['message'] = "Error al agregar los datos";
    }

    printgit json_encode($response, JSON_UNESCAPED_UNICODE);
}

$conexion = null;


?>