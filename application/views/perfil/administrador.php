<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Painel Administrador</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
	<style type="text/css">

	
	</style>
</head>
<body>

<div id="container">
	<h1><?php foreach($consulta -> result() as $dados):?> <img src="../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?> <?php echo $this->session->userdata('nome');?> </h1>
       
         <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu_inicial.php'; ?>
        
        <p class="footer"></p>
</div>

</body>
</html>