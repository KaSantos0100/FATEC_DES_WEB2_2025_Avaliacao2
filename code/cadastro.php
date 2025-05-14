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
    <title>Lojinha - Cadastro de Produtos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
        }

         header {
            background-color: #6c63ff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .form-container {
            max-width: 500px;
            margin: 50px auto;
            background-color: white;
            border-radius: 12px;
            padding: 30px 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #444;
            text-align: left;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #6c63ff;
            outline: none;
        }

        .btn-group {
            text-align: center;
        }

        button,
        .btn-secondary {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        button {
            background-color: #6c63ff;
            color: white;
        }

        button:hover {
            background-color: #4e47d4;
        }

        .btn-secondary {
            background-color: #e0e0e0;
            color: #333;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #cacaca;
        }

        .mensagem {
            text-align: center;
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            padding: 20px 0;
            color: #777;
            font-size: 0.9em;
        }

        @media (max-width: 600px) {
            .form-container {
                margin: 20px;
                padding: 20px;
            }

            button,
            .btn-secondary {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Cadastro de Produto</h1>
    </header>

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

            <div class="btn-group">
                <button type="submit"> Cadastrar</button>
                <a href="home.php" class="btn-secondary">Voltar</a>
            </div> 
            
        </form>
    </div>



    <footer>
        &copy; 2025 Lojinha Artesanal - Fatec Araras
    </footer>


</html>