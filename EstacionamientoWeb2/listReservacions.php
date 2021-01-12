<?php

 session_start();
 session_cache_expire();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Reservacion</title>
</head>
<body>
<div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link  "  href="inicioConductor.php" >Espacios Disponibles</a>
                </li>
                <li class="nav-item">
                   
                    <a class="nav-link active" >Lista Reservaciones</a>
                </li>
                <div style="margin-left: 25%; padding-top: 1%;">
                    <label for=""><b>Bienvenido Al sistema:  </b></label>
                    <label for=""> <b> <?php echo $_SESSION['nom']; ?> </b></label>
                </div> 
                <div style="margin-left: 15%;  padding-top: 1%;">
                    <label for=""><a href="index.php" style="color: rgb(105, 89, 196)">Salir[->]</a> </label>
                </div>
            </ul>
            
        </div>
    </div>
<div class="card">
    <div align="center" class="card-body" style="margin-top: 4%;">
    <h4>Lista de reservaciones El dia de hoy</h4>
        <div style='margin-left: 2%; padding-top: 3%;'>
            <table class='table'>
                <thead>
                    <tr>
                        <th scope='col'>Id vehiculo</th>
                        <th scope='col'>Id Cajon</th>
                        <th scope='col'>Hora de entrada</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Lavado</th>
                        <th scope='col'>Operacion</th>
                    </tr>
                </thead>
                <tbody id="cuerpo">
                </tbody>

               
                
            </table>
        </div>
        <h4 id='mensaje' style="color: red;"></h4>
    </div>
</div>

    
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
 integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

 <?php
 date_default_timezone_set('America/Mexico_City');
$fecha= date('Y-m-d');
 include('conexion.php');


 $nom=$_SESSION['nom'];
 
 $resultado=mysqli_query($conexion,"select * from reservacion,conductor WHERE 
 reservacion.nombre=conductor.nom and conductor.nom='$nom' and reservacion.fecha='$fecha'");
 $todo="";
 while($row=$resultado->fetch_array()){
     $idRe=$row['idReservacion'];
     $nombre=$row['nom'];
     $idCajon=$row['idCajon'];
     $hora=$row['hora'];
     $fechaR=$row['fecha'];
     $lavado=$row['lavado'];
     if($lavado==1){
        $lavado='si';
    }else{
        $lavado='no';
    }
    $todo = "<tr> <td>" .$nombre ."</td> <td>". $idCajon."</td> <td>". $hora." </td> <td>". $fechaR." </td> <td>". $lavado.
    " </td> <td> <a class='btn btn-primary' href='cancelarRes.php?idRes=$idRe'>Cancelar</a> </td> </tr>";
    
 }
    

 if($todo!=""){
     
    echo " <script>
    document.getElementById('cuerpo').innerHTML=\"$todo\";
    </script>";
   
 }else{
    echo "<script>
    document.getElementById('mensaje').innerHTML='Sin reservaciones el dia de hoy'
   </script>";
   
 }

 
 
 ?>