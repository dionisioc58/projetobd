<?php
	session_start();
    require './banco.php';

    if(!empty($_POST))
    {
        //Acompanha os erros de validação
        $emailErro = null;
		$senhaErro = null;
		$loginErro = null;
        
        $email    = $_POST['email'];
        $senha    = $_POST['senha'];
        
        //Validaçao dos campos:
        $validacao = true;
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

		if(empty($senha))
        {
            $senhaErro = 'Por favor informe uma senha!';
            $validacao = false;
        }
        
        //Inserindo no Banco:
        if($validacao)
        {
	    	$pwd_hash = crypt($senha, '$3b$64$');
            $pdo = Banco::conectar();
		    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "SELECT idPessoa FROM pessoa where email = ? and senha = ?";
		    $q = $pdo->prepare($sql);
		    $q->execute(array($email, $pwd_hash));
		    $data = $q->fetch(PDO::FETCH_ASSOC);
		    Banco::desconectar();
		    if($data) {
				$_SESSION['usuario'] = $data['idPessoa'];
		    	header("Location: user.php");
		    } else {
				$loginErro = "Usuário ou senha inválidos!";
		    }
		}
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Login</title>
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
			        <img src="_imagens/logo.png" alt="Logo" style="max-width:30%" class="w3-circle w3-margin-top">
			      </div>

			      <form class="w3-container" action="login.php" method="POST">
			        <div class="w3-section">
			          <p><input class="w3-input" type="text" placeholder="Email" name="email"></p>
			          <p><input class="w3-input" type="password" placeholder="Senha" name="senha"></p>
					  <?php if(!empty($loginErro)): ?>
                        <span class="help-inline"><?php echo $loginErro;?></span>
                      <?php endif;?>
			      	</div>

			      	<div>
			          <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> Lembrar-me
			          <span class="w3-right w3-margin-top"><a href="#">Esqueceu a senha?</a> </span><br>
			       	</div>

			        <div class="w3-margin-top">
			    	  	<button class="w3-right w3-button w3-blue w3-hover-light-blue w3-round-xlarge" type="submit">Entrar</button>
			    	  	<a href="index.html" type="button" class="w3-margin-right w3-right w3-button w3-text-red w3-hover-red w3-round-xlarge">Cancelar</a><br>
			          	<p class="w3-right">Ainda não é cadastrado?<a href="./pessoa/cadastro.php" style="text-decoration: none;" class="w3-section w3-text-blue">    Cadastre-se </a></p>
			        </div> <br>
			          
			          
			        </div>
			      </form>
		    </div>


		</div>
	</body>
</html>
