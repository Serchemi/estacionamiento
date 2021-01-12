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
    <title>bienvenido</title>
</head>
<body>
    
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active " >Espacios Disponibles</a>
                </li>
                <li class="nav-item">
                   
                    <a href="listReservacions.php" class="nav-link" >Lista Reservaciones</a>
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

    <div style="margin-left: 36%; padding-top: 3%;">
        <h4>Visuzalizacion de espacios disponibles</h4><br>
       
    </div>
    
    
    <?php
    include( 'conexion.php' );
    $idVehiculo = 1;
    $fila = 0;
    $primero = 0;
    date_default_timezone_set("America/Mexico_City");
    $fechaActual = date( 'Y-m-d' );
    $sql       = 'SELECT * FROM cajon';
    $datos = mysqli_query( $conexion, $sql );
    
    echo "
    <div style='margin-left: 25%; padding-top: 3%;' >
    <table border='1px'>
    ";
    
    if ( $datos ) {
    
        while( $row = $datos->fetch_array() ) {
            $situacion = $row['situacion'];
            $id = $row['id_cajon'];
            $reservado=$row['reservado'];
            $idRe=0;
            $carro = mysqli_query( $conexion, "SELECT `id_vehiculo`,`id_resguardo` FROM `resguardo`,`cajon` WHERE resguardo.id_cajon='$id' and cajon.situacion='ocupado' and fecha='$fechaActual'" );
            if ( $carro ) {
               
                while( $rowCarro = $carro->fetch_array() ) {
                   
                   $idRe=$rowCarro['id_resguardo'];
                   
                }
            }
    
            if ( $primero == 0 ) {
                echo '<tr>';
                $primero++;
            }
    
            $fila++;
            if ( $fila <= 8 ) {
    
                if ( $situacion == 'disponible' ) {
                    echo " <td style = 'background-color: green;' width = '100' height = '100'><a href = 'reservacionCon.php?idCa=$id'>cajon=$id </a>$situacion</td>";
                } else {
                    if($situacion=='reservado'){
                        echo " <td style = 'background-color: yellow;' width = '100' height = '100'><a >cajon=$id </a>Reservado </td>";
                    }else{
                        echo " <td style = 'background-color: red;' width = '100' height = '100'><a href = 'salida.php?idResguar=$idRe'>cajon=$id </a>Ocupado </td>";
                    }
                    
                }
    
            } else {
                echo '</tr>';
                $fila = 1;
                echo '<tr>';
    
                if ( $situacion == 'disponible' ) {
                    echo " <td style = 'background-color: green;' width = '100' height = '100'><a href = 'reservacionCon.php?idCa=$id'>cajon=$id </a>$situacion</td>";
                } else {
                    if($situacion=='reservado'){
                        echo " <td style = 'background-color: yellow;' width = '100' height = '100'><a >cajon=$id </a>Reservado </td>";
                    }else{
                        echo " <td style = 'background-color: red;' width = '100' height = '100'><a href = 'salida.php?idResguar=$idRe'>cajon=$id </a>Ocupado </td>";
                    }
                    
                    
                }
                
    
            }
    
        }
    
    }
    
    echo "
        </table>
    
        </div>
    ";
    
    ?>

   

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
 integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>