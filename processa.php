<?php
include_once("conexao.php");

$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$nerd = (isset($_POST['nerd'])) ? true : false;
$tecn = (isset($_POST['tecn'])) ? true : false;
$meta = (isset($_POST['meta'])) ? true : false;
$textarea = $_POST['textarea'];

$sql = "insert into cliente (nome, sobrenome, email, tel, nerd, tecn, meta, textarea) values('$nome','$sobrenome','$email','$tel','$nerd','$tecn','$meta','$textarea')";

$salvar = mysqli_query($conexao, $sql);

$linhas = mysqli_affected_rows($conexao);

mysqli_close($conexao);
?> 


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />

    <script src="scripts/mascaras.js" async></script>

    <title>Lista de Confirmação</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <a href="index.php">
                    <li>Cadastro</li>
                </a>
                <a href="consulta.php">
                    <li>Consulta</li>
                </a>
            </ul>
        </nav>
        <section>
            <img src="image/favicon.png" alt="imagem-tecnologia" />
            <h1>Lista de Confirmação</h1>
        </section>
    </header>

    <main>
        
            <?php
            if ($linhas == 1) {
                echo "<h2>Cadastro de ". $_POST['nome'] ." efetudo com sucesso!</h2>";
            } else {
                echo "<h2>Erro: Verifique o e-mail(". $_POST['email'] .") cadastrado!</h2>";
            }
            
            ?>
        
    </main>

    <footer></footer>
</body>

</html>