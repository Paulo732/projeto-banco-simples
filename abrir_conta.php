<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Abrir Conta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color:white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card{
            border-radius:15px;
            width: 100%;
            max-width: 500px;
        }
    </style>
</head>
<body>

<div class="card p-4 shadow-lg bg-dark">
    <h2 class="text-center mb-4 text-white">Abrir Nova Conta</h2>
    
    <?php if(isset($mensagem) && $mensagem): ?>
    <div class="alert <?= strpos($mensagem, 'sucesso') !== false ? 'alert-success' : 'alert-warning' ?>">
        <?= $mensagem ?>
    </div>
    <?php endif; ?>
    
    <form action="index.php" method="POST">
        <div class="mb-3">
            <label class="form-label">Nome do Cliente</label>
            <input type="text" name="dono" class="form-control" placeholder="Nome do Cliente" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Número da Conta</label>
            <input type="number" name="numero" class="form-control" placeholder="Número da Conta" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tipo de Conta</label>
            <select name="tipo" class="form-select">
                <option value="CC">Conta Corrente</option>
                <option value="CP">Conta Poupança</option>
            </select>
        </div>
        <button name="abrir" class="btn btn-success w-100 mb-2">Confirmar Abertura</button>
    </form>
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