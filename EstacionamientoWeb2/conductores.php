<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Crear cuentas de Conductores</title>
</head>
<body>

<div class="card">
        <div align="center" class="card-body" style="margin-top: 4%;">
        <h2>Registro Conductor</h2><br>
            <form action="saveConductor.php" method="post">
                <div class=" input-group-sm mb-3 col-lg-5 col-sm-12 form-group">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nombre Del conductor</span>
                    <input type="text" id="nameCon" name="conductor" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3 col-lg-5 col-sm-12 form-group">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Edad</span>
                    <input type="text" id="idEdad" name="edad" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Correo</span>
                    <input type="text" name="correo" id="idcorreo" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Placas de su automovil</span>
                    <input type="text" name="placa" id="idPlaca" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nombre del usario</span>
                    <input type="text" name="usuario" id="idUsuario" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div class=" input-group-sm mb-3  col-lg-5 col-sm-12 form-group" style="margin-top: 2%;">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Contraseña</span>
                    <input type="text" name="con" id="idCon" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>

               
                <input type="submit" id="boton" value="Registrar" name="regCon" class="btn btn-success">
               
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