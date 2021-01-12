<?php
include( 'conexion.php' );

    
    
    $cajon = $_GET['cajon'];
    $lavado=$_GET['lavado'];
    $idVe=$_GET['idVe'];
    $fecha= $_GET['fecha'];
    $horaLLegada=$_GET['hora'];
    $idRese=$_GET['idReser'];
    
    $cantidad = 0;
    $id=0;
    
   
    $exite=mysqli_query($conexion,"SELECT * FROM vehiculo WHERE id_vehiculo='$idVe' ");
   
   
    

 if($exite){
        while($row=$exite->fetch_array()){
            $tamaño=$row['tamaño'];
            $placa=$row['placas'];
            $id=$row['id_vehiculo'];
            echo $tamaño;
        }
        mysqli_query( $conexion, "INSERT INTO resguardo(id_vehiculo,id_cajon,horaLlegada,horaSalida,pago,fecha,lavado) 
        VALUES('$id','$cajon','$horaLLegada','','','$fecha','$lavado')" );

        mysqli_query( $conexion, "UPDATE cajon SET situacion='ocupado' WHERE id_cajon='$cajon'" );

        $canOcupacio = mysqli_query( $conexion, "SELECT canOcupacion FROM ocupacion WHERE id_cajon='$cajon'" );
        if ( $canOcupacio ) {

            while( $rowOcupacion = $canOcupacio->fetch_array() ) {
                $cantidad = $rowOcupacion['canOcupacion'];
                echo $cantidad;
            }
        }
        $cantidad = $cantidad+1;

        mysqli_query($conexion,"UPDATE ocupacion set canOcupacion='$cantidad' where id_cajon='$cajon'");
        mysqli_query($conexion,"DELETE FROM reservacion WHERE idReservacion='$idRese'");
        include('pdfEntrada.php');
        genear1($placa,$horaLLegada,$fehca,$tamaño,$cajon, $lavado);
    }
   
   

   

    echo "<script>
alert('Operecion exitosa')
</script>";

echo "<script>
self.location= 'cajera.php'
</script>";

 


?>