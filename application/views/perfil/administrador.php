<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Painel Administrador</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php'; ?>
        <main class="mdl-layout__content">
            <div class="page-content">
                <!-- Your content goes here -->
                <div id="container">
                    <h1><?php foreach ($consulta->result() as $dados): ?> <img src="../.<?php echo $dados->imagem; ?>" class="img-circle" width="50px" height="50px"> <?php endforeach; ?> <?php echo $this->session->userdata('nome'); ?> </h1>
                    <p class="footer"></p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>