<?php

require_once('classes/DB.php');
require_once('classes/login.php');

$validador = new login();
$validador->verificar_logado();

$db = new DB();
$produtos_artesanais = $db->getproduto_artesanais();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lojinha - Cadastro de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

         header {
            background-color: #6c63ff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        main {
            padding: 40px;
            text-align: center;
        }

        table {
            margin: 0 auto;
            width: 90%;
            max-width: 1000px;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #6c63ff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-container {
            margin-top: 30px;
        }

        a.button {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px;
            background-color: #6c63ff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #4e47d4;
        }

        footer {
            text-align: center;
            margin-top: 40px;
            color: #777;
            font-size: 0.9em;
        }

        @media (max-width: 600px) {
            table, th, td {
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }

            a.button {
                width: 100%;
                box-sizing: border-box;
            }
        }
    </style>
</head>

<body>
    
    <header>
        <h1>Vizualizar Produto</h1>
    </header>


    <main>
        <table>
            <tr>
                <th>Id</th>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Categoria</th>
            </tr>
            <?php foreach ($produtos_artesanais as $produto_artesanal): ?>
                <tr>
                    <td><?= htmlspecialchars($produto_artesanal['id']) ?></td>
                    <td><?= htmlspecialchars($produto_artesanal['nome_produto']) ?></td>
                    <td><?= number_format($produto_artesanal['preco'], 2, ',', '.') ?></td>
                    <td><?= htmlspecialchars($produto_artesanal['descricao']) ?></td>
                    <td><?= htmlspecialchars($produto_artesanal['categoria']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="btn-container">
            <a href="home.php" class="button">Voltar</a>
        </div>
    </main>
</body>

<footer>
    &copy; 2025 Lojinha Artesanal - Fatec Araras
</footer>

</html>
