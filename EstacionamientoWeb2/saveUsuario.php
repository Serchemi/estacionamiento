<?php

    session_start();
    session_cache_expire();

    include('conexion.php');
    $nomU=$_POST['usuario'];
    $cargo=$_POST['cargo'];
    $con=$_POST['cont'];
    $boton=$_POST['nomBoton'];
    $idUsu=$_SESSION['idUsua'];
   

    switch($boton){
        case "Registrar":
                mysqli_query($conexion,"INSERT INTO usuario (nomUsuario,cargo,cont) VALUE ('$nomU','$cargo','$con')"); 
            break;
        case "Actualizar":
            mysqli_query($conexion,"UPDATE usuario SET nomUsuario='$nomU',cargo='$cargo',cont='$con' where id='$idUsu'" );
            unset($_SESSION['idUsua']);
            break;
    }
    echo "<script>
    alert('Operecion exitosa')
    </script>";
    $conexion->close();
    echo "<script>
        self.location= 'gestioUsuario.php'
        </script>";

    



?>