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
    <title>Admistrador</title>
</head>
<body>
<div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">

                <li class="nav-item">
                    <a class="nav-link active " >Gestion Vehiculos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="gestioUsuario.php">Gestion Usuarios</a>
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


    <div>
        <div>
            <ul class="nav nav-tabs card-header-tabs" style="background: rgb(54, 54, 75)">

                <li class="nav-item">
                    <a class="nav-link active disabled ">Registrar Vehiculo</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link  " href="viewVehiculo.php">Mostrar Vehiculos </a>
                </li>
                
            </ul>
        </div>
    </div>

    <div class="card">
        <div align="center" class="card-body" style="margin-top: 4%;">
            <form action="saveAuto.php" method="post">
                <div class=" input-group-sm mb-3 col-lg-5 col-sm-12 form-group">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Conductor</span>
                    <input type="text" id="nameCon" name="conductor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3 col-lg-5 col-sm-12 form-group">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Marca</span>
                    <input type="text" id="idMarca" name="marca" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Modelo</span>
                    <input type="text" name="modelo" id="idModel" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Placa</span>
                    <input type="text" name="placa" id="idPlaca" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                <label for="">Color</label><br>
                    <select class="form-select" aria-label="Disabled select example" id="idColor" name="color" >
                        <option selected>Color</option>
                        <option value="rojo">Rojo</option>
                        <option value="verde">Verde</option>
                        <option value="amarillo">Amarillo</option>
                    </select>
                </div>

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                <label for="">Tamaño</label><br>
                    <select class="form-select" aria-label="Disabled select example" id="idTamaño" name="tamaño">
                        <option selected>Tamaño</option>
                        <option value="chico">Chico</option>
                        <option value="grande">Grande</option>
                    </select>
                </div>
            
                
                <input type="submit" id="boton" value="Registrar" name="nomBoton" class="btn btn-success">
                <?php
                    if(isset($_GET['idVe'])){
                        $id=$_GET['idVe'];
                        if($id!=null){
                            echo "<script>
                            var x= document.getElementById('boton').value='Actualizar';
                            </script>"; 
                        }else{
                            echo "<script>
                            var x= document.getElementById('boton').value='Registrar';
                            </script>"; 
                        }
                    }
                ?>
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
    include('conexion.php');
    if(isset($_GET['idVe'])){
         $id=$_GET['idVe'];
               
            if($id!=null){
                 $datos=mysqli_query($conexion,"SELECT * FROM vehiculo WHERE id_vehiculo='$id'");
                if($datos){
                    while($row=$datos->fetch_array()){
                        $conductor=$row['conductor'];
                        $modelo=$row['modelo'];
                        $placas=$row['placas'];
                        $marca=$row['marca'];
                        $color=$row['color'];
                        $tamaño=$row['tamaño'];
                       
                         echo $modelo;
                    }
                    echo "<script>
                     document.getElementById('nameCon').value='".$conductor."';
                     document.getElementById('idMarca').value='".$marca."';
                     document.getElementById('idModel').value='".$modelo."';
                     document.getElementById('idPlaca').value='".$placas."';
                     document.getElementById('idColor').value='".$color."';
                     document.getElementById('idTamaño').value='".$tamaño."';    
                    </script>";
                        
                    }
    
                   
                }
            }
           
?>