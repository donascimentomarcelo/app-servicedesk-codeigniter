<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
                date_default_timezone_set('America/Sao_Paulo');

                $inicio = new DateTime('2016-09-22 17:30:00');
                $fim = new DateTime('2016-09-27 14:30:00');
                $agora = new DateTime();

                $diffInicioFim = $fim->getTimestamp() - $inicio->getTimestamp();
                $diffInicioAgora = $agora->getTimestamp() - $inicio->getTimestamp();

                $pct = $diffInicioAgora / $diffInicioFim * 100;

                echo number_format($pct, 2), PHP_EOL;

                if($pct <= 25){

                $class = 'success';
                
                }else if($pct >=26 && $pct <=80){

                $class = 'warning';

                }else if($pct >= 81 && $pct <= 99) {
                    
                $class = 'danger';

                }else if($pct >= 100) {
                    
                $pct = 100;
                $class = 'danger';

                }
                
                $inicio = date('Y-m-d H:i:s'); 
                $fim = date('Y-m-d H:i:s', strtotime("+2 hours",strtotime($inicio))); 

?>


<div class="progress">
  <div class="progress-bar-<?php echo $class;?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo number_format($pct, 2);?>%">
    <?php echo number_format($pct, 2),'%';?>
  </div>
</div>

</body>
</html>