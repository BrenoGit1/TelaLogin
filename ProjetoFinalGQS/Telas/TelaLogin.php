<?php

    include ('../conexoes/conexaoLogin.php');

    if(isset($_POST['emial']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Preencha seu e-mail";
        } else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha"; 
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT * FROM conexaologin WHERE email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;
            
            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['email'] = $usuario['email'];

                header("Location: TelaGerenciamentoClietes.php");
                
            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
</head>
<body>
    <h1>Acesse seu email</h1>
    <form action="" method="POST">
        <p>
            <label>Email</label>
            <input type="email" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
        <p>
    </form>
    <p>
        Esuqueceu a senha? <a href="../Telas/TelaEsqueceuSenha.php">Clique aqui.</a>
    </p>
</body>
</html>