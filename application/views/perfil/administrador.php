<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
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

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
<?php if(empty(($this->session->userdata('email')))){
    
    redirect('login/login_controller/proteger');
    
}
?>
<div id="container">
	<h1>Hello <?php echo $this->session->userdata('nome');?>, Welcome to CodeIgniter!  </h1>

	<div id="body">
          
                
        <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">WebSiteName</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><?php echo anchor('perfil/p_administrador', 'Home'); ?></li>
              <li><?php echo anchor('usuario/usuario_controller/listar_usuario', 'Manter Usuário'); ?></li>
              <li><?php echo anchor('cd/cd_controller/listar_cd', 'Manter CD'); ?></li>
              <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#"> Configurações
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/cd/index.php/setor/setor_controller/listar_setor" class="glyphicon glyphicon-cog"> Setor A</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor B</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor C</a></li>
                </ul>
              </li>
              <li><a href="http://localhost/cd/index.php/login/login_controller/sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              <li><a href="#">Page 3</a></li>
            </ul>
          </div>
        </nav>
           
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>