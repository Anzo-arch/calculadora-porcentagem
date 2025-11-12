<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Porcentagem</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 900px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 10px;
        }
        
        .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
        }
        
        .tab-buttons {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 2px solid #dee2e6;
            flex-wrap: wrap;
        }
        
        .tab-button {
            padding: 12px 20px;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: #666;
            transition: all 0.3s;
            white-space: nowrap;
        }
        
        .tab-button.active {
            color: #007bff;
            border-bottom: 3px solid #007bff;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        
        input, select, button {
            padding: 12px;
            margin: 5px 0;
            width: 100%;
            box-sizing: border-box;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        
        input:focus, select:focus {
            outline: none;
            border-color: #007bff;
        }
        
        button {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: transform 0.2s;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,123,255,0.3);
        }
        
        .btn-secondary {
            background: linear-gradient(135deg, #6c757d, #545b62);
        }
        
        .result {
            background: #f8f9fa;
            padding: 25px;
            margin-top: 25px;
            border-radius: 10px;
            border-left: 5px solid #28a745;
        }
        
        .result-display {
            text-align: center;
            font-size: 24px;
            margin: 20px 0;
            padding: 20px;
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            border-radius: 10px;
            font-weight: bold;
        }
        
        .result-number {
            font-size: 36px;
            color: #155724;
            margin: 15px 0;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin: 20px 0;
        }
        
        .detail-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .detail-name {
            font-weight: bold;
            color: #555;
            font-size: 14px;
            margin-bottom: 5px;
        }
        
        .detail-value {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }
        
        .money-value {
            color: #28a745;
        }
        
        .negative-value {
            color: #dc3545;
        }
        
        .positive-value {
            color: #28a745;
        }
        
        .calculation-steps {
            background: #fff3cd;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            font-family: 'Courier New', monospace;
            font-size: 14px;
        }
        
        .error {
            background: #f8d7da;
            padding: 15px;
            margin-top: 20px;
            border-radius: 8px;
            border-left: 5px solid #dc3545;
            color: #721c24;
        }
        
        .info-box {
            background: #d1ecf1;
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            border-left: 4px solid #17a2b8;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
        }
        
        .button-group button {
            flex: 1;
        }
        
        .examples {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
            margin-top: 15px;
        }
        
        .example-card {
            background: #e9ecef;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 12px;
        }
        
        .example-card:hover {
            background: #dee2e6;
        }
        
        .comparison {
            background: #e9ecef;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Calculadora de Porcentagem</h1>
        <div class="subtitle">Calcule porcentagens, reajustes, descontos e muito mais</div>
        
        <div class="tab-buttons">
            <button class="tab-button active" onclick="openTab('calcular')">🧮 Calcular %</button>
            <button class="tab-button" onclick="openTab('aumento')">📈 Aumento</button>
            <button class="tab-button" onclick="openTab('desconto')">📉 Desconto</button>
            <button class="tab-button" onclick="openTab('variacao')">🔄 Variação %</button>
            <button class="tab-button" onclick="openTab('regratres')">🔢 Regra de 3</button>
        </div>
        
        <!-- ABA CALCULAR PORCENTAGEM -->
        <div id="calcular" class="tab-content active">
            <form method="post" action="">
                <input type="hidden" name="tipo" value="calcular">
                
                <div class="info-box">
                    <strong>🧮 Calcular Porcentagem:</strong><br>
                    Descubra quanto é X% de um valor<br>
                    <em>Fórmula: Valor × (Porcentagem ÷ 100)</em>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="valor_base">💰 Valor Base:</label>
                        <input type="number" id="valor_base" name="valor_base" step="0.01" min="0" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'calcular' && isset($_POST['valor_base']) ? htmlspecialchars($_POST['valor_base']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="porcentagem_calc">📊 Porcentagem (%):</label>
                        <input type="number" id="porcentagem_calc" name="porcentagem" step="0.01" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'calcular' && isset($_POST['porcentagem']) ? htmlspecialchars($_POST['porcentagem']) : ''; ?>">
                    </div>
                </div>
                
                <div class="examples">
                    <div class="example-card" onclick="preencherCalculo(100, 10)">10% de R$ 100</div>
                    <div class="example-card" onclick="preencherCalculo(250, 15)">15% de R$ 250</div>
                    <div class="example-card" onclick="preencherCalculo(1000, 5)">5% de R$ 1.000</div>
                    <div class="example-card" onclick="preencherCalculo(500, 20)">20% de R$ 500</div>
                </div>
                
                <button type="submit">🧮 Calcular</button>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tipo']) && $_POST['tipo'] === 'calcular') {
                calcularPorcentagem();
            }
            ?>
        </div>
        
        <!-- ABA AUMENTO -->
        <div id="aumento" class="tab-content">
            <form method="post" action="">
                <input type="hidden" name="tipo" value="aumento">
                
                <div class="info-box">
                    <strong>📈 Calcular Aumento:</strong><br>
                    Adicione uma porcentagem a um valor<br>
                    <em>Fórmula: Valor + (Valor × Porcentagem ÷ 100)</em>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="valor_base_aumento">💰 Valor Original:</label>
                        <input type="number" id="valor_base_aumento" name="valor_base" step="0.01" min="0" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'aumento' && isset($_POST['valor_base']) ? htmlspecialchars($_POST['valor_base']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="porcentagem_aumento">📈 Porcentagem de Aumento (%):</label>
                        <input type="number" id="porcentagem_aumento" name="porcentagem" step="0.01" min="0" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'aumento' && isset($_POST['porcentagem']) ? htmlspecialchars($_POST['porcentagem']) : ''; ?>">
                    </div>
                </div>
                
                <div class="examples">
                    <div class="example-card" onclick="preencherAumento(100, 10)">Aumentar 10% de R$ 100</div>
                    <div class="example-card" onclick="preencherAumento(50, 20)">Aumentar 20% de R$ 50</div>
                    <div class="example-card" onclick="preencherAumento(200, 15)">Aumentar 15% de R$ 200</div>
                    <div class="example-card" onclick="preencherAumento(1000, 5)">Aumentar 5% de R$ 1.000</div>
                </div>
                
                <button type="submit">📈 Calcular Aumento</button>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tipo']) && $_POST['tipo'] === 'aumento') {
                calcularAumento();
            }
            ?>
        </div>
        
        <!-- ABA DESCONTO -->
        <div id="desconto" class="tab-content">
            <form method="post" action="">
                <input type="hidden" name="tipo" value="desconto">
                
                <div class="info-box">
                    <strong>📉 Calcular Desconto:</strong><br>
                    Subtraia uma porcentagem de um valor<br>
                    <em>Fórmula: Valor - (Valor × Porcentagem ÷ 100)</em>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="valor_base_desconto">💰 Valor Original:</label>
                        <input type="number" id="valor_base_desconto" name="valor_base" step="0.01" min="0" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'desconto' && isset($_POST['valor_base']) ? htmlspecialchars($_POST['valor_base']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="porcentagem_desconto">📉 Porcentagem de Desconto (%):</label>
                        <input type="number" id="porcentagem_desconto" name="porcentagem" step="0.01" min="0" max="100" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'desconto' && isset($_POST['porcentagem']) ? htmlspecialchars($_POST['porcentagem']) : ''; ?>">
                    </div>
                </div>
                
                <div class="examples">
                    <div class="example-card" onclick="preencherDesconto(100, 10)">10% de desconto em R$ 100</div>
                    <div class="example-card" onclick="preencherDesconto(200, 15)">15% de desconto em R$ 200</div>
                    <div class="example-card" onclick="preencherDesconto(500, 20)">20% de desconto em R$ 500</div>
                    <div class="example-card" onclick="preencherDesconto(1000, 5)">5% de desconto em R$ 1.000</div>
                </div>
                
                <button type="submit">📉 Calcular Desconto</button>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tipo']) && $_POST['tipo'] === 'desconto') {
                calcularDesconto();
            }
            ?>
        </div>
        
        <!-- ABA VARIAÇÃO PERCENTUAL -->
        <div id="variacao" class="tab-content">
            <form method="post" action="">
                <input type="hidden" name="tipo" value="variacao">
                
                <div class="info-box">
                    <strong>🔄 Calcular Variação Percentual:</strong><br>
                    Descubra a variação % entre dois valores<br>
                    <em>Fórmula: ((Novo - Antigo) ÷ Antigo) × 100</em>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="valor_antigo">💰 Valor Antigo:</label>
                        <input type="number" id="valor_antigo" name="valor_antigo" step="0.01" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'variacao' && isset($_POST['valor_antigo']) ? htmlspecialchars($_POST['valor_antigo']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="valor_novo">💰 Valor Novo:</label>
                        <input type="number" id="valor_novo" name="valor_novo" step="0.01" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'variacao' && isset($_POST['valor_novo']) ? htmlspecialchars($_POST['valor_novo']) : ''; ?>">
                    </div>
                </div>
                
                <div class="examples">
                    <div class="example-card" onclick="preencherVariacao(100, 120)">De R$ 100 para R$ 120</div>
                    <div class="example-card" onclick="preencherVariacao(200, 150)">De R$ 200 para R$ 150</div>
                    <div class="example-card" onclick="preencherVariacao(50, 75)">De R$ 50 para R$ 75</div>
                    <div class="example-card" onclick="preencherVariacao(1000, 800)">De R$ 1.000 para R$ 800</div>
                </div>
                
                <button type="submit">🔄 Calcular Variação</button>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tipo']) && $_POST['tipo'] === 'variacao') {
                calcularVariacao();
            }
            ?>
        </div>
        
        <!-- ABA REGRA DE TRÊS -->
        <div id="regratres" class="tab-content">
            <form method="post" action="">
                <input type="hidden" name="tipo" value="regratres">
                
                <div class="info-box">
                    <strong>🔢 Regra de Três:</strong><br>
                    Se A está para B, então C está para X<br>
                    <em>Fórmula: X = (B × C) ÷ A</em>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label for="valor_a">🔢 Valor A:</label>
                        <input type="number" id="valor_a" name="valor_a" step="0.01" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'regratres' && isset($_POST['valor_a']) ? htmlspecialchars($_POST['valor_a']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="valor_b">🔢 Valor B:</label>
                        <input type="number" id="valor_b" name="valor_b" step="0.01" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'regratres' && isset($_POST['valor_b']) ? htmlspecialchars($_POST['valor_b']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="valor_c">🔢 Valor C:</label>
                        <input type="number" id="valor_c" name="valor_c" step="0.01" required
                               value="<?php echo isset($_POST['tipo']) && $_POST['tipo'] === 'regratres' && isset($_POST['valor_c']) ? htmlspecialchars($_POST['valor_c']) : ''; ?>">
                    </div>
                </div>
                
                <div class="examples">
                    <div class="example-card" onclick="preencherRegraTres(2, 10, 5)">Se 2→10, então 5→?</div>
                    <div class="example-card" onclick="preencherRegraTres(5, 20, 10)">Se 5→20, então 10→?</div>
                    <div class="example-card" onclick="preencherRegraTres(3, 15, 6)">Se 3→15, então 6→?</div>
                    <div class="example-card" onclick="preencherRegraTres(4, 100, 8)">Se 4→100, então 8→?</div>
                </div>
                
                <button type="submit">🔢 Calcular Regra de Três</button>
            </form>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['tipo']) && $_POST['tipo'] === 'regratres') {
                calcularRegraTres();
            }
            ?>
        </div>
        
        <div style="margin-top: 30px; padding: 15px; background: #e9ecef; border-radius: 8px; font-size: 12px; text-align: center;">
            <strong>💡 Fórmulas Utilizadas:</strong><br>
            • <strong>Calcular %</strong>: Valor × (Porcentagem ÷ 100)<br>
            • <strong>Aumento</strong>: Valor + (Valor × Porcentagem ÷ 100)<br>
            • <strong>Desconto</strong>: Valor - (Valor × Porcentagem ÷ 100)<br>
            • <strong>Variação %</strong>: ((Novo - Antigo) ÷ Antigo) × 100<br>
            • <strong>Regra de 3</strong>: X = (B × C) ÷ A
        </div>
    </div>

    <?php
    // FUNÇÃO PARA FORMATAR MOEDA
    function formatarMoeda($valor) {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
    
    // FUNÇÃO PARA CALCULAR PORCENTAGEM SIMPLES
    function calcularPorcentagem() {
        if (!isset($_POST['valor_base']) || !isset($_POST['porcentagem'])) {
            echo "<div class='error'>❌ Preencha todos os campos!</div>";
            return;
        }
        
        $valor_base = (float)$_POST['valor_base'];
        $porcentagem = (float)$_POST['porcentagem'];
        
        $resultado = $valor_base * ($porcentagem / 100);
        $valor_final = $valor_base;
        
        exibirResultadoPorcentagem($valor_base, $porcentagem, $resultado, $valor_final, "Cálculo de Porcentagem");
    }
    
    // FUNÇÃO PARA CALCULAR AUMENTO
    function calcularAumento() {
        if (!isset($_POST['valor_base']) || !isset($_POST['porcentagem'])) {
            echo "<div class='error'>❌ Preencha todos os campos!</div>";
            return;
        }
        
        $valor_base = (float)$_POST['valor_base'];
        $porcentagem = (float)$_POST['porcentagem'];
        
        $aumento = $valor_base * ($porcentagem / 100);
        $valor_final = $valor_base + $aumento;
        
        exibirResultadoPorcentagem($valor_base, $porcentagem, $aumento, $valor_final, "Cálculo de Aumento");
    }
    
    // FUNÇÃO PARA CALCULAR DESCONTO
    function calcularDesconto() {
        if (!isset($_POST['valor_base']) || !isset($_POST['porcentagem'])) {
            echo "<div class='error'>❌ Preencha todos os campos!</div>";
            return;
        }
        
        $valor_base = (float)$_POST['valor_base'];
        $porcentagem = (float)$_POST['porcentagem'];
        
        $desconto = $valor_base * ($porcentagem / 100);
        $valor_final = $valor_base - $desconto;
        
        exibirResultadoPorcentagem($valor_base, $porcentagem, $desconto, $valor_final, "Cálculo de Desconto");
    }
    
    // FUNÇÃO PARA CALCULAR VARIAÇÃO PERCENTUAL
    function calcularVariacao() {
        if (!isset($_POST['valor_antigo']) || !isset($_POST['valor_novo'])) {
            echo "<div class='error'>❌ Preencha todos os campos!</div>";
            return;
        }
        
        $valor_antigo = (float)$_POST['valor_antigo'];
        $valor_novo = (float)$_POST['valor_novo'];
        
        if ($valor_antigo == 0) {
            echo "<div class='error'>❌ O valor antigo não pode ser zero!</div>";
            return;
        }
        
        $variacao = (($valor_novo - $valor_antigo) / $valor_antigo) * 100;
        $diferenca = $valor_novo - $valor_antigo;
        
        exibirResultadoVariacao($valor_antigo, $valor_novo, $variacao, $diferenca);
    }
    
    // FUNÇÃO PARA CALCULAR REGRA DE TRÊS
    function calcularRegraTres() {
        if (!isset($_POST['valor_a']) || !isset($_POST['valor_b']) || !isset($_POST['valor_c'])) {
            echo "<div class='error'>❌ Preencha todos os campos!</div>";
            return;
        }
        
        $valor_a = (float)$_POST['valor_a'];
        $valor_b = (float)$_POST['valor_b'];
        $valor_c = (float)$_POST['valor_c'];
        
        if ($valor_a == 0) {
            echo "<div class='error'>❌ O valor A não pode ser zero!</div>";
            return;
        }
        
        $valor_x = ($valor_b * $valor_c) / $valor_a;
        
        exibirResultadoRegraTres($valor_a, $valor_b, $valor_c, $valor_x);
    }
    
    // FUNÇÃO PARA EXIBIR RESULTADO DE PORCENTAGEM
    function exibirResultadoPorcentagem($valor_base, $porcentagem, $resultado_calc, $valor_final, $titulo) {
        echo "<div class='result'>";
        
        echo "<div class='result-display'>";
        echo "<div>{$titulo}:</div>";
        echo "<div class='result-number'>" . formatarMoeda($valor_final) . "</div>";
        echo "</div>";
        
        echo "<div class='details-grid'>";
        
        $detalhes = [
            '💰 Valor Base' => formatarMoeda($valor_base),
            '📊 Porcentagem' => $porcentagem . '%',
            '🎯 Resultado do Cálculo' => formatarMoeda($resultado_calc),
            '💵 Valor Final' => formatarMoeda($valor_final)
        ];
        
        foreach ($detalhes as $nome => $valor) {
            echo "<div class='detail-card'>";
            echo "<div class='detail-name'>$nome</div>";
            echo "<div class='detail-value'>$valor</div>";
            echo "</div>";
        }
        echo "</div>";
        
        echo "<div class='calculation-steps'>";
        echo "<strong>🔍 Cálculo passo a passo:</strong><br>";
        echo "1. " . formatarMoeda($valor_base) . " × ({$porcentagem} ÷ 100)<br>";
        echo "2. " . formatarMoeda($valor_base) . " × " . ($porcentagem / 100) . "<br>";
        echo "3. = " . formatarMoeda($resultado_calc) . "<br>";
        if ($titulo !== "Cálculo de Porcentagem") {
            $operacao = ($titulo === "Cálculo de Aumento") ? "+" : "-";
            echo "4. " . formatarMoeda($valor_base) . " {$operacao} " . formatarMoeda($resultado_calc) . " = " . formatarMoeda($valor_final);
        }
        echo "</div>";
        
        echo "</div>";
    }
    
    // FUNÇÃO PARA EXIBIR RESULTADO DE VARIAÇÃO
    function exibirResultadoVariacao($valor_antigo, $valor_novo, $variacao, $diferenca) {
        $classe_variacao = ($variacao >= 0) ? 'positive-value' : 'negative-value';
        $sinal = ($variacao >= 0) ? '+' : '';
        $tipo = ($variacao >= 0) ? 'aumento' : 'redução';
        
        echo "<div class='result'>";
        
        echo "<div class='result-display'>";
        echo "<div>Variação Percentual:</div>";
        echo "<div class='result-number {$classe_variacao}'>{$sinal}" . number_format($variacao, 2, ',', '.') . "%</div>";
        echo "</div>";
        
        echo "<div class='details-grid'>";
        
        $detalhes = [
            '💰 Valor Antigo' => formatarMoeda($valor_antigo),
            '💰 Valor Novo' => formatarMoeda($valor_novo),
            '📈 Diferença' => formatarMoeda($diferenca),
            '🎯 Tipo de Variação' => ucfirst($tipo)
        ];
        
        foreach ($detalhes as $nome => $valor) {
            echo "<div class='detail-card'>";
            echo "<div class='detail-name'>$nome</div>";
            echo "<div class='detail-value {$classe_variacao}'>$valor</div>";
            echo "</div>";
        }
        echo "</div>";
        
        echo "<div class='calculation-steps'>";
        echo "<strong>🔍 Cálculo passo a passo:</strong><br>";
        echo "1. (" . formatarMoeda($valor_novo) . " - " . formatarMoeda($valor_antigo) . ") ÷ " . formatarMoeda($valor_antigo) . "<br>";
        echo "2. " . formatarMoeda($diferenca) . " ÷ " . formatarMoeda($valor_antigo) . "<br>";
        echo "3. = " . number_format($diferenca / $valor_antigo, 4, ',', '.') . "<br>";
        echo "4. × 100 = {$sinal}" . number_format($variacao, 2, ',', '.') . "%";
        echo "</div>";
        
        echo "</div>";
    }
    
    // FUNÇÃO PARA EXIBIR RESULTADO DE REGRA DE TRÊS
    function exibirResultadoRegraTres($valor_a, $valor_b, $valor_c, $valor_x) {
        echo "<div class='result'>";
        
        echo "<div class='result-display'>";
        echo "<div>Resultado da Regra de Três:</div>";
        echo "<div class='result-number'>X = " . number_format($valor_x, 2, ',', '.') . "</div>";
        echo "</div>";
        
        echo "<div class='comparison'>";
        echo "<strong>📐 Proporção:</strong><br>";
        echo "Se <strong>{$valor_a}</strong> está para <strong>{$valor_b}</strong><br>";
        echo "Então <strong>{$valor_c}</strong> está para <strong>" . number_format($valor_x, 2, ',', '.') . "</strong>";
        echo "</div>";
        
        echo "<div class='details-grid'>";
        
        $detalhes = [
            '🔢 Valor A' => $valor_a,
            '🔢 Valor B' => $valor_b,
            '🔢 Valor C' => $valor_c,
            '🎯 Valor X' => number_format($valor_x, 2, ',', '.')
        ];
        
        foreach ($detalhes as $nome => $valor) {
            echo "<div class='detail-card'>";
            echo "<div class='detail-name'>$nome</div>";
            echo "<div class='detail-value'>$valor</div>";
            echo "</div>";
        }
        echo "</div>";
        
        echo "<div class='calculation-steps'>";
        echo "<strong>🔍 Cálculo passo a passo:</strong><br>";
        echo "1. X = (B × C) ÷ A<br>";
        echo "2. X = ({$valor_b} × {$valor_c}) ÷ {$valor_a}<br>";
        echo "3. X = " . ($valor_b * $valor_c) . " ÷ {$valor_a}<br>";
        echo "4. X = " . number_format($valor_x, 2, ',', '.');
        echo "</div>";
        
        echo "</div>";
    }
    ?>

    <script>
        function openTab(tabName) {
            // Esconde todas as abas
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Remove classe active de todos os botões
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });
            
            // Mostra a aba selecionada
            document.getElementById(tabName).classList.add('active');
            
            // Ativa o botão selecionado
            event.currentTarget.classList.add('active');
        }
        
        // Funções para preencher exemplos
        function preencherCalculo(valor, porcentagem) {
            document.getElementById('valor_base').value = valor;
            document.getElementById('porcentagem_calc').value = porcentagem;
        }
        
        function preencherAumento(valor, porcentagem) {
            document.getElementById('valor_base_aumento').value = valor;
            document.getElementById('porcentagem_aumento').value = porcentagem;
        }
        
        function preencherDesconto(valor, porcentagem) {
            document.getElementById('valor_base_desconto').value = valor;
            document.getElementById('porcentagem_desconto').value = porcentagem;
        }
        
        function preencherVariacao(antigo, novo) {
            document.getElementById('valor_antigo').value = antigo;
            document.getElementById('valor_novo').value = novo;
        }
        
        function preencherRegraTres(a, b, c) {
            document.getElementById('valor_a').value = a;
            document.getElementById('valor_b').value = b;
            document.getElementById('valor_c').value = c;
        }
        
        // Foca no primeiro campo quando a aba é aberta
        document.querySelectorAll('.tab-button').forEach(button => {
            button.addEventListener('click', function() {
                setTimeout(() => {
                    const activeTab = document.querySelector('.tab-content.active');
                    const input = activeTab.querySelector('input');
                    if (input) {
                        input.focus();
                    }
                }, 100);
            });
        });
        
        // Foca no primeiro campo quando a página carrega
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelector('.tab-content.active input').focus();
        });
    </script>
</body>
</html>