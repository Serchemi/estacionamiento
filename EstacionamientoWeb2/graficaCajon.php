<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js" integrity="sha512-hZf9Qhp3rlDJBvAKvmiG+goaaKRZA6LKUO35oK6EsM0/kjPK32Yw7URqrq3Q+Nvbbt8Usss+IekL7CRn83dYmw==" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<canvas id='grafica' width="200" height="200"></canvas>
<?php
    include('conexion.php');
    $array=[];
    $ocupacion=mysqli_query($conexion,"SELECT * FROM ocupacion");
    if($ocupacion){
        $id=0;
        while($row=$ocupacion->fetch_array()){
            $array[]=$row['canOcupacion'];
            
        }
    }
    ;
?>
<script>
    
    var ctx=document.getElementById('grafica');
    var myChart=new Chart(ctx,{
        type: 'bar',
    data: {
        labels: ['caja 1', 'caja 2', 'caja 3', 'caja 4', 'caja 5', 'caja 6','caja 7','caja 8','caja 9','caja 10','caja 11','caja 12','caja 13','caja 14','caja 15','caja 16','caja 17','caja 18','caja 19','caja 20','caja 21','caja 22','caja 23','caja 24'],
        datasets: [{
            
            label: '# of Votes',
            //data: [12, 19, 3, 5, 2, 3],
            data:[<?php echo $array[0];?>,<?php echo $array[1];?>,<?php echo $array[2];?>,<?php echo $array[3];?>,
            <?php echo $array[4];?>,<?php echo $array[5];?>,<?php echo $array[6];?>,
            <?php echo $array[7];?>,<?php echo $array[8];?>,<?php echo $array[9];?>,<?php echo $array[10];?>,
            <?php echo $array[11];?>,<?php echo $array[12];?>,<?php echo $array[13];?>,
            <?php echo $array[14];?>,<?php echo $array[15];?>,<?php echo $array[16];?>,
            <?php echo $array[17];?>,<?php echo $array[18];?>,<?php echo $array[19];?>,
            <?php echo $array[20];?>,<?php echo $array[21];?>,<?php echo $array[22];?>,<?php echo $array[23];?>],
          
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }

    });
</script>
    
</body>
</html>