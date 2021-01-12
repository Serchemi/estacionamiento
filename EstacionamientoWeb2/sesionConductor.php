<?php
    
    function conductor($usuario,$con){
      
        include('conexion.php');
        $conductor=mysqli_query($conexion,"SELECT * FROM conductor where nomUsuario='$usuario' and con='$con'");
        $nom=null;
       while($fila=mysqli_fetch_array($conductor)){
            $nom=$fila['nom'];
            $placa=$fila['placa'];
       }
        session_start();
        if ($nom==null) {
            echo "<script> alert('Usuario no registrado') </script>";
            header('Location: index.php');  
        }else{
            $_SESSION['nom']=$nom;
            $_SESSION['placa']=$placa;
            header('Location: inicioConductor.php');
        }
    }
   
?>

