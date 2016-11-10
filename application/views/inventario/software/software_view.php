<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Inventário - Software</title>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/inventario/hardwarecrtl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/hardwareAPIService.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>
       
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        <link href="../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript">
        
            $(document).ready(function(){
                         $('.dropdown-toggle').dropdown();
            });
     
        </script>
        
      
        </head>
        <body>

        <div id="container">
                <h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?> <?php echo $this->session->userdata('nome');?></h1>

               <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu_inicial.php'; ?>

            <div id="container">

                 <div class="" id="form_padrao" data-backdrop="static" >

                  <div class="modal-header">
                    <h4 class="modal-title">Inventário - Software</h4>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6">
                                  <div class="form-group">
                                      <input class="form-control" type="hidden">
                                  </div>
                                  <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Nome do software">
                                  </div>
                                  <div class="form-group">
                                      <input class="form-control" type="text" placeholder="Licença do Software">
                                  </div>
                                  <div class="form-group">
                                      <select class="form-control">
                                          <option></option>
                                      </select>
                                  </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <input class="form-control" type="text" placeholder="Pesquise o pelo nome do Software." 
                              </div>
                              <table class="table">
                                  <tr>
                                      <td>ID</td>
                                      <td>Nome do Software</td>
                                      <td>Licença</td>
                                      <td>Fabricante</td>
                                      <td></td>
                                  </tr>
                                  <tr>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                      <td></td>
                                  </tr>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="modal-footer">

                  </div>
                </div>
            </div>
	</div>

    
<p class="footer"></p>

</body>
</html>
