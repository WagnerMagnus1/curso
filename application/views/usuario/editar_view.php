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
		<div class="row">
			<div class="col-ml-12">
					<h1>Editar Usuário</h1>
					
					<?php if($alerta){ ?>
						<div class="alert alert-<?php echo $alerta["class"]; ?>">
						<?php echo $alerta["mensagem"]; ?>
						</div>
					<?php } ?>

					<?php if($usuario){?>
						<form method="post" class="form-horizontal" action="<?php echo base_url('usuario/editar/'. $usuario['id']); ?>">
							<input type="hidden" name="captcha">
							<input type="hidden" name="id_usuario" value="<?php echo $usuario['id']; ?>">
							 <div class="form-group">
							    <label for="email" class="col-sm-2 control-label">Email</label>
							    <div class="col-sm-10">
							      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email') ?: $usuario['email']; ?>">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="senha" class="col-sm-2 control-label">Senha</label>
							    <div class="col-sm-10">
							      <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha">
							    </div>
							  </div>
							  <div class="form-group">
							    <label for="confirmar_senha" class="col-sm-2 control-label">Corfirmar Senha</label>
							    <div class="col-sm-10">
							      <input type="password" name="confirmar_senha" class="form-control" id="confirmar_senha" placeholder="Confirmar Senha">
							    </div>
							  </div>

							  <div class="form-group">
							    <div class="col-sm-offset-2 col-sm-4">
							      <a href="<?php echo base_url('usuario/visualizar_todos');?>" type="submit" class="btn btn-default">Voltar</a>
							    </div>
							    <div class="col-sm-offset-2 col-sm-4">
							      <button type="submit" name="editar" value="editar" class="btn btn-sucess pull-right">Finalizar Edição</button>
							    </div>
							  </div>
						</form>
					<?php } ?>
			</div>	
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>