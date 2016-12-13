<!DOCTYPE html>
<html ng-app="profile">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Perfil Pessoal</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/profile/profilectrl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/profile/profileAPIService.js" type="text/javascript"></script>



    </head>
    <body ng-controller="profilectrl">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php
            if ($this->session->userdata('perfil') == 'administrador') {

                include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
            } else {

                include 'C:\xampp\htdocs\cd\application\views\menu_head\usuario\menu.php';
            }
            ?>

            <h1><?php foreach ($preenche_dados->result() as $dados): ?> <img src="../../.<?php echo $dados->imagem; ?>" class="img-circle" width="50px" height="50px"> <?php endforeach; ?> <?php echo $this->session->userdata('nome'); ?></h1>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <!-- Your content goes here -->

                    <div id="container">
                        <div id="body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="modal-body">
                                            <form role="form" name='formProfile'  id="formulario_usuario">

                                                <div class="form-group">
                                                    <img data-ng-src="{{dataProfile.imagem}}" class="img-circle" width="100px" height="100px">
                                                </div>
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                                    <input class="mdl-textfield__input" name='nome' type="text" id="name"  ng-model="dataProfile.nome" ng-required="true">
                                                    <label class="mdl-textfield__label" for="name">Nome do Usuário</label>
                                                </div>
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                                    <input class="mdl-textfield__input" name='senha' type="password" id="password"  ng-model="dataProfile.senha" ng-required="true">
                                                    <label class="mdl-textfield__label" for="password">Senha</label>
                                                </div>
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                                    <input class="mdl-textfield__input" name='email'  type="text" id="email"  ng-model="dataProfile.email" ng-required="true">
                                                    <label class="mdl-textfield__label" for="email">E-mail</label>
                                                </div>
                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                                    <input class="mdl-textfield__input" name='ramal' type="text" id="ramal"  ng-model="dataProfile.ramal" ng-required="true">
                                                    <label class="mdl-textfield__label" for="ramal">Ramal</label>
                                                </div>


                                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                                    <select class="form-control" name='idsetor' ng-model="dataProfile.setor_fk"  ng-required="true" >

                                                        <option ng-repeat="dataSector in dataSector" value="{{dataSector.idsetor}}" >{{dataSector.nomesetor}}</option>



                                                    </select>
                                                </div>

                                                <input type="hidden" name='id' ng-model="dataProfile.id"/>

                                                <div>
                                                    <button type="button" class="btn btn-secondary" ng-if="!formProfile.$invalid" ng-click="alterProfile(dataProfile)" ><i class="material-icons">done</i></button>
                                                </div>
                                                 <div ng-show="message.length" ng-hide="hideMessage" class="alert alert-{{message.class}} alert-dismissible alert-upload fade in" role="alert">{{message.message}}</div>
                                                 
                                                </div>

                                            </form>	    
                                        
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>

                <p class="footer"></p>
        </div>
    </main>
</div>
</body>
</html>



