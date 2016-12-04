<!DOCTYPE html>
<html ng-app="category">
<head>
	<meta charset="utf-8">
	<title>Manter Categoria</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/category/categoryctrl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/category/categoryAPIService.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        
        <script type="text/javascript">
       
        $(document).ready(function(){
                     $('.dropdown-toggle').dropdown();
        });
        
        </script>
        
      
</head>
<body ng-controller="categoryctrl">

	<h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?><?php echo $this->session->userdata('nome');?>  </h1>

        <?php 

            include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
        ?>


        <div id="container">
            <h1>Manter Categoria</h1>
            <div id="body">
                <div class="row">
                    <div class="col-md-4">
                            <div class="modal-body">
                               <form role="form" name="categoryForm" >
                                   <div class="form-group">
                                        <input type="text"  class="form-control" ng-model="action.nomecategoria" ng-required="true" placeholder="Nome da categoria.">
                                   </div>
                                   <input type="hidden" ng-model="action.idcategoria"/>
                               </form>	    

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" ng-if="!categoryForm.$invalid" ng-click="saveOrEditCategory(action)">Salvar</button>

                                <button type="button" class="btn btn-default" ng-click="new()" >Novo</button>
                            </div>
                    </div>
                    <div class="margin-top-table">
                        <div class="col-md-8">
                            <input type="text" class="form-control" ng-model="search" placeholder="Pesquise pelo nome da categoria.">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" ng-click="ordenationBy('idcategoria')">Código da Categoria
                                        <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'idcategoria'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                        <th style="text-align: center;" ng-click="ordenationBy('nomecategoria')">Nome da Categoria
                                        <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'nomecategoria'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-click="edit(loadDataCategory); itemClicked(loadDataCategory.idcategoria)" ng-class="{ 'cinza negrito': selectedIndex === loadDataCategory.idcategoria }"dir-paginate="loadDataCategory in loadDataCategory | orderBy: ordenationCritery:ordenation | filter:{nomecategoria:search}| itemsPerPage : 5">
                                        <td style="text-align: center;">{{loadDataCategory.idcategoria}} </td>
                                        <td style="text-align: center;">{{loadDataCategory.nomecategoria}} </td>
                                    </tr>
                                </tbody>
                            </table>    
                           <div style="text-align: center;">
                                 <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                           </div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="footer"></p>
        </div>
  
</body>
</html>
