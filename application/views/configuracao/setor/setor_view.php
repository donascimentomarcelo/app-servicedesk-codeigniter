<!DOCTYPE html>
<html ng-app="sector">
<head>
	<meta charset="utf-8">
	<title>Manter Setor</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
       
        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/sector/sectorctrl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/sector/sectorAPIService.js" type="text/javascript"></script>
        
        <script type="text/javascript">
       
            $(document).ready(function(){
                $('.dropdown-toggle').dropdown();
            });
                   
    
        </script>
        
      
</head>
<body ng-controller="sectorctrl">
<?php if(empty(($this->session->userdata('email')))){
    
    redirect('login/login_controller/proteger');
    
}
?>
<div id="container">
	<h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?> <?php echo $this->session->userdata('nome');?></h1>

        <?php 

            include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
        ?>

</head>
<body>

<div id="container">
	<h1>Manter Setor</h1>
        <div id="body">
            <div class="row">
                <div class="col-md-4">
                    <div class="modal-body">

                        <form role="form" method="post" action="<?= base_url('index.php/setor/setor_controller/salvar_setor') ?>" id="formulario_setor">
                            <div class="form-group">
                                <input type="text"  class="form-control" placeholder="Nome do setor.">
                            </div>
                            <div class="form-group">
                                <label for="email">Status:</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="statussetor" value="ativo" checked="checked"> Ativo
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="statussetor"  value="inativo"> Inativo
                                </label>
                            </div>
                            <input type="hidden" name="idsetor" id="idsetor" value="" />
                        </form>	    

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" >Novo</button>

                        <button type="button" class="btn btn-default" >Salvar</button>
                    </div>
                </div>
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Código do Setor</th>
                                <th style="text-align: center;">Nome do Setor</th>
                                <th style="text-align: center;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr dir-paginate="dataSector in dataSector | itemsPerPage : 5">
                                <td style="text-align: center;">{{dataSector.idsetor}}</td>
                                <td style="text-align: center;">{{dataSector.nomesetor}}</td>
                                <td style="text-align: center;">{{dataSector.statussetor}}</td>
                            </tr>
                             <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                        </tbody>
                    </table>
                </div>
            </div>

	<p class="footer"></p>
</div>
 
</body>
</html>
