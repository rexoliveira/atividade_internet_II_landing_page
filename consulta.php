<?php

include_once("conexao.php");

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : "";
$where = $_GET['palavraFiltro'] ? $_GET['palavraFiltro'] : "email";
$sql = "SELECT * FROM cliente WHERE $where LIKE '%$filtro%' ORDER BY NOME";

$consulta = mysqli_query($conexao, $sql);
$registros = mysqli_num_rows($consulta);

mysqli_close($conexao)
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />

    <script src="scripts/mascaras.js" async></script>

    <title>Consulta de Cliente</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <a href="index.php">
                    <li>Cadastro</li>
                </a>
            </ul>
        </nav>
        <section>
            <img src="image/favicon.png" alt="imagem-tecnologia" />
            <h1>Consulta de Cliente</h1>
        </section>
    </header>

    <main>

        <form id="form_filtro" action="" method="get">

            <label id="label_filtro" for="filtro">Filtrar por</label>

            <select name="palavraFiltro" id="palavra">
                <option value="">todos</option>
                <option value="email">E-mail</option>
                <option value="nome">Nome</option>
                <option value="sobrenome">Sobrenome</option>
                <option value="tel">Celular</option>
            </select>

            <input type="text" name="filtro" id="filtro" autofocus>

            <input class="botao_filtro" type="submit" value="Filtrar">
        </form>

        <?php
        if ($filtro != "") {
            print "<h5>Resultado do filtro \"$where\" contendo \"$filtro\". </h5>";
        }
        /* print "<h2>$registros resgistros encontrados.</h2>" */
        while ($exibirRegistro = mysqli_fetch_array($consulta)) {

            $id = $exibirRegistro[0];
            $nome = $exibirRegistro[1];
            $sobrenome = $exibirRegistro[2];
            $email = $exibirRegistro[3];
            $tel = $exibirRegistro[4];
            $nerd = ($exibirRegistro[5]) ? "Sim" : "Não";
            $tecn = ($exibirRegistro[6]) ? "Sim" : "Não";
            $meta = ($exibirRegistro[7]) ? "Sim" : "Não";
            $textarea = $exibirRegistro[8];

            print "<article>";
            print "<h4>Dados do Cliente </h4>";
            print "<h3>ID: $id - Nome: $nome $sobrenome</h3> ";


            print "<h3>E-mai: $email - Celular: $tel</h3>";
            print "<h4>Conteúdos preferidos </h4>";
            print "<h3>Mundo Nerd: $nerd - Tecnologias do Amanhã: $tecn - Metaverso: $meta</h3>";

            print "<h4>As linguagens que você se indentifica </h4>";
            print "<textarea
                    id='linguagem'
                    name='textarea_filtro'
                    cols='70'
                    rows='2'
                    wrap='hard'
                    disabled
                    autocorrect='off' >";
            print "$textarea";
            print "</textarea>";

            print "</article>";
        }

        /* mysqli_close($conexao) */

        ?>

    </main>

    <footer></footer>
</body>

</html>