<?php

require_once('classes/DB.php');
require_once('classes/login.php');

$validador=new login();
$validador->verificar_logado();

$db=new DB();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura e mostra os dados
    $nome = htmlspecialchars($_POST['nome_produto']);
    $preco = floatval($_POST['preco']);
    $descricao = htmlspecialchars($_POST['descricao']);
    $categoria = htmlspecialchars($_POST['categoria']);

    if ($nome &&  $descricao && $categoria) {
        $db->getcadastroProduto($nome, $preco, $descricao, $categoria);
        $mensagem = "Produto cadastrado com sucesso!";
    } else {
        $mensagem = "Por favor, preencha todos os campos.";

    }
    
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .form-container {
            background: #fff;
            padding: 30px;
            max-width: 400px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="number"],
         .mensagem {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-top: 20px;
        }

        .button-link {
            display: inline-block;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            width: 100%;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .button-link:hover {
            background-color: #6c63ff;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Cadastro de Produto</h2>
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem"><?= htmlspecialchars($mensagem) ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="nome_produto">Nome do Produto</label>
            <input type="text" id="nome_produto" name="nome_produto" required>

            <label for="preco">Preço</label>
            <input type="number" id="preco" name="preco" step="0.01" required>

            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" required>

            <label for="categoria">Categoria</label>
            <input type="text" id="categoria" name="categoria" required>

            <button type="submit">Cadastrar Produto</button>
            <a href="home.php" class="button-link">Voltar</a>
        </form>
    </div>



    <footer>
        &copy; 2025 Lojinha Artesanal - Fatec Araras
    </footer>


</html>