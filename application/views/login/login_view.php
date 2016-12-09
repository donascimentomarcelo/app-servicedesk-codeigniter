<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CD Login</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
        <link href="newCascadeStyleSheet.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="<? echo base_url('bootstrap/css/cd.css') ?>" rel="stylesheet" type="text/css"/>
</head>       

<body>
    <div id="container">
        <div id="body">
            <div class="login-form">
                <form class="login" action="<?= base_url('index.php/login/login_controller/autenticar') ?>" method="post">
                    <p class="title">Log in</p>
                    <label>Email</label>
                    <input type="text" placeholder="Username" name="email" required="required"  autofocus/>
                    <i class="fa fa-user"></i>
                    <label>Senha</label>
                    <input type="password" placeholder="Password" required="required" name="senha" />
                    <i class="fa fa-key"></i>
                    <?php echo validation_errors(); ?>
                    <button type="submit">
                        <span class="state">Log in</span>
                    </button>
                    <?php
                    if (isset($alerta)) {
                        if ($alerta != null) {
                            ?>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-4"></div>
                                    <center>
                                        <div class="">
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
                </p>
            </div>
        </div>
    </div>
</body>
</html>