<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alterar Foto</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap-filestyle.min.js" type="text/javascript"></script>

        <script src="../../../bootstrap/js/jquery.forms.js" type="text/javascript"></script>

        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        <script src="../../../bootstrap/js/cdJquery.js" type="text/javascript"></script>

    </head>
    <body>

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php
            if ($this->session->userdata('perfil') == 'administrador')
            {

                include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
            } else
            {

                include 'C:\xampp\htdocs\cd\application\views\menu_head\usuario\menu.php';
            }
            ?>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <!-- Your content goes here -->
                    <div id="container">
                        <h1><div class="container-menu"></div></h1>
                        <div id="body">
                            <div class="content-grid mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col">
                                    <div class="modal-body">


                                        <div class="form-group" >
                                            <div class="image-profile"></div>
                                        </div>

                                        <div class="modal-dialog">
                                            <h4 class="modal-title">Selecione a nova imagem para seu perfil!</h4>
                                        </div>
                                        <div class="modal-body">

                                            <form role="form" name="form_image" method="post" action="<?= base_url('index.php/perfil_pessoal/perfil_pessoal_controller/alter_photo_profile') ?>" id="formulario_usuario" enctype="multipart/form-data">

                                                <div class="form-group">
                                                    <input type="file" id="imagem" name="imagem" class="filestyle" data-icon="false">
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="loadPhoto()"><i class="material-icons">autorenew</i></button>

                                                    <button type="button" class="btn btn-secondary" onclick="$('#formulario_usuario').submit()"><i class="material-icons">file_upload</i></button>
                                                    <div class="add-info"></div>

                                                </div> 
                                               
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>
                       </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>



<!--

<script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
<script src="../../../angular/lib/ngModel.js" type="text/javascript"></script>
<script src="../../../angular/js/app.js" type="text/javascript"></script>

<script src="../../../angular/js/controllers/photo_profile/photo_profilectrl.js" type="text/javascript"></script>
<script src="../../../angular/js/services/photo_profile/photo_profileAPIService.js" type="text/javascript"></script>

<script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        

<div ng-repeat="dataProfilePhoto in dataProfilePhoto">
        <div class="form-group" >
            <img ng-src="../../.{{dataProfilePhoto.imagem}}" class="img-circle" width="100px" height="100px">
        </div>
    </div> 

        <div class="form-group">
            <input type="file" name="imagem" ng-model="action.imagem" class="filestyle" data-icon="false" required="required">
        </div>
        <div>
            <button type="button" ng-click="alterPhotoProfile(action)" class="btn btn-secondary">Atualizar</button>
        </div>	
</form>	    
-->