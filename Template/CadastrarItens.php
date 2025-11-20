<?php
// Esta página permite cadastrar novos itens no estoque.
session_start();
$mensagem = '';
if (!isset($_SESSION['itens'])) {
    $_SESSION['itens'] = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nome']) && isset($_POST['id']) && isset($_POST['data']) && isset($_POST['fornecedor']) && isset($_POST['quantidade'])) {
    $nome = htmlspecialchars($_POST['nome']);
    $id = htmlspecialchars($_POST['id']);
    $data = htmlspecialchars($_POST['data']);
    $fornecedor = htmlspecialchars($_POST['fornecedor']);
    $quantidade = intval($_POST['quantidade']);
    $_SESSION['itens'][] = [
        'nome' => $nome,
        'id' => $id,
        'data' => $data,
        'fornecedor' => $fornecedor,
        'quantidade' => $quantidade
    ];
    $mensagem = "Item cadastrado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Picking - Cadastrar Itens</title>
    <link rel="stylesheet" type="text/css" href="../css/cadastrarItens.css" media="screen" />
</head>
<body>
    <div class="sidebar">
        <h1>SMART <span style="color: #87A5CB;">PICKING</span></h1>
        <h2>Menu</h2>
        <ul>
            <li><a href="DadosDaEmpresa.php">Início</a></li>
            <li><a href="CadastrarItens.php">Cadastrar itens</a></li>
            <li><a href="RetirarItens.php">Retirar itens</a></li>
            <li><a href="VisualizarEstoque.php">Visualizar estoque</a></li>
        </ul>
        <div class="logo-container">
            <img src="../css/img/_4f0175fe-f321-4cb1-a2e7-1e5bb5b34891-removebg-preview 2.png" alt="Logo do Avião">
        </div>
    </div>
    <div class="main-content">
        <h1>Cadastrar <span style="color: #87A5CB;">Itens</span></h1>
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem"><?php echo $mensagem; ?></div>
        <?php endif; ?>
        <form method="POST" action="CadastrarItens.php" class="cadastro-form">
            <input type="text" name="nome" placeholder="Nome do produto" required>
            <input type="text" name="id" placeholder="ID" required>
            <input type="date" name="data" placeholder="Data de entrada" required>
            <input type="text" name="fornecedor" placeholder="Nome do Fornecedor" required>
            <input type="number" name="quantidade" placeholder="Quantidade" required>
            <button type="submit">Cadastrar</button>
        </form>
        <div class="table-container">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>ID</th>
                    <th>Data de entrada</th>
                    <th>Nome do Fornecedor</th>
                    <th>Quantidade</th>
                </tr>
                <?php if (!empty($_SESSION['itens'])): ?>
                    <?php foreach ($_SESSION['itens'] as $item): ?>
                        <tr>
                            <td><?php echo $item['nome']; ?></td>
                            <td><?php echo $item['id']; ?></td>
                            <td><?php echo $item['data']; ?></td>
                            <td><?php echo $item['fornecedor']; ?></td>
                            <td><?php echo $item['quantidade']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <!-- Exemplo de itens fixos caso não tenha nenhum cadastrado -->
                    <tr>
                        <td>Produto 1</td>
                        <td>A1A1A</td>
                        <td>2023-01-01</td>
                        <td>Fornecedor A</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Produto 2</td>
                        <td>B2B2B</td>
                        <td>2023-02-02</td>
                        <td>Fornecedor B</td>
                        <td>20</td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>
    </div>
</body>
</html>