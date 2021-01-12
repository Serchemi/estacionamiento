<?php
    include('conexion.php');
    $id=$_GET['idVe'];

    mysqli_query($conexion,"DELETE FROM usuario WHERE id='$id'");

   echo "<script>alert('Usuario eliminado')</script>";
   echo "<script>
   self.location= 'gestioUsuario.php'
   </script>";
    
?>