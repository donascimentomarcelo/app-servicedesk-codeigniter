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
                    $dataInicial = '22/09/2016';
                    $sla = 1;
                    $horaAtual = date('H');
                    $minutoAtual = date('i');
                //$final =  date( 'H', strtotime( $sla ." hours" ) ); 
                //$sla = $sla * 60;//converte o periodo da SLA para minutos.
                //$porcentagem = ($minutoAtual * 100)/$sla;
                //echo $horaAtual,':';
                //echo $minutoAtual,'</br>';
                //echo $porcentagem = (int)$porcentagem;
                echo 'timestamp:'.$time = time().'<br>';
                     if($sla == 1){
                    
                        $sla = $sla * 60;
                        $porcentagem = ($minutoAtual * 100)/$sla;
                        
                        
                            while($minutoAtual > 59){
                            $minuto = 59;
                            $minutoAtual = $minuto + $minutoAtual;
                            $sla = $sla * 60;
                            $porcentagem = ($minutoAtual * 100)/$sla;
                            
                        }
                        echo $minutoAtual,'</br>';
                        $porcentagem = (int)$porcentagem;
                        
                    }/*else if($sla <= 2 ){
                        
                        $sla = $sla * 60;
                        $porcentagem = (($horaAtual * 100)/$sla);
                        $porcentagem = (int)$porcentagem;
                        
                    }*/

                if($porcentagem <= 25){

                $class = 'success';
                }else if($porcentagem >=26 && $porcentagem <=80){

                $class = 'warning';

                }else{

                $class = 'warning';


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