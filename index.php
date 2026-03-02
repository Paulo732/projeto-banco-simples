<?php
require_once 'contabanco.php';
session_start();               

if (!isset($_SESSION['conta']) || !$_SESSION['conta'] instanceof ContaBanco) {
    $_SESSION['conta'] = new ContaBanco();
}

$conta = $_SESSION['conta'];
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['abrir'])) {
        $conta = new ContaBanco();
        $conta->setDono($_POST['dono']);
        $conta->setNumConta($_POST['numero']);
        $mensagem = $conta->abrirConta($_POST['tipo']);
    }

    if (isset($_POST['depositar'])) {
        $mensagem = $conta->depositar($_POST['valor']);
    }
   
    if (isset($_POST['sacar'])) {
        $mensagem = $conta->sacar($_POST['valor']);
    }

    if (isset($_POST['mensal'])) {
        $mensagem = $conta->pagarMensal();
    }
  
    if (isset($_POST['fechar'])) {
        $mensagem = $conta->fecharConta();
    }

    $_SESSION['conta'] = $conta;
}

if (!$conta->getStatus()) {
    require 'abrir_conta.php';
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Banco Digital</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
    color:white;
}
.card{
    border-radius:15px;
}
</style>
</head>

<body>

<div class="container mt-5">

<div class="card p-4 shadow-lg bg-dark">

<h2 class="text-center mb-4 text-white">Banco Digital</h2>

<?php if($mensagem): ?>
<div class="alert <?= strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-warning' ?>">
    <?= $mensagem ?>
</div>
<?php endif; ?>

<form method="POST">

<div class="row mb-3">
    <div class="col">
        <input type="number" step="0.01" name="valor" class="form-control" placeholder="Valor">
    </div>

    <div class="col">
        <button name="depositar" 
            class="btn btn-primary w-100"
            <?= !$conta->getStatus() ? 'disabled' : '' ?>>
            Depositar
        </button>
    </div>

    <div class="col">
        <button name="sacar" 
            class="btn btn-warning w-100"
            <?= !$conta->getStatus() ? 'disabled' : '' ?>>
            Sacar
        </button>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <button name="mensal" class="btn btn-info w-100">Pagar Mensalidade</button>
    </div>
    <div class="col">
        <button name="fechar" class="btn btn-danger w-100">Fechar Conta</button>
    </div>
</div>

</form>

<hr>

<h2 class="text-center mb-4 text-white">Dados Da Conta</h2>

<ul class="list-group">
    <li class="list-group-item">Cliente: <?= $conta->getDono(); ?></li>
    <li class="list-group-item">Número: <?= $conta->getNumConta(); ?></li>
    <li class="list-group-item">Tipo: <?= $conta->getTipo(); ?></li>
    <li class="list-group-item">Saldo: R$ <?= $conta->getSaldo(); ?></li>
    <li class="list-group-item">Status: <?= $conta->getStatus() ? "Ativa" : "Fechada"; ?></li>
</ul>

</div>
</div>

<script>
    setTimeout(function() {
        var alert = document.querySelector('.alert');
        if (alert) {
            alert.style.transition = "opacity 1s";
            alert.style.opacity = "0";
            setTimeout(function() { alert.remove(); }, 1000);
        }
    }, 3000); 
</script>

</body>
</html>