<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="page-header">
		  <h1>Área de Login</h1>
		</div>
      	<div class="col-md-4 col-md-offset-4">

     		
     			<?php if($alerta != null){?>

 					<div class="alert alert-danger">
 					   <?php echo $alerta["mensagem"];?>
 					</div>
     	        <?php } ?>
     		

      		<form action="<?php echo base_url('conta/entrar'); ?>" method="post">
	      		<input type="hidden" name="captcha">
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?php echo set_value('email')?>">
				  </div>
				  <div class="form-group">
				    <label for="senha">Senha</label>
				    <input type="password" name="senha" class="form-control" id="senha" placeholder="Senha" value="<?php echo set_value('senha')?>">
				  </div>
				  <button type="submit" name="entrar" value="entrar" class="btn btn-sucess pull-right">Entrar</button>
			</form>

      	</div>
      	
      </div>
    	
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  </body>
</html>