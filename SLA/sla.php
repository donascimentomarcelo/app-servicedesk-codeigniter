<?php

$data_inicial = '23/03/2009';
$data_final = '04/11/2009';
// Cria uma função que retorna o timestamp de uma data no formato DD/MM/AAAA
function geraTimestamp($data) {
$partes = explode('/', $data);

return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
}
// Usa a função criada e pega o timestamp das duas datas:
$time_inicial = geraTimestamp($data_inicial);
$time_final = geraTimestamp($data_final);
// Calcula a diferença de segundos entre as duas datas:
$diferenca = $time_final - $time_inicial; // 19522800 segundos
// Calcula a diferença de dias
$dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
// Exibe uma mensagem de resultado:
echo "A diferença entre as datas ".$data_inicial." e ".$data_final." é de <strong>".$dias."</strong> dias";
// A diferença entre as datas 23/03/2009 e 04/11/2009 é de 225 dias

/*
   $data = date('Y-m-d H:i:s');
   $da = date('Y-m-d H:i:s');
   $data =  date( 'Y-m-d H:i:s', strtotime( $sla ." hours" ) );
*/  if($data >= date('Y-m-d H:i:s')){
                    
                    if($sla == 1){
                    
                        $sla = $sla * 60;
                        $porcentagem = ($minutoAtual * 100)/$sla;
                        $porcentagem = (int)$porcentagem;
                        
                    }else if($sla == 2 ){
                        
                        $porcentagem = ($horaAtual * 100)/$sla;
                        $porcentagem = (int)$porcentagem;
                        
                    }
}