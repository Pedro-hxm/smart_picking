<?php
// Exibe a tela de retirada de itens e registra um histórico temporário das retiradas feitas na sessão do usuário.
session_start();
$mensagem = '';
if (!isset($_SESSION['historico'])) {
    $_SESSION['historico'] = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto']) && isset($_POST['quantidade'])) {
    $produto = htmlspecialchars($_POST['produto']);
    $quantidade = intval($_POST['quantidade']);
    $mensagem = "Você retirou $quantidade unidade(s) do $produto!";
    $_SESSION['historico'][] = "$quantidade unidade(s) do $produto";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Picking - Retirar Itens</title>
    <link rel="stylesheet" type="text/css" href="../css/retirarItens.css" media="screen" />
</head>
<body>
    <div class="sidebar">
        <h1>SMART <span style="color: #87A5CB;">PICKING</span></h1>
        <h2>Menu</h2>
        <ul>
            <li><a href="DadosDaEmpresa.php">Início</a></li>
            <li><a href="CadItens.php">Cadastrar itens</a></li>
            <li><a href="RetirarItens.php">Retirar itens</a></li>
            <li><a href="VizEstoque.php">Visualizar estoque</a></li>
        </ul>
        <div class="logo-container">
            <img src="../css/img/_4f0175fe-f321-4cb1-a2e7-1e5bb5b34891-removebg-preview 2.png" alt="Logo do Avião">
        </div>
    </div>
    <div class="main-content">
        <h1>Retirar <span style="color: #87A5CB;">Itens</span></h1>
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem"><?php echo $mensagem; ?></div>
        <?php endif; ?>
        <div class="search-bar">
            <input type="text" placeholder="Pesquisa">
        </div>
        <div class="table-container">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>ID</th>
                    <th>Data de entrada</th>
                    <th>Nome do Fornecedor</th>
                    <th>Quantidade a ser retirada</th>
                </tr>
                <tr onclick="showPopup('Produto 1')">
                    <td>Produto 1</td>
                    <td>A1A1A</td>
                    <td>2023-01-01</td>
                    <td>Fornecedor A</td>
                    <td>10</td>
                </tr>
                <tr onclick="showPopup('Produto 2')">
                    <td>Produto 2</td>
                    <td>B2B2B</td>
                    <td>2023-02-02</td>
                    <td>Fornecedor B</td>
                    <td>20</td>
                </tr>
                <tr onclick="showPopup('Produto 3')">
                    <td>Produto 3</td>
                    <td>C3C3C</td>
                    <td>2023-03-03</td>
                    <td>Fornecedor C</td>
                    <td>30</td>
                </tr>
                <tr onclick="showPopup('Produto 4')">
                    <td>Produto 4</td>
                    <td>D4D4D</td>
                    <td>2023-04-04</td>
                    <td>Fornecedor D</td>
                    <td>40</td>
                </tr>
                <tr onclick="showPopup('Produto 5')">
                    <td>Produto 5</td>
                    <td>E5E5E</td>
                    <td>2023-05-05</td>
                    <td>Fornecedor E</td>
                    <td>50</td>
                </tr>
                <tr onclick="showPopup('Produto 6')">
                    <td>Produto 6</td>
                    <td>F6F6F</td>
                    <td>2023-06-06</td>
                    <td>Fornecedor F</td>
                    <td>60</td>
                </tr>
                <tr onclick="showPopup('Produto 7')">
                    <td>Produto 7</td>
                    <td>G7G7G</td>
                    <td>2023-07-07</td>
                    <td>Fornecedor G</td>
                    <td>70</td>
                </tr>
                <tr onclick="showPopup('Produto 8')">
                    <td>Produto 8</td>
                    <td>H8H8H</td>
                    <td>2023-08-08</td>
                    <td>Fornecedor H</td>
                    <td>80</td>
                </tr>
                <tr onclick="showPopup('Produto 9')">
                    <td>Produto 9</td>
                    <td>I9I9I</td>
                    <td>2023-09-09</td>
                    <td>Fornecedor I</td>
                    <td>90</td>
                </tr>
                <tr onclick="showPopup('Produto 10')">
                    <td>Produto 10</td>
                    <td>J0J0J</td>
                    <td>2023-10-10</td>
                    <td>Fornecedor J</td>
                    <td>100</td>
                </tr>
            </table>
        </div>
        <?php if (!empty($_SESSION['historico'])): ?>
            <div class="historico">
                <h3>Histórico de retiradas nesta sessão:</h3>
                <ul>
                    <?php foreach ($_SESSION['historico'] as $item): ?>
                        <li><?php echo $item; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </div>
    <div id="overlay" class="overlay" onclick="closePopup()"></div>
    <div id="popup" class="popup">
        <h2 id="popup-title">Retirar Itens</h2>
        <form id="retirar-form" method="POST" action="RetirarItens.php" onsubmit="return enviarRetirada();">
            <input type="hidden" id="produto-input" name="produto" value="">
            <input type="number" id="quantity-input" name="quantidade" placeholder="Quantidade a retirar" required>
            <button type="submit">Retirar</button>
        </form>
    </div>

    <script>
        function showPopup(produto) {
            document.getElementById('popup-title').innerText = `Retirar Itens - ${produto}`;
            document.getElementById('produto-input').value = produto;
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('popup').style.display = 'block';
        }

        function closePopup() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('popup').style.display = 'none';
        }

        function enviarRetirada() {
            closePopup();
            return true; // Permite o envio do formulário
        }
    </script>
</body>
</html>