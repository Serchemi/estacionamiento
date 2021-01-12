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
    <title>Document</title>
</head>


<body>
<div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">

                <li class="nav-item">
                    <a class="nav-link  "href="administrador.php" >Gestion Vehiculos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href="gestioUsuario.php">Gestion Usuarios</a>
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
            <form action="saveUsuario.php" method="post">
                <div class=" input-group-sm mb-3 col-lg-5 col-sm-12 form-group">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nombre de Usuario</span>
                    <input type="text" id="nameUsu" name="usuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3 col-lg-5 col-sm-12 form-group">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Cargo</span>
                    <input type="text" id="idCargo" name="cargo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
                    <input type="text" name="cont" id="idCont" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

              
                
                <input type="submit" id="boton" value="Registrar" name="nomBoton" class="btn btn-success">
                <div id="regresar" style="margin-left: 20%; margin-top:  -2.5%; ">
                <a href='gestioUsuario.php'  class='btn btn-primary'>Regresar</a>
                </div>
               
               
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
                 $datos=mysqli_query($conexion,"SELECT * FROM usuario WHERE id='$id'");
                if($datos){
                    while($row=$datos->fetch_array()){
                        $nom=$row['nomUsuario'];
                        $cargo=$row['cargo'];
                        $cont=$row['cont'];
                    }
                    echo "<script>
                     document.getElementById('nameUsu').value='".$nom."';
                     document.getElementById('idCargo').value='".$cargo."';
                     document.getElementById('idCont').value='".$cont."';    
                    </script>";
 
                    }
                    
                    $_SESSION['idUsua']=$id;
                }
            }
           
?>