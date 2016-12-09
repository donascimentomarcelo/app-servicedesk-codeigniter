<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CD Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
</head>       

<body>
        <div id="body">
            <div class="login-form">
                <form class="login" action="<?= base_url('index.php/login/login_controller/autenticar') ?>" method="post">
                    <p class="title">Log in</p>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width">
                        <input class="mdl-textfield__input" type="text" id="userlgn" name="email" required="required"  autofocus>
                        <label class="mdl-textfield__label" for="userlgn">Nome do Usuário</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width">
                        <input class="mdl-textfield__input" type="password" id="passwordlgn"  required="required" name="senha">
                        <label class="mdl-textfield__label" for="passwordlgn">Nome do Usuário</label>
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
<style>
    
        ::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #4F5155;
		margin: 0px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}
        #body{
		margin-left: auto;
                margin-right: auto;
                background-color: white;
                border: 1px solid #b95555
	}
        

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
        
        a{
            color: #111;
        }
        
        .login-form{
            width: 1000px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .table{
            margin-top: 3px;
        }
        #search{
            margin-top: 4px;
        }
        
        /*RESPONSIVE*/
            
        @media (max-width: 2440px){
            
            .full-width { 
                width: 70%; 
            }
            .login-form{
            width: 1000px;
            height: 300px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
            .alertlgn{
            width: 50%;
            align: center;
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
            width: 1000px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        }
       
        @media (max-width:992px) {
            
            
            
            .full-width { 
                width: 100%; 
            }
            .login-form{
            width: 800px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        }
        @media (max-width:768px) {
            
            .full-width { 
                    width: 100%; 
            }
            .login-form{
            width: 500px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .alertlgn{
            width: 80%;
            align: canter;
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
            width: 200px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
        .alertlgn{
            width: 100%;
            align: canter;
        }
        .buttomlgn{
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 5%
        }
        .mdl-button {
            min-width: 200px;
        }
        }
        @media (max-width: 408px){
            
            .height-form{
                height: 150px;
            }
            
            .full-width { 
                    width: 100%; 
                    margin-left: auto; 
                    margin-right: auto; 
                }
        }
        .mdl-layout__header{
        background-color: rgb(77, 78, 82);
        }
    
</style>
</html>