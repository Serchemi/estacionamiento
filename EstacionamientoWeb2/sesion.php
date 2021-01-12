<?php
    include('conexion.php');
    $usuario=$_POST['usuario'];
    $con=$_POST['contrsena'];

    $usuario1=mysqli_query($conexion,"SELECT * FROM usuario where nomUsuario='$usuario' and cont='$con'");
    session_start();
    if ($usuario1 ) {
        $cargo="";

        while( $rowOcupacion = $usuario1->fetch_array() ) {
            $cargo= $rowOcupacion['cargo'];
            echo $cargo; 
        }
        if($cargo=='Administrador'){
            header("Location: administrador.php");

        }else{
            if($cargo=='Cajero'){
                header("Location: cajera.php");
            }else{
                if($cargo=='Valet'){
                    header("Location: valet.php");   
                }else{
                    include('sesionConductor.php');
                    $cond=$usuario;

                    conductor($cond,$con);
                }
                
            }
        }
        $_SESSION['cargo']=$cargo;
       
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
 integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
 integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
