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
$dataInicial = '16/09/2016';
$dataFinal = '16/09/2016';

$horaFinal = '24';
$dataAtual = date('d/m/Y');
$sla = 1;


$horaAtual = date('H');
$minutoAtual = date('i');

$final =  date( 'H', strtotime( $sla ." hours" ) ); 

$sla = $sla * 60;//converte o periodo da SLA para minutos.

if($horaFinal >= $horaAtual && $dataFinal >= $dataAtual){
        $porcentagem = ($minutoAtual * 100)/$sla;

        echo $horaAtual,':';
        echo $minutoAtual,'</br>';
        echo $horaFinal,'</br>';
        echo $porcentagem = (int)$porcentagem;

        if($porcentagem <= 25){

        $class = 'success';

        }else if($porcentagem >=26 && $porcentagem <=80){

        $class = 'warning';

        }else{

        $class = 'danger';

        }
}else{
        echo $horaAtual,':';
        echo $minutoAtual,'</br>';
        echo $horaFinal,'</br>';
        
        $class = 'danger';
        $porcentagem = 100;
    
}
/*
 * 3 x 100 = 300 
 * 300 : 60 = 5% 
 */

?>


<div class="progress">
  <div class="progress-bar-<?php echo $class;?>" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $porcentagem;?>%">
    <?php echo $porcentagem,'%';?>
  </div>
</div>

</body>
</html>