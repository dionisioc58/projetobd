<?php
    require '../banco.php';
    
    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $nomeErro     = null;
	$cpfErro      = null;
        $emailErro    = null;
        $telefoneErro = null;
        $enderecoErro = null;
        $senhaErro    = null;
        $csenhaErro   = null;
        
        $nome     = $_POST['nome'];
        $cpf      = $_POST['cpf'];
        $email    = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $senha    = $_POST['senha'];
        $csenha   = $_POST['csenha'];
        
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
                
        if(empty($senha))
        {
            $senhaErro = 'Por favor informe uma senha!';
            $validacao = false;
        }
        
        if(empty($csenha))
        {
            $csenhaErro = 'Por favor informe uma confirmação de senha!';
            $validacao = false;
        }

		if($senha != $csenha)
		{
			$senhaErro = 'A senha e a confirmação devem ser iguais!';
			$validacao = false;
		}

        //Inserindo no Banco:
        if($validacao)
        {
	    $pwd_hash = crypt($senha, '$3b$64$');
            $pdo = Banco::conectar();
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO pessoa (nome, cpf, email, telefone, endereco, senha) VALUES(?,?,?,?,?,?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($nome,$cpf,$email,$telefone,$endereco,$pwd_hash));
	    Banco::desconectar();
            header("Location: index.php");
		}
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="_css/login-cadastro.css" type="text/css"/>

		<div class="w3-top">
			<div class="w3-bar w3-light-blue" id="myNavbar">
			    <a href="index.html"><img class="w3-image w3-bar-item" 
			    src="_imagens/logo.png" style="width:10%"></a>
			    <span class="w3-bar-item w3-text-white w3-xxlarge">Hi-Car</span>
			</div>
		</div>
	</head>
	
	<body>
		<div class="fundo1 w3-display-container">
			
		      <div class="w3-content w3-white" style="max-width:450px; opacity: 0.95">

			      <div class="w3-center"><br>
			        <img src="_imagens/logo.png" alt="Logo" style="width:30%" class="w3-circle w3-margin-top">
			      </div>

			      <form class="w3-container" action="cadastro.php" method="post">
			        <div class="w3-section">
						<div class="control-group <?php echo !empty($nomeErro)?'error ' : '';?>">
							<div class="controls">
								<p><input class="w3-input" required type="text" placeholder="Nome" name="nome" value="<?php echo !empty($nome)?$nome: '';?>"></p>
								<?php if(!empty($nomeErro)): ?>
									<span class="help-inline"><?php echo $nomeErro;?></span>
								<?php endif;?>
							</div>
						</div>
			        	<div class="control-group <?php echo !empty($cpfErro)?'error ' : '';?>">
							<div class="controls">
								<p><input class="w3-input" required placeholder="CPF" type="text" name="cpf" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)"
									value="<?php echo !empty($cpf)?$cpf: '';?>"></p>
								<?php if(!empty($cpfErro)): ?>
                                    <span class="help-inline"><?php echo $cpfErro;?></span>
                                <?php endif;?>
							</div>
						</div>

						<div class="control-group <?php echo !empty($enderecoErro)?'error ': '';?>">
                            <div class="controls">
                                <p><input class="w3-input" type="text" required placeholder="Endereço" name="endereco" value="<?php echo !empty($endereco)?$endereco: '';?>"></p>
                                <?php if(!empty($enderecoErro)): ?>
									<span class="help-inline"><?php echo $enderecoErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

						<div class="control-group <?php echo !empty($telefoneErro)?'error ': '';?>">
                            <div class="controls">
                                <p><input class="w3-input" type="tel" required placeholder="Telefone  ex.:(00) 00000-0000" name="telefone" maxlength="15" value="<?php echo !empty($telefone)?$telefone: '';?>"></p>
                                <?php if(!empty($telefoneErro)): ?>
									<span class="help-inline"><?php echo $telefoneErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

						<div class="control-group <?php echo !empty($emailErro)?'error ': '';?>">
                            <div class="controls">
                                <p><input class="w3-input" type="text" required placeholder="Email" name="email" value="<?php echo !empty($email)?$email: '';?>"></p>
                                <?php if(!empty($emailErro)): ?>
                                	<span class="help-inline"><?php echo $emailErro;?></span>
                                <?php endif;?>
	                    	</div>
                        </div>

						<div class="control-group <?php echo !empty($senhaErro)?'error ': '';?>">
                            <div class="controls">
                                <p><input class="w3-input" type="password" required placeholder="Senha" name="senha" value="<?php echo !empty($senha)?$senha: '';?>"></p>
                                <?php if(!empty($senhaErro)): ?>
                                	<span class="help-inline"><?php echo $senhaErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="control-group <?php echo !empty($csenhaErro)?'error ': '';?>">
                            <div class="controls">
								<p><input class="w3-input" type="password" required placeholder="Confirmar senha" name="csenha" value="<?php echo !empty($csenha)?$csenha: '';?>"></p>
                                <?php if(!empty($csenhaErro)): ?>
                                	<span class="help-inline"><?php echo $csenhaErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
			      	</div>

			        <div class="w3-margin-top">
			    	  	<button class="w3-right w3-button w3-blue w3-hover-light-blue w3-round-xlarge" type="submit">Cadastrar</button>
			    	  	<a href="../index.php" type="button" class="w3-right w3-button w3-text-red w3-hover-red w3-round-xlarge w3-margin-right">Cancelar</a><br>
			        </div> <br>
			          
			          
			        </div>
			      </form>
		    </div>
		</div>
	</body>
	<script>
		function formatar(mascara, documento){
		  var i = documento.value.length;
		  var saida = mascara.substring(0,1);
		  var texto = mascara.substring(i)
		  
		  if (texto.substring(0,1) != saida){
		            documento.value += texto.substring(0,1);
		  }
		  
		}
	</script>
</html>
