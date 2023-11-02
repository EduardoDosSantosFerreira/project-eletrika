<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Calculadora de Conta de Energia Elétrica</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Calculadora de Conta de Energia Elétrica</h1>
    
    <form action="" method="POST">
        Classe Consumidora:
        <select name="classe">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
        </select><br>
        Consumo em KWh: <input type="number" name="consumo"><br>
        <input type="submit" value="Calcular">
    </form>
    
    <?php
    // Verifica se foram enviados os valores
    if (isset($_POST['classe']) && isset($_POST['consumo'])) {
        // Obtém os valores 
        $classe = $_POST['classe'];
        $consumo = floatval($_POST['consumo']);
        
        // Tabela de tarifas por classe
        $tarifas = [
            'A' => 0.70,
            'B' => 0.40,
            'C' => 0.30
        ];
        
        // Calcula o Valor do Fornecimento (VF)
        $tarifa = $tarifas[$classe];
        $valorFornecimento = $consumo * $tarifa;
        
        // Calcula o Valor a Pagar (VP) incluindo ICMS
        $icms = 0.3 * $valorFornecimento;
        $valorPagar = $valorFornecimento + $icms;
        
        // Exibe os resultados
        echo "<p>Classe Consumidora: $classe</p>";
        echo "<p>Consumo: $consumo KWh</p>";
        echo "<p>Valor do Fornecimento: R$ " . number_format($valorFornecimento, 2, ',', '.') . "</p>";
        echo "<p>ICMS (30%): R$ " . number_format($icms, 2, ',', '.') . "</p>";
        echo "<p>Valor a Pagar: R$ " . number_format($valorPagar, 2, ',', '.') . "</p>";
    }
    ?>
</body>
</html>
