<?php
   include('conexion.php');
   $id=$_GET['idVe'];
   
   mysqli_query($conexion,"DELETE FROM vehiculo WHERE id_vehiculo='$id'");

   echo "<script>alert('Vehiculo eliminado')</script>";
   echo "<script>
   self.location= 'viewVehiculo.php'
   </script>";


?>