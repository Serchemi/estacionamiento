<?php
include( 'conexion.php' );
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$placa = $_POST['placa'];
$color = $_POST['color'];
$tamaño = $_POST['tamaño'];
$cond = $_POST['conductor'];

$boto = $_POST['nomBoton'];

switch ( $boto ) {
    case 'Actualizar':
   
    mysqli_query( $conexion, "UPDATE vehiculo SET marca='$marca', modelo='$modelo',placas='$placa',color='$color',  
    tamaño='$tamaño',conductor='$cond' WHERE placas='$placa'" );
   
    break;
    case 'Registrar':
    echo 'actualizo2';
    mysqli_query( $conexion, "INSERT INTO vehiculo(marca,modelo,placas,color,tamaño,conductor) 
    VALUES('$marca','$modelo','$placa','$color','$tamaño','$cond')" );

    break;

    
}
echo "<script>
    alert('Operecion exitosa')
    </script>";
    $conexion->close();

echo "<script>
        self.location= 'administrador.php'
        </script>";

?>