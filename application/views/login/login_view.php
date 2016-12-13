<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        <link href="../../../bootstrap/css/login.css" rel="stylesheet" type="text/css"/>
</head>       
<style>
        body {
		background-color: #4F5155;
		margin: 0px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
        
        

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
                color: #111;
	}

        /*RESPONSIVE*/
            
        @media (max-width: 2440px){
            
            .full-width { 
                width: 70%; 
            }
            .login-form{
            margin-top: 3%;
            width: 90%;
            height: 400px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            background-color: white;
            border: 1px solid #b95555
        }
        .alertlgn{
            width: 40%;
            margin-bottom: 0%;
            margin-top: 3%;
        }
        .buttomlgn{
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 2%
        }
        }
        @media (max-width: 1024px){
            
            .full-width { 
                width: 70%; 
            }
            .formResponsive{
                width: 100%;
                margin-right: 60%;
                margin-left: 2%;
            }
            .login-form{
            margin-top: 3%;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            background-color: white;
            border: 1px solid #b95555
        }
        .alertlgn{
            width: 40%;
            margin-bottom: 0%;
            margin-top: 3%;
        }
        }
       
        @media (max-width:992px) {
            
            
            
            .full-width { 
                width: 100%; 
            }
            .login-form{
            margin-top: 3%;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            background-color: white;
            border: 1px solid #b95555
            }
            
            .mdl-button {
                min-width: 500px;
            }
            }
        @media (max-width:768px) {
            
            .full-width { 
                width: 75%; 
            }
            .login-form{
            margin-top: 3%;
            width: 90%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            background-color: white;
            border: 1px solid #b95555
            }
            .alertlgn{
                width: 79%;
                margin-bottom: 0%;
                margin-top: -1%;
            }
            .mdl-button {
                min-width: 500px;
            }

            }

        @media (max-width:480px) {
            
            .full-width { 
             width: 100%; 
            }
            .login-form{
            margin-top: 0%;
            height: 340px;
            width: 100%;
            background-color: white;
            border: 1px solid #b95555
            }
            .alertlgn{
                width: 100%;
                min-width: 100%;
                margin-bottom: 0%;
                margin-top: -3%;
            }
            .buttomlgn{
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 5%
            }
            .mdl-button {
                
                min-width: 100%;
                margin-bottom: 0%;
                margin-top: 0%;
            }
            .col-md-12{
                    padding-right: 0px;
                    padding-left: 0px;
            }
            #body {    
            margin: 0 0px 0 0px;
            }
            }
            
        @media (max-width: 408px){
            
            .full-width { 
             width: 100%; 
            }
            .login-form{
            margin-top: 0%;
            height: 340px;
            width: 100%;
            background-color: white;
            border: 1px solid #b95555
            }
            .alertlgn{
                width: 100%;
                min-width: 100%;
                margin-bottom: 0%;
                margin-top: -3%;
            }
            .buttomlgn{
                margin-left: auto;
                margin-right: auto;
                margin-bottom: 5%
            }
            .mdl-button {
                min-width: 100%;
            }
            .col-md-12{
                    padding-right: 0px;
                    padding-left: 0px;
            }
            #body {    
            margin: 0 0px 0 0px;
            }
            .mdl-layout__header{
            background-color: rgb(77, 78, 82);
            }
        }

</style>
<body>
        <div id="body">
            <div class="login-form">
                <form class="login" action="<?= base_url('index.php/login/login_controller/autenticar') ?>" method="post">
                    <h1>Login</h1>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width">
                        <input class="mdl-textfield__input" type="text" id="userlgn" name="email" required="required"  autofocus>
                        <label class="mdl-textfield__label" for="userlgn">Login</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width">
                        <input class="mdl-textfield__input" type="password" id="passwordlgn"  required="required" name="senha">
                        <label class="mdl-textfield__label" for="passwordlgn">Senha</label>
                    </div>
                    <div class="buttomlgn">    
                    
                    <?php echo validation_errors(); ?>
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--raised">
                            <i class="material-icons">arrow_forward</i>
                        </button>
                    
                    </div>
                    <?php
                    if (isset($alerta)) {
                        if ($alerta != null) {
                            ?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <center>
                                        <div class="alertlgn">
                                            <div class="alert alert-<?php echo $alerta['class']; ?>">
                                            <?php echo $alerta['mensagem']; ?>
                                            </div>
                                        </div>
                                    </center>
                                </div>

                            </div>
                            <?php
                        }
                    }
                    ?>
                </form>
              
            </div>
        </div>
</body>

</html>