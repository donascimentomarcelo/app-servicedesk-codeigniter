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

<div id="container">
	<h1>Manter Setor</h1>
        <div id="body">
            <div class="row">
                <div class="col-md-4">
                    <div class="modal-body">

                        <form role="form" method="post" name="formSector">
                            <div class="form-group">
                                <input type="hidden" ng-model="action.idsetor" value="" />
                            </div>
                            <div class="form-group">
                                <input type="text"  class="form-control" ng-model="action.nomesetor" ng-required="true" placeholder="Nome do setor.">
                            </div>
                            <div class="form-group">
                                <label for="email">Status:</label><br>
                                <label class="radio-inline">
                                    <input type="radio" value="ativo" ng-model="action.statussetor" ng-required="true"> Ativo
                                </label>
                                <label class="radio-inline">
                                    <input type="radio"  value="inativo" ng-model="action.statussetor" ng-required="true"> Inativo
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" ng-if="!formSector.$invalid" ng-click="saveOrEdit(action)" >Salvar</button>

                                <button type="button" class="btn btn-default" ng-click="new()">Novo</button>
                            </div>
                        </form>	    

                    </div>
                </div>
                <div class="margin-top-table">
                <div class="col-md-8">
                    <input type="text"  class="form-control" ng-model="search" placeholder="Pesquise pelo nome do setor.">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="none-table-480" style="text-align: center;" ng-click="ordenationBy('idsetor')">Código do Setor
                                <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'idsetor'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                </th>
                                <th style="text-align: center;" ng-click="ordenationBy('nomesetor')">Nome do Setor
                                <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'nomesetor'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                </th>
                                <th class="none-table-768 none-table-480" style="text-align: center;" ng-click="ordenationBy('statussetor')">Status
                                <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'statussetor'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-click="edit(dataSector); itemClicked(dataSector.idsetor)" ng-class="{ 'cinza negrito': selectedIndex === dataSector.idsetor }" dir-paginate="dataSector in dataSector | orderBy:ordenationCritery:ordenation | filter:{nomesetor:search}| itemsPerPage : 5">
                                <td class="none-table-480" style="text-align: center;">{{dataSector.idsetor}}</td>
                                <td style="text-align: center;">{{dataSector.nomesetor}}</td>
                                <td class="none-table-768 none-table-480" style="text-align: center;">{{dataSector.statussetor}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div style="text-align: center;">
                             <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                    </div>
                </div>
                </div>
            </div>

	<p class="footer"></p>
</div>
 
</body>
</html>
