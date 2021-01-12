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
                    <a class="nav-link "  href="administrador.php">Gestion Vehiculos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active " href="">Gestion Usuarios</a>
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
        <div style="margin-top: 3%; padding-left: 1%;">
            <a href="addUsuario.php" class="btn btn-primary">Agregar Usuario</a>
        </div>
   
        <div align="center" class="card-body" style="margin-top: 3%;">
            <?php
             
                include('conexion.php');
                $usuarios=mysqli_query($conexion,"select * from usuario");
                echo "<div style='margin-left: 2%; padding-top: 3%;'>";
                echo "<table class='table'>
                    <thead>
                    <tr>
                    <th scope='col'>Nombre Usuario</th>
                    <th scope='col'>Cargo</th>
                    <th scope='col'>Contraseña</th>
                    <th scope='col'>Operaciones</th>
                    </tr>
                    </thead>
                ";
               
                if($usuarios){
                    echo "<tbody>";
                    while($row=$usuarios->fetch_array()){
                        $id=$row['id'];
                        $nomUsu=$row['nomUsuario'];
                        $cargo=$row['cargo'];
                        $con=$row['cont'];

                         
                        echo " <tr>
                        <td>$nomUsu</td>
                        <td> $cargo</td>
                        <td> $con</td>
                        <td> <a class='btn btn-primary'  href='addUsuario.php?idVe=$id'>Edit</a> 
                            <a class='btn btn-primary'  href='delateAuto.php?idVe=$id'>Eliminar</a> </td>
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