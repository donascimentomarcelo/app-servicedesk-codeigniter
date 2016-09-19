<?php

 foreach ($retorno -> result() as $dados ):
                $idcd = $dados->idcd;
                $nomecd = $dados->nomecd;
                $gravadora = $dados->gravadora;
                $horafinal = $dados->horafinal;
                $datafinal = $dados->datafinal;
                $sla = $dados->sla;
               
            endforeach;
            $dataAtual = date('d/m/Y');
            $horaAtual = date('H');
            $minutoAtual = date('i');

            $sla = $sla * 60;//converte o periodo da SLA para minutos.

            if($horafinal >= $horaAtual && $datafinal >= $dataAtual){
                
                    $porcentagem = ($minutoAtual * 100)/$sla;
                    
                    $porcentagem = (int)$porcentagem;

                    if($porcentagem <= 25){

                    $class = 'success';

                    }else if($porcentagem >=26 && $porcentagem <=80){

                    $class = 'warning';

                    }else{

                    $class = 'danger';

                    }
            }else{
                    $class = 'danger';
                    $porcentagem = 100;
                    
            }
            
            $array = array(
                'idcd'=>$idcd,
                'nomecd'=>$nomecd,
                'gravadora'=>$gravadora,
                'class'=>$class,
                'porcentagem'=>$porcentagem
            );
            
            return $array;
        
            
            
      public function listar_cd(){
            
            $this->load->model('cd/cd_model');

            $row = $this->cd_model->exibe_cd();
            
            foreach ($row  as $linha):
                $datafinal = $linha['datafinal'];
                $horafinal = $linha['horafinal'];
                $nomecd = $linha['nomecd'];
                $gravadora = $linha['gravadora'];
                $class = $linha['class'];
                $porcentagem = $linha['porcentagem'];
                $idcd = $linha['idcd'];
                $sla = $linha['sla'];
            endforeach;
            
            $dataAtual = date('d/m/Y');
            $horaAtual = date('H');
            $minutoAtual = date('i');

            $sla = $sla * 60;//converte o periodo da SLA para minutos.

            if($horafinal >= $horaAtual && $datafinal >= $dataAtual){
                
                    $porcentagem = ($minutoAtual * 100)/$sla;
                    
                    $porcentagem = (int)$porcentagem;

                    if($porcentagem <= 25){

                    $class = 'success';

                    }else if($porcentagem >=26 && $porcentagem <=80){

                    $class = 'warning';

                    }else{

                    $class = 'danger';

                    }
            }else{
                    $class = 'danger';
                    $porcentagem = 100;
                    
            }
            foreach ($row  as $linha):
            $array = array(
                'idcd'=>$idcd,
                'nomecd'=>$nomecd,
                'gravadora'=>$gravadora,
                'class'=>$class,
                'porcentagem'=>$porcentagem
            );
        endforeach;
            //echo var_dump($array);
            $variaveis['consulta'] = $array;
            
            $this->load->helper('valida_login/valida_helper');
        
            $variaveis['validacao'] = getValida();
            
            
            $this->load->helper('preenche_dados/preenche_dados_helper');
        
            $variaveis['preenche_dados'] = getPreencheDados();
        
            
            $this->load->view("menu_cd/listar_cd_view",$variaveis);
        }
        
        <?php foreach ($consulta  as $linha): ?> 
                    
                <tr>
                    <td style="text-align: center;"><?php echo $linha['idcd'] ?></td>
                    <td style="text-align: center;"><?php echo $linha['nomecd'] ?></td>
                    <td style="text-align: center;"><?php echo $linha['gravadora'] ?></td>
                    <td style="text-align: center;"><a href="javascript:;"  onclick="janelaNovoCd(<?= $linha['idcd']?>)"><button type="button" class="glyphicon glyphicon-cog"></button></a><a href="javascript:;"  onclick="confirma(<?= $linha['idcd'] ?>)"><button type="button" class="glyphicon glyphicon-trash"></button></a></td>
                </tr>
                <?php endforeach;?>