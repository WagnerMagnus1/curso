<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard - Index</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">I'm DevIgniter</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="<?php echo base_url('Dashboard'); ?> ">Dashboard</a>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Usuários <span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="<?php echo base_url('usuario/visualizar_todos'); ?>">Visualizar</a></li>
	            <li><a href="#">Cadastrar</a></li>
	          </ul>
	        </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
	          <ul class="dropdown-menu">
	            <li><a href="#">Editar Minha Conta</a></li>
	            <li role="separator" class="divider"></li>
	            <li><a href="<?php echo base_url('conta/sair'); ?>">Sair</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<riv class="row">
			<div class="col-ml-12">
					<h1>Visualização de Usuários!</h1>

					<div class="table-responsive">
					  <table class="table">
					    <thead>
					    <tr>
					    	<th>Id</th>
					    	<th>Email</th>
					    	<th>Data Criação</th>
					    	<th>Ações</th>
					    </tr>
					    </thead>
					    <tbody>
					    	<?php 
					    		if($usuarios){
					    	      foreach ($usuarios as $usuario) { 
				    		?>
					    		
					    		<tr>
					    			<th><?php echo $usuario['id'];      ?>     </th>	
					    			<th><?php echo $usuario['email'];   ?>     </th>
					    			<th><?php echo $usuario['created']; ?>     </th>
					    			<th>
					    				<a class="btn btn-default" href="<?php echo base_url('usuario/editar/'.$usuario['id']); ?>">
					    					<i class="glyphicon glyphicon-pencil"></i>
					    				</a>
					    				<a class="btn btn-danger" onclick="return confirm('Deseja deletar este usuario?');" href="<?php echo base_url('usuario/deletar/'.$usuario['id']); ?>">
					    					<i class="glyphicon glyphicon-trash"></i>
					    				</a>
					    			</th>
					    		</tr>

					    	<?php 
					    			} 
								}else{ 
							?>
									<tr>
										<td colspan="3" class="text-center">Não há usuários cadastrados</td>
									</tr>
							<?php	}	
				    		?>
					    </tbody>
					  </table>
					</div>
			</div>
		</riv>
	</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>