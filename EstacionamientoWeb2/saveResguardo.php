<?php
include( 'conexion.php' );
if ( isset( $_POST['guardar'] ) ) {
    date_default_timezone_set('America/Mexico_City');
    $placa = $_POST['placa'];
    $cajon = $_POST['cajon'];
    $lavado=$_POST['lavado'];
    
    $fecha= date('Y-m-d');
    $horaLLegada= date('H:i:s');
    
    $cantidad = 0;
    $id=0;
   
    $exite=mysqli_query($conexion,"SELECT * FROM vehiculo WHERE placas='$placa' ");
   
    

    if($exite){
        while($row=$exite->fetch_array()){
            $tamaño=$row['tamaño'];
            $id=$row['id_vehiculo'];
            echo $id;
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
        include('pdfEntrada.php');
        genear1($placa,$horaLLegada,$fehca,$tamaño,$cajon, $lavado);
    }
   
   

   

    echo "<script>
alert('Operecion exitosa')
</script>";

echo "<script>
self.location= 'cajera.php'
</script>";

 
}

?>