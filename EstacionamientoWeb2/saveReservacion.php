<?php
    include('conexion.php');
    $nombre=$_POST['nom'];
    $idCajon=$_POST['cajon'];
    $lavado=$_POST['lavado'];
    $placa=$_POST['placa'];
    $hora=$_POST['hora'];
    date_default_timezone_set('America/Mexico_City');

    $fecha= date('Y-m-d');

    $idPlaca=mysqli_query($conexion,"SELECT  id_vehiculo FROM vehiculo WHERE placas='$placa'");
    

    $idP=null;
    while($row=$idPlaca->fetch_array()){
        $idP=$row['id_vehiculo'];
    }
    if($idP!=null){
        mysqli_query($conexion,"INSERT INTO reservacion(nombre,idVehiculo,idCajon,hora,fecha,lavado) VALUES
         ('$nombre','$idP','$idCajon','$hora','$fecha','$lavado')");

         mysqli_query( $conexion, "UPDATE cajon SET situacion='reservado' WHERE id_cajon='$idCajon'" );

         
         echo "<script> alert('Reserbacion exitosa')</script>";
         echo "<script>
         self.location= 'inicioConductor.php'
         </script>";
        
    }else{
        echo "<script> alert('Automovil no registrado')</script>";
        echo "<script>
        self.location= 'inicioConductor.php'
        </script>";
        
    }

?>