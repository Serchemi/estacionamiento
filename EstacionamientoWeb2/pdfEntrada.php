
<?php
function genear1($idC,$hoLLe,$f,$ta,$ca,$la){
    include('conexion.php');
require('pdf/fpdf.php');

/*$idCa=$_POST['idCarro'];
$horaLegad=$_POST['horaLlegada'];
$fecha=$_POST['fecha'];
$horaSalida=$_POST['horaSalida'];
$tamaño=$_POST['tamaño'];
$idCajon=$_POST['idCajon'];*/
$precio=0;







//separacion de la hora y los minutos de entrada
/*$horaLLe=explode(':',$horaLegad);
$horaE=(int)$horaLLe[0];
$minutosE=(int)$horaLLe[1];*/


//separacion de la hora y los minutos de salida
/*$horaSal=explode(':',$horaSalida);
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

$pago=$horasRes*$precio;
echo $horasRes;*/

/*mysqli_query($conexion,"UPDATE resguardo SET horaSalida='$horaSalida' where id_vehiculo='$idCa'");
mysqli_query($conexion,"UPDATE resguardo SET pago='$pago' where id_vehiculo='$idCa'");
mysqli_query($conexion,"UPDATE cajon SET situacion='disponible' WHERE id_cajon='$idCajon'");*/

$idCa=$idC;
$horaLegad=$hoLLe;
$fecha=$f;
$tamaño=$ta;
$idCajon=$ca;
$lavado=$la;
if($lavado=1){
    $lavado="Si";
}else{
    $lavado="No";
}


$pdf = new fpdf();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Tikect de ingreso');
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Placa:'.$idCa);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'ID cajon:'.$idCajon);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Tamaño:'.$tamaño);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Servicio de lavado:'.$lavado);
$pdf->Ln(); //salto de linea
$pdf->Write(7,'Hora llegada:'.$horaLegad);

$pdf->Ln(); //salto de linea
$pdf->Write(7,'Fecha:'.$fecha);

$pdf->Output('tiketEntrada.pdf','F');
echo "<script language='javascript'>window.open('tiketEntrada.pdf','_self',``);</script>";//paral archivo pdf generado

exit;

}

?>