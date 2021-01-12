
<?php

    include('conexion.php');
require('pdf/fpdf.php');

/*$idCa=$_POST['idCarro'];
$horaLegad=$_POST['horaLlegada'];
$fecha=$_POST['fecha'];
$horaSalida=$_POST['horaSalida'];
$tamaño=$_POST['tamaño'];
$idCajon=$_POST['idCajon'];*/
$idRes=$_GET['idRes'];
$datos=mysqli_query($conexion,"SELECT * FROM resguardo where id_resguardo='$idRes'");
if($datos){
    while($row=$datos->fetch_array()){
        $idCa=$row['id_vehiculo'];
        $horaLegad=$row['horaLlegada'];
        $lavado=$row['lavado'];
        $idCajon=$row['id_cajon'];
    }
}
$carro=mysqli_query($conexion,"SELECT * FROM vehiculo where id_vehiculo='$idCar'");
if($carro){
    while($row=$carro->fetch_array()){
        $tamaño=$row['tamaño'];
    }
}
date_default_timezone_set('America/Mexico_City');
$precio=0;
$fecha= date('Y-m-d');
$horaSalida= date('H:i:s');








//separacion de la hora y los minutos de entrada
$horaLLe=explode(':',$horaLegad);
$horaE=(int)$horaLLe[0];
$minutosE=(int)$horaLLe[1];


//separacion de la hora y los minutos de salida
$horaSal=explode(':',$horaSalida);
$horaS=(int)$horaSal[0];
$minutoS=(int)$horaSal[1];


//calculo de las horas
//$horasRes=(12-$horaE)+$horaS;
$minutosRes=$minutoS+$minutosE;

if($horaE<=12 & $horaS<=12 || $horaE>=12 & $horaS>=12 ){
    $horasRes=($horaS-$horaE);
}else{
    if($horaE<12 & $horaS>12){
        $horasRes=(12-$horaE)+($horaS-12);
    }
}
$precioLa=0;
if($lavado==1){
    $precioLa=15;
    $lavado='Si';
}else{
    $lavado='No';
}

if($tamaño=='Chico'){
    $precio=12;
}else{
    $precio=18;
}

if($minutosRes>60){
    $horasRes=$horasRes+2;
}else{
    $horasRes=$horasRes+1;
}

$pago=$horasRes*$precio + $precioLa;
echo $horasRes;

mysqli_query($conexion,"UPDATE resguardo SET horaSalida='$horaSalida' where id_vehiculo='$idCa'");
mysqli_query($conexion,"UPDATE resguardo SET pago='$pago' where id_vehiculo='$idCa'");
mysqli_query($conexion,"UPDATE cajon SET situacion='disponible' WHERE id_cajon='$idCajon'");

$pdf = new fpdf();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Tikect');
$pdf->Ln(); //salto de linea
$pdf->Write(7,'ID automovil:'.$idCa);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Servicio de lavado:'.$lavado);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'total a pagar:'.$pago);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Hora llegada:'.$horaLegad);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Hora Salida:'.$horaSalida);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Fecha:'.$fecha);

$pdf->Output('prueba.pdf','F');
echo "<script language='javascript'>window.open('prueba.pdf','_self',``);</script>";//paral archivo pdf generado

exit;



?>