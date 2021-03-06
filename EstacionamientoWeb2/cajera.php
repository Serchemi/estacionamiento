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
    <title>Cajero</title>
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

    <div style="padding-top: 3%;">
    <a href="salidaAuto.php" class="btn btn-primary">Salida del conductor</a>
    <a href="cajeraReservaciones.php" class="btn btn-primary">Reservaciones</a>
    </div>
    
    

    <div class="card">
        <div align="center" class="card-body" style="margin-top: 4%;">
        
            <h4>Resguardo de Vehiculo</h4>
            <form action="saveResguardo.php" method="post">

               
                <div class="col-lg-5 col-sm-12 form-group">
                <br>
                    <label for=""><p><b>Servicio de lavado</b></p></label><br>
                    <label for="">Si  </label><label for=""></label><input type="radio" name="lavado" value="1">
                    <label for="">No  </label><label for=""></label><input type="radio" name="lavado" value="2">
                </div>
               
                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                <label for="">ID del cajon disponible</label><br>

                    <select class="form-select" aria-label="Disabled select example" id="idCajon" name="cajon" >

                        <?php
                            include('conexion.php');
                            $cajon=mysqli_query($conexion,"select id_cajon from cajon where situacion='disponible'");
                            
                            if($cajon){
                                while($row=$cajon->fetch_array()){
                                    $id=$row['id_cajon'];
                                    echo "<option value='$id'>$id</option>";
                                }   
                            }
                        ?>
                    </select>
                </div>

                

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                <label for="">Placa</label><br>
                    <select class="form-select" aria-label="Disabled select example" id="idPlaca" name="placa">
                    <?php
                            include('conexion.php');
                            $cajon=mysqli_query($conexion,"select vehiculo.placas from vehiculo ");
                            
                            if($cajon){
                                while($row=$cajon->fetch_array()){
                                    $id=$row['id_vehiculo'];
                                    $placa= $row['placas'];
                                    echo "<option value='$placa'>$placa</option>";
                                }   
                            }
                        ?>
                    </select>
                </div>
            
                
                <input type="submit" id="boton" value="Registrar" name="guardar" class="btn btn-success">
                
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