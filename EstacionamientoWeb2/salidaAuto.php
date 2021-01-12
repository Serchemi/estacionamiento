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
    <title>Salida del Auto</title>
</head>
<body>
<div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">

                <li class="nav-item">
                    <a class="nav-link active " >Recepcion de vehiculos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="graficaCajon.php">Grafica</a>
                </li>
                <div style="margin-left: 36%; padding-top: 1%;">
                    <label for=""><b>Bienvenido Al sistema:  </b></label>
                    <label for=""> <b> <?php echo $_SESSION['cargo'] ?> </b></label>
                </div> 
                <div style="margin-left: 20%;  padding-top: 1%;">
                    <label for=""><a href="index.php" style="color: rgb(105, 89, 196)">Salir[->]</a> </label>
                </div>
            
            </ul>
        </div>
    </div>

<div class="card">
        <div align="center" class="card-body" style="margin-top: 4%;">
        
            <h4>Salida de Vehiculo</h4>
            <form action="salidaAuto.php" method="post">
               
                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                <label for="">Placas del automovil resguardado</label><br>

                    <input type="text" name="placa" id="idPlaca" required>
                    
                    
                </div>
                <div >
                    <input type="submit" id="boton"  value="Mostrar" name="guardar" class="btn btn-success">
                    </div>
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
               
            
                
               
                <div id="regresar" style="margin-left: 15%; margin-top:  2.5%; ">
                <a href='cajera.php'  class='btn btn-primary'>Regresar</a>
                </div>
               
                
            </form>
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
 if(isset($_POST['guardar'])){
    include('conexion.php');
    $idPlaca=$_POST['placa'];
  
    $datos=mysqli_query($conexion,"SELECT * FROM resguardo,vehiculo where resguardo.id_vehiculo=vehiculo.id_vehiculo and  vehiculo.placas='$idPlaca'");
  
    if($datos){
        while($row=$datos->fetch_array()){
            $idR=$row['id_resguardo'];
            $idV=$row['id_vehiculo'];
            $idC=$row['id_cajon'];
            $horaL=$row['horaLlegada'];
            $fecha=$row['fecha'];
            $lavado=$row['lavado'];
           
        }

        $todo = "<tr> <td>" .$idV ."</td> <td>". $idC."</td> <td>". $horaL." </td> <td>". $fecha." </td> <td>". $lavado.
        " </td> <td> <a class='btn btn-primary' href='generarPdf.php?idRes=$idR'>Salida</a> </td> </tr>";
       echo " <script>
       document.getElementById('cuerpo').innerHTML=\"$todo\";
       </script>";
    }else{

    }
   

 }

 ?>
