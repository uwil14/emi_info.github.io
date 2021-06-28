<?php

/*require_once('conexion.php');
$coneccion = new Conexion();
$coneccion->connect();*/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "expocruz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind




// prepare and bind
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, celular, correo) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $celular, $correo);

$nombre = $_POST["nombre"];
$celular = $_POST["celular"];
$correo = $_POST["correo"];

if($stmt->execute()){
	$form_data['success'] = true;
}else{
	$form_data['success'] = false;
}

$stmt->close();
$conn->close();

echo json_encode($form_data);
//header("Location: http://192.168.0.31/expocruz");
//die();