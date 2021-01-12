<?php
include( 'conexion.php' );
$nom = $_POST['conductor'];
$edad = $_POST['edad'];
$correo = $_POST['correo'];
$placa = $_POST['placa'];
$nomUsu = $_POST['usuario'];
$con = $_POST['con'];

mysqli_query($conexion,"INSERT INTO conductor(nom,edad,placa,nomUsuario,con,correo) VALUE ('$nom','$edad','$placa','$nomUsu','$con','$correo')");

echo "<script>alert('Conductor registrado')</script>";
echo "<script>
self.location= 'index.php'
</script>";

?>