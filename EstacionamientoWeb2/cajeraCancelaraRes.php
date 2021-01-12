<?php
include('conexion.php');
$idRese=$_GET['idRes'];
echo $idRese;

mysqli_query($conexion,"UPDATE cajon,reservacion SET cajon.situacion='disponible'
 WHERE reservacion.idCajon=cajon.id_cajon and reservacion.idReservacion='$idRese'");
mysqli_query($conexion,"DELETE FROM reservacion WHERE idReservacion='$idRese'");


echo "<script>
    alert('Cancelacion exitosa')
    </script>";
    $conexion->close();

echo "<script>
        self.location= 'cajera.php'
        </script>";


?>