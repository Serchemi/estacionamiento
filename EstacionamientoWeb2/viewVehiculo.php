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
    <title>Vehiculos Registrados</title>
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
        <div>
            <ul class="nav nav-tabs card-header-tabs" style="background: rgb(54, 54, 75)">

                <li class="nav-item">
                    <a class="nav-link"  href="administrador.php">Registrar Vehiculo</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link active disabled " href="viewVehiculo.php">Mostrar Vehiculos </a>

                </li>
                
            </ul>
        </div>
    </div>

    <div class="card">
        <div align="center" class="card-body" style="margin-top: 4%;">
            <?php
            include( 'conexion.php' );
            $vehiculo=mysqli_query($conexion,"SELECT * FROM vehiculo");
            echo "<div style='margin-left: 2%; padding-top: 3%;'>";
            echo "<table class='table'>
                <thead>
                <tr>
                <th scope='col'>Marca</th>
                <th scope='col'>Modelo</th>
                <th scope='col'>Placas</th>
                <th scope='col'>Tamaño</th>
                <th scope='col'>Color</th>
                <th scope='col'>Operacion</th>
                </tr>
                </thead>
            ";
            if($vehiculo){
                echo "<tbody>";
                while($row=$vehiculo->fetch_array()){
                    $id=$row['id_vehiculo'];
                    $marca=$row['marca'];
                    $modelo=$row['modelo'];
                    $placas=$row['placas'];
                    $tamaño=$row['tamaño'];
                    $color=$row['color'];
                   
                   echo " <tr>
                    <td>$marca</td>
                    <td> $modelo</td>
                    <td> $placas</td>
                    <td> $tamaño</td>
                    <td> $color</td>
                    <td> <a class='btn btn-primary'  href='administrador.php?idVe=$id'>Edit</a> 
                     <a class='btn btn-primary'  href='delateVehiculo.php?idVe=$id'>Eliminar</a> </td>
                    <td> </td>
                    </tr>";
                   
                }
            }
            echo "</tbody>";

            echo "</div>";
            ?>
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