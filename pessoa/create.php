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
        <meta charset="utf-8">
        <link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class="container">
            <div clas="span10 offset1">
                <div class="row">
                    <h3 class="well"> Adicionar Pessoa </h3>
                    <form class="form-horizontal" action="create.php" method="post">
                        
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
                        
                        <div class="control-group <?php echo !empty($senhaErro)?'error ': '';?>">
                            <label class="control-label" >Senha</label>
                            <div class="controls">
                                <input size="20" name="senha" type="password" placeholder="Senha" required="" value="<?php echo !empty($senha)?$senha: '';?>">
                                <?php if(!empty($senhaErro)): ?>
                                <span class="help-inline"><?php echo $senhaErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="control-group <?php echo !empty($csenhaErro)?'error ': '';?>">
                            <label class="control-label" >Confirmar Senha</label>
                            <div class="controls">
                                <input size="20" name="csenha" type="password" placeholder="Confirmar Senha" required="" value="<?php echo !empty($csenha)?$csenha: '';?>">
                                <?php if(!empty($csenhaErro)): ?>
                                <span class="help-inline"><?php echo $csenhaErro;?></span>
                                <?php endif;?>
                            </div>
                        </div>
                        <div class="form-actions">
                            <br/>
                
                            <button type="submit" class="btn btn-success">Adicionar</button>
                            <a href="index.php" type="btn" class="btn btn-default">Voltar</a>
                        
                        </div>
                    </form>
                </div>
        </div>
    </body>
</html>
