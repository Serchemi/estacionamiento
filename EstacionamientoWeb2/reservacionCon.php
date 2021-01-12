
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
 
                <div style="margin-left: 42%; padding-top: 1%;">
                    <label for=""><b>Bienvenido Al sistema:  </b></label>
                    <label for=""> <b> <?php echo $_SESSION['nom']; ?> </b></label>
                </div> 
                <div style="margin-left: 20%;  padding-top: 1%;">
                    <label for=""><a href="index.php" style="color: rgb(105, 89, 196)">Salir[->]</a> </label>
                </div>
            </ul>
            
        </div>
    </div>

    <?php

        $idCajon=$_GET['idCa'];

    ?>


    
    <div class="card">
        <div align="center" class="card-body" style="margin-top: 4%;">
        
            <h4>Reservacion</h4>
            <form action="saveReservacion.php" method="post">

               
                <div class="col-lg-5 col-sm-12 form-group">
                <br>
                    <label for=""><p><b>Servicio de lavado</b></p></label><br>
                    <label for="">Si  </label><label for=""></label><input  type="radio" name="lavado" value="1">
                    <label for="">No  </label><label for=""></label><input type="radio" name="lavado" value="2" checked>
                </div>
                <br>

                <div  class="col-lg-5 col-sm-12 form-group">
                    <label for="">Nombre</label>
                    <input class="form-control form-control-sm" type="text" value="<?php echo  $_SESSION['nom'];?>" name="nom">
                </div>
                <div  class="col-lg-5 col-sm-12 form-group">
                    <label for="">ID Cajon</label>
                    <input class="form-control form-control-sm" type="text" value="<?php echo  $idCajon;?>" name="cajon">
                </div>
                <div  class="col-lg-5 col-sm-12 form-group">
                    <label for="">Placa del automovil</label>
                    <input class="form-control form-control-sm" type="text" value="<?php echo  $_SESSION['placa'];?>" name="placa">
                </div>
                <div  class="col-lg-5 col-sm-12 form-group">
                    <label for="">Hora</label>
                    <input class="form-control form-control-sm" type="time" value="" name="hora">
                </div>
                
                <br>
                
                <input type="submit" id="boton" value="Registrar" name="guardar" class="btn btn-success">
                <a href='inicioConductor.php'  class='btn btn-primary'>Regresar</a>
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