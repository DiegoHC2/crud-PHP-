<?php 
        include("connection.php");
        
        
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste de Rede</title>
</head>
<body>

   <?php 
   
   if(count($_POST)>0){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $error = array();
    
            if(!empty($nome) and !empty($email)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if($error == null){
                        $sql_code = "INSERT INTO funcionarios (Nome, Email) VALUES ('$nome','$email')";
                        $vsucess = $mysqli->query($sql_code) or die();
                            echo "Cadastro efetuado com sucesso!";
                            unset($_POST);
                    }
                    
                    } else {
                       $error = "Favor inserir um email valido!";
                        echo $error;
                    }
            }else {
                $error ="Favor preencher todos os campos !";
                echo $error;
            }
   }


   $sql_table_code = "SELECT * FROM funcionarios";
   $sql_code = $mysqli->query($sql_table_code);
   $users = $sql_code->num_rows;
   
   
   
   
   
   ?>
    <form action="" method = "POST">
    
    <fieldset>
        <legend>Cadastro de Usuários </legend>
        <input type="text" name="nome" placeholder="Digite o Nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome'];?>">
        <input type="text" name="email" placeholder="Digite o Email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>">
        
        <button type="submit">Cadastrar</button>

    </fieldset>
<br><br><br>
<div>
<table class="table table-sm">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Alterar</th>
            <th scope="col">Remover</th>
            
            </tr>
        </thead>
        <tbody>
<?php if($users == 0) { ?>
    <tr>
        <td coldspan="7">Nenhum usuário cadastrado !</td>
    </tr>      
<?php  } else while($db = $sql_code->fetch_assoc()) {{?>
    <tr>
        <td><?php echo $db['ID'];?></td>
        <td><?php echo $db['Nome'];?></td>
        <td><?php echo $db['Email'];?></td>
        <td><a href="edit_users.php?id=<?php echo $db['ID']; ?>" target="_blank"><i class="fa-solid fa-pen-to-square"></i></a>
        <td><a href="remove_users.php?id=<?php echo $db['ID'];?>" id ="trash" target="_blank"><i class="fa-solid fa-trash"></i></a>
    </tr>
                    <?php }?>
         <?php }?>
            
        </tbody>
</table>
</div>
    </form>  
    <style> #trash{
        text-decoration: none;
        color: red; 
    }

     </style>
    
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>  
</body>
</html>

