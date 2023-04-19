<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once 'connection.php'?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remoção</title>
</head>
<body>
<br><br>
<?php 
$id = intval($_GET['id']);
$sql_code_bring = "SELECT * FROM funcionarios WHERE id = '$id'";
$query_mysqli = $mysqli->query($sql_code_bring);
$funcionario = $query_mysqli->fetch_assoc();
$confirmar = array();
    if(isset($_POST['confirmar'])){
        $sql_code = "DELETE FROM funcionarios WHERE id= '$id'";
        $query_remove = $mysqli->query($sql_code);
            if($query_remove){ ?>
            <button type="button" class="btn btn-success btn-lg">Cliente Deletado</button>
            <br><br>
            <a href = "index.php">Clique aqui para voltar</a>
            
            
            
        <?php  die();  }
    } ?>

<form action="" method="POST">
<h2>Remover o usuário, <?php echo $funcionario['Nome']; ?>?</h2> <br> <br>
<button type="submit" name="confirmar" value = "1" class="btn btn-danger">REMOVER</button>
<button type="button" onclick="location.href='index.php'" class="btn btn-secondary">VOLTAR</button>
</form>
</body>
</html>