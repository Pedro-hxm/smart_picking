<?php
$mensagem = "Bem-vindo à página de Dados da Empresa!";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Picking - Dados da Empresa</title>
    <link rel="stylesheet" type="text/css" href="../css/dadosDaEmpresa.css" media="screen" />
</head>
<body>
    <div class="sidebar">
        <h1>SMART <span style="color: #87A5CB;">PICKING</span></h1>
        <h2>Menu</h2>
        <ul>
            <li><a href="DadosDaEmpresa.php">Início</a></li>
            <li><a href="CadItens.php">Cadastrar itens</a></li>
            <li><a href="RetItens.php">Retirar itens</a></li>
            <li><a href="VizEstoque.php">Visualizar estoque</a></li>
        </ul>
        <div class="logo-container">
            <img src="../css/img/_4f0175fe-f321-4cb1-a2e7-1e5bb5b34891-removebg-preview 2.png" alt="Logo do Avião">
        </div>
    </div>
    <div class="main-content">
        <h1>Dados da <span>Empresa</span></h1>
        <p>Acesse aqui os dados da empresa, onde você pode cadastrar, retirar e visualizar.</p>

        <!-- Exibindo a mensagem dinâmica com PHP -->
        <?php if (!empty($mensagem)): ?>
            <div class="mensagem"><?php echo $mensagem; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>