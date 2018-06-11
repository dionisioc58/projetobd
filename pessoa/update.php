<?php 
	
	require '../banco.php';

	$id = null;
	if ( !empty($_GET['id'])) 
            {
		$id = $_REQUEST['id'];
            }
	
	if ( null==$id ) 
        {
	    header("Location: index.php");
	}
	
	if ( !empty($_POST)) 
            {
		
		//Acompanha os erros de validação
		$nomeErro     = null;
		$cpfErro      = null;
		$emailErro    = null;
		$telefoneErro = null;
		$enderecoErro = null;
		
		$nome     = $_POST['nome'];
		$cpf      = $_POST['cpf'];
		$email    = $_POST['email'];
		$telefone = $_POST['telefone'];
		$endereco = $_POST['endereco'];
		
		//Validaçao dos campos:
		$validacao = true;
		if(empty($nome))
		{
		    $nomeErro = 'Por favor digite o seu nome!';
		    $validacao = false;
		}

		if(empty($cpf))
		{
		    $cpfErro = 'Por favor digite o seu CPF!';
		    $validacao = false;
		}

		if(empty($email))
		{
		    $emailErro = 'Por favor digite o endereço de email';
		    $validacao = false;
		}
		elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
		{
		    $emailError = 'Por favor digite um endereço de email válido!';
		    $validacao = false;
		}

		if(empty($telefone))
		{
		    $telefoneErro = 'Por favor digite o número do telefone!';
		    $validacao = false;
		}

		if(empty($endereco))
		{
		    $enderecoErro = 'Por favor digite o seu endereço!';
		    $validacao = false;
		}        
		        		
		// update data
		if ($validacao) 
                {
                    $pdo = Banco::conectar();
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE pessoa  set nome = ?, cpf = ?, email = ?, telefone = ?, endereco = ? WHERE idPessoa = ?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($nome, $cpf, $email, $telefone, $endereco, $id));
                    Banco::desconectar();
                    header("Location: index.php");
		}
	} 
        else 
            {
                $pdo = Banco::conectar();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM pessoa where idPessoa = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$nome = $data['nome'];
		$cpf = $data['cpf'];
		$email = $data['email'];
                $telefone = $data['telefone'];
                $endereco = $data['endereco'];
		Banco::desconectar();
	}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3 class="well"> Atualizar Contato </h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                        
                        <div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
                            <label class="control-label">Nome</label>
                            <div class="controls">
                                <input size= "50" name="nome" type="text" placeholder="Nome" required="" value="<?php echo !empty($nome)?$nome: '';?>">
                                <?php if(!empty($nomeErro)): ?>
                                    <span class="help-inline"><?php echo $nomeErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="control-group <?php echo !empty($cpfErro)?'error ' : '';?>">
                            <label class="control-label">CPF</label>
                            <div class="controls">
                                <input size= "15" name="cpf" type="text" placeholder="CPF" required="" value="<?php echo !empty($cpf)?$cpf: '';?>">
                                <?php if(!empty($cpfErro)): ?>
                                    <span class="help-inline"><?php echo $cpfErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

			<div class="control-group <?php echo !empty($emailErro)?'error ': '';?>">
                            <label class="control-label">Email</label>
                            <div class="controls">
                                <input size="40" name="email" type="text" placeholder="Email" required="" value="<?php echo !empty($email)?$email: '';?>">
                                <?php if(!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif;?>
	                    </div>
                        </div>

			<div class="control-group <?php echo !empty($telefoneErro)?'error ': '';?>">
                            <label class="control-label">Telefone</label>
                            <div class="controls">
                                <input size="35" name="telefone" type="text" placeholder="Telefone" required="" value="<?php echo !empty($telefone)?$telefone: '';?>">
                                <?php if(!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $telefoneErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        
                        <div class="control-group <?php echo !empty($enderecoErro)?'error ': '';?>">
                            <label class="control-label">Endereço</label>
                            <div class="controls">
                                <input size="80" name="endereco" type="text" placeholder="Endereço" required="" value="<?php echo !empty($endereco)?$endereco: '';?>">
                                <?php if(!empty($emailErro)): ?>
                                <span class="help-inline"><?php echo $enderecoErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        
                        <br/>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Atualizar</button>
                          <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        </div>
                    </form>
                </div>                 
    </div> 
  </body>
</html>

