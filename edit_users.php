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
    $id = intval($_GET['id']);
    $sql_modify = "SELECT * FROM funcionarios WHERE id = '$id'";
    $query_modify = $mysqli->query($sql_modify);
    $cliente = $query_modify->fetch_assoc();
    
    ?>
<form action="" method = "POST">
    <fieldset>
        <legend>Alterar Usuario</legend>
        <input type="text" name="nome"  value="<?php echo $cliente['Nome']?>">
        <input type="text" name="email" value="<?php echo $cliente['Email']?>">
        
        <button type="submit">Alterar</button>
    <?php 
    if(count($_POST)>0) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $error = array();
        
            if(!empty($nome) and !empty($email)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(empty($error) == 1){
                        $sql="UPDATE funcionarios SET
                        nome='$nome',
                        email='$email' WHERE id = '$id'";
                        $query_change =$mysqli->query($sql);
                        echo "Usuario alterado com sucesso!!!";
                    }

                } else {
                    echo "Preencha o email corretamente.";
                }

            } else {
                echo "    Preencha todos os campos.";
                $error = 1;
                
            }
    }
    ?>
    </fieldset>
    
</form>
    
</body>
</html>