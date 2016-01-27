<?php 
	function __autoload($class_name)
	{
		require_once 'classes/' . $class_name . '.php';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Gerenciamento de Produtos</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	      </button>
	      <a class="navbar-brand" href="#">Página Inicial</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Produtos</a></li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>


	<?php
	$product = new Product();

	if(isset($_POST['cadastrar'])):
		$name 			= $_POST['name'];
		$description 	= $_POST['description'];
		$value 			= $_POST['value'];
		$amount			= $_POST['amount'];


		$product->setName($name);
		$product->setDescription($description);
		$product->setValue($value);
		$product->setAmount($amount);
		if($product->insert()):
			echo "Produto cadastrado com sucesso!";
		endif;
	endif;
	?>

	<?php 
		if(isset($_POST['atualizar'])):
			$id 			= $_POST['id'];
			$name 			= $_POST['name'];
			$description 	= $_POST['description'];
			$value 			= $_POST['value'];
			$amount			= $_POST['amount'];

			$product->setName($name);
			$product->setDescription($description);
			$product->setValue($value);
			$product->setAmount($amount);


			if($product->update($id)){
				echo "Atualizado com sucesso!";
			}
		endif;
	?>

	<?php 
	if (isset($_GET['acao']) && $_GET['acao'] == 'deletar'){

		$id = (int)$_GET['id'];

		if($product->delete($id)){
			echo "Deletado com sucesso!";
		}
	}
	?>

	<?php
	if (isset($_GET['acao']) && $_GET['acao'] == 'editar'){

		$id = (int)$_GET['id'];
		$resultado = $product->find($id);
	?>
	<section id="edit-product">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
					<form method="post" action="" class="form-horizontal">
						<div class="form-group">
						    <label for="name" class="col-sm-2 control-label">Nome</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="name" value="<?php echo $resultado->name; ?>" id="name" placeholder="Name">
						    </div>
						</div>

						<div class="form-group">
						    <label for="description" class="col-sm-2 control-label">Descrição</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="description" value="<?php echo $resultado->description; ?>" id="description" placeholder="Descrição">
						    </div>
						</div>

						<div class="form-group">
						    <label for="value" class="col-sm-2 control-label">Valor</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name="value" value="<?php echo $resultado->value; ?>" id="value" placeholder="Valor" min="0" step="0.50">
						    </div>
						</div>

						<div class="form-group">
						    <label for="amount" class="col-sm-2 control-label">Quantidade</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name="amount" value="<?php echo $resultado->amount; ?>" id="amount" placeholder="Quantidade" min="0">
						    </div>
						</div>
						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" name="atualizar" class="btn btn-default">Atualizar</button>
						    </div>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php } else { ?>

	<section id="add-product">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-8 col-md-offset-2">
					<form method="post" action="" class="form-horizontal">
						<div class="form-group">
						    <label for="name" class="col-sm-2 control-label">Nome</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="name" id="name" placeholder="Name">
						    </div>
						</div>

						<div class="form-group">
						    <label for="description" class="col-sm-2 control-label">Descrição</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" name="description" id="description" placeholder="Descrição">
						    </div>
						</div>

						<div class="form-group">
						    <label for="value" class="col-sm-2 control-label">Valor</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name="value" id="value" placeholder="Valor" min="0" step="0.50">
						    </div>
						</div>

						<div class="form-group">
						    <label for="amount" class="col-sm-2 control-label">Quantidade</label>
						    <div class="col-sm-10">
						      <input type="number" class="form-control" name="amount" id="amount" placeholder="Quantidade" min="0">
						    </div>
						</div>
						<div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button type="submit" name="cadastrar" class="btn btn-default">Cadastrar</button>
						    </div>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php } ?>

	<hr>

	<section id="product-list">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-10 col-md-offset-1">
					<table class="table table-hover">
			
						<thead>
							<tr>
								<th>#</th>
								<th>Nome:</th>
								<th>Descrição</th>
								<th>Valor</th>
								<th>Quantidade</th>
								<th>Ações:</th>
							</tr>
						</thead>
						
						<?php foreach($product->findAll() as $key => $value): ?>

						<tbody>
							<tr>
								<td><?php echo $value->id; ?></td>
								<td><?php echo $value->name; ?></td>
								<td><?php echo $value->description; ?></td>
								<td><?php echo $value->value; ?></td>
								<td><?php echo $value->amount; ?></td>
								<td>
									<?php echo "<a href='index.php?acao=editar&id=" . $value->id . "'>Editar</a>"; ?>
									<?php echo "<a href='index.php?acao=deletar&id=" . $value->id . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a>"; ?>
								</td>
							</tr>
						</tbody>

						<?php endforeach; ?>

					</table>
				</div>
			</div>
		</div>
	</section>
</body>
</html>