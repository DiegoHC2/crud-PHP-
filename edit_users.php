<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'connection.php'?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
</head>
<body>
    <?php
    // começo validando o ID como um tipo inteiro e logo em seguida 
    // agrego código SQL a variavel para realizar uma injeção no Banco de Dados
    // e o Fetch para fazer um loop nesse Banco
    $id = intval($_GET['id']);
    $sql_modify = "SELECT * FROM funcionarios WHERE id = '$id'";
    $query_modify = $mysqli->query($sql_modify);
    $cliente = $query_modify->fetch_assoc();
    
    ?>
<form action="" method = "POST">
    <!-- Utilizo o Post para captar as informações das input.
    O uso echo no value para dar uma sensação de alteração em tempo real dos dados-->
    <fieldset>
        <legend>Alterar Usuario</legend>
        <input type="text" name="nome"  value="<?php echo $cliente['Nome']?>">
        <input type="text" name="email" value="<?php echo $cliente['Email']?>">
        
        <button type="submit">Alterar</button>
    <?php 
    // Verifico se existe alguma variavel no método POST.
    // Caso exista agrego valor a eles utilizando a memoria do POST
    if(count($_POST)>0) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $error = array();
        //Aqui faço validações de INPUTS em brancos, Email digitado corretamente e por fim
        // uma busca na variavel error para seguir com o código 
        // Caso a variavel esteja vazia significa que o código rodou de forma correta 
        // sem gerar erros na memória 
            if(!empty($nome) and !empty($email)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(empty($error) == 1){
                        $sql="UPDATE funcionarios SET
                        nome='$nome',
                        email='$email' WHERE id = '$id'";
                        $query_change =$mysqli->query($sql);
                        echo "Usuario alterado com sucesso!!!";
                    }
                    // Feedback de erros
                } else {
                    echo "Preencha o email corretamente.";
                    
                }

            } else {
                echo "    Preencha todos os campos.";
                
                
            }
    }
    ?>
    </fieldset>
    
</form>
    
</body>
</html>