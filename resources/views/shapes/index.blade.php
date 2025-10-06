<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POO - Formas Geométricas</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .greeting {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .language-selector {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 30px;
            align-items: center;
        }
        
        .language-selector input, .language-selector select {
            padding: 10px;
            border: 2px solid #667eea;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .language-selector button {
            padding: 10px 30px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        
        .language-selector button:hover {
            background: #764ba2;
        }
        
        .shapes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 30px;
        }
        
        .shape-card {
            border: 2px solid #e0e0e0;
            border-radius: 15px;
            padding: 25px;
            background: #f9f9f9;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .shape-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .shape-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .shape-icon {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 30px;
        }
        
        .rectangle-icon { background: #2196F3; }
        .triangle-icon { background: #4CAF50; }
        .circle-icon { background: #f44336; }
        
        .shape-title {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        
        .shape-info {
            background: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .info-row:last-child {
            border-bottom: none;
        }
        
        .label {
            font-weight: 600;
            color: #666;
        }
        
        .value {
            color: #333;
            font-weight: bold;
        }
        
        .shape-visual {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px;
            margin: 20px 0;
        }
        
        .rectangle-shape {
            width: 120px;
            height: 80px;
            background: #2196F3;
            border-radius: 5px;
        }
        
        .triangle-shape {
            width: 0;
            height: 0;
            border-left: 60px solid transparent;
            border-right: 60px solid transparent;
            border-bottom: 100px solid #4CAF50;
        }
        
        .circle-shape {
            width: 100px;
            height: 100px;
            background: #f44336;
            border-radius: 50%;
        }
        
        .calculator {
            margin-top: 40px;
            padding: 30px;
            background: #f0f0f0;
            border-radius: 15px;
        }
        
        .calculator h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        
        .calc-form {
            display: grid;
            gap: 15px;
        }
        
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }
        
        .form-group label {
            font-weight: 600;
            color: #555;
        }
        
        .form-group input, .form-group select {
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        
        .calc-result {
            margin-top: 20px;
            padding: 20px;
            background: white;
            border-radius: 10px;
            border-left: 4px solid #667eea;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔷 Práctica de POO - Formas Geométricas 🔷</h1>
        </div>
        
        <div class="greeting">
            {{ $greeting }}
        </div>
        
        <form method="GET" action="{{ url('/shapes') }}" class="language-selector">
            <input type="text" name="name" placeholder="Tu nombre" value="{{ $name }}" required>
            <select name="language">
                <option value="es" {{ $language === 'es' ? 'selected' : '' }}>Español</option>
                <option value="en" {{ $language === 'en' ? 'selected' : '' }}>English</option>
            </select>
            <button type="submit">{{ $language === 'es' ? 'Actualizar' : 'Update' }}</button>
        </form>
        
        <div class="shapes-grid">
            @foreach($shapes as $shape)
                <div class="shape-card">
                    <div class="shape-header">
                        <div class="shape-icon {{ $shape['type'] }}-icon">
                            @if($shape['type'] === 'rectangle')
                                ▭
                            @elseif($shape['type'] === 'triangle')
                                ▲
                            @else
                                ●
                            @endif
                        </div>
                        <div class="shape-title">
                            {{ $shape['object']->getName() }}
                        </div>
                    </div>
                    
                    <div class="shape-visual">
                        <div class="{{ $shape['type'] }}-shape"></div>
                    </div>
                    
                    <div class="shape-info">
                        @if($shape['type'] === 'rectangle')
                            <div class="info-row">
                                <span class="label">Ancho:</span>
                                <span class="value">{{ number_format($shape['width'], 2) }} unidades</span>
                            </div>
                            <div class="info-row">
                                <span class="label">Alto:</span>
                                <span class="value">{{ number_format($shape['height'], 2) }} unidades</span>
                            </div>
                            <div class="info-row">
                                <span class="label">Perímetro:</span>
                                <span class="value">{{ number_format($shape['perimeter'], 2) }} unidades</span>
                            </div>
                        @elseif($shape['type'] === 'triangle')
                            <div class="info-row">
                                <span class="label">Base:</span>
                                <span class="value">{{ number_format($shape['base'], 2) }} unidades</span>
                            </div>
                            <div class="info-row">
                                <span class="label">Altura:</span>
                                <span class="value">{{ number_format($shape['height'], 2) }} unidades</span>
                            </div>
                            <div class="info-row">
                                <span class="label">Perímetro:</span>
                                <span class="value">{{ number_format($shape['perimeter'], 2) }} unidades</span>
                            </div>
                        @else
                            <div class="info-row">
                                <span class="label">Radio:</span>
                                <span class="value">{{ number_format($shape['radius'], 2) }} unidades</span>
                            </div>
                            <div class="info-row">
                                <span class="label">Diámetro:</span>
                                <span class="value">{{ number_format($shape['diameter'], 2) }} unidades</span>
                            </div>
                            <div class="info-row">
                                <span class="label">Circunferencia:</span>
                                <span class="value">{{ number_format($shape['circumference'], 2) }} unidades</span>
                            </div>
                        @endif
                        <div class="info-row">
                            <span class="label">Área:</span>
                            <span class="value">{{ number_format($shape['area'], 2) }} unidades²</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="calculator">
            <h2>📐 Calculadora de Formas 📐</h2>
            <div class="calc-form">
                <div class="form-group">
                    <label>Tipo de Forma:</label>
                    <select id="shapeType" onchange="updateFields()">
                        <option value="rectangle">Rectángulo</option>
                        <option value="triangle">Triángulo</option>
                        <option value="circle">Círculo</option>
                    </select>
                </div>
                
                <div id="rectangleFields">
                    <div class="form-group">
                        <label>Ancho:</label>
                        <input type="number" id="width" step="0.01" value="10">
                    </div>
                    <div class="form-group">
                        <label>Alto:</label>
                        <input type="number" id="height" step="0.01" value="5">
                    </div>
                </div>
                
                <div id="triangleFields" style="display: none;">
                    <div class="form-group">
                        <label>Base:</label>
                        <input type="number" id="base" step="0.01" value="8">
                    </div>
                    <div class="form-group">
                        <label>Altura:</label>
                        <input type="number" id="triangleHeight" step="0.01" value="6">
                    </div>
                </div>
                
                <div id="circleFields" style="display: none;">
                    <div class="form-group">
                        <label>Radio:</label>
                        <input type="number" id="radius" step="0.01" value="7">
                    </div>
                </div>
                
                <button type="button" onclick="calculate()" class="language-selector" style="width: 100%; margin-top: 10px;">
                    Calcular
                </button>
            </div>
            
            <div id="result" class="calc-result" style="display: none;">
                <h3>Resultado:</h3>
                <p id="resultText"></p>
            </div>
        </div>
    </div>
    
    <script>
        function updateFields() {
            const type = document.getElementById('shapeType').value;
            document.getElementById('rectangleFields').style.display = type === 'rectangle' ? 'block' : 'none';
            document.getElementById('triangleFields').style.display = type === 'triangle' ? 'block' : 'none';
            document.getElementById('circleFields').style.display = type === 'circle' ? 'block' : 'none';
        }
        
        async function calculate() {
            const type = document.getElementById('shapeType').value;
            let params = new URLSearchParams();
            params.append('type', type);
            params.append('language', '{{ $language }}');
            params.append('name', '{{ $name }}');
            
            if (type === 'rectangle') {
                params.append('width', document.getElementById('width').value);
                params.append('height', document.getElementById('height').value);
            } else if (type === 'triangle') {
                params.append('base', document.getElementById('base').value);
                params.append('height', document.getElementById('triangleHeight').value);
            } else if (type === 'circle') {
                params.append('radius', document.getElementById('radius').value);
            }
            
            try {
                const response = await fetch('/shapes/calculate?' + params.toString());
                const data = await response.json();
                
                if (data.success) {
                    document.getElementById('resultText').innerHTML = `
                        <strong>Información:</strong> ${data.info}<br>
                        <strong>Área:</strong> ${data.area.toFixed(2)} unidades²
                    `;
                    document.getElementById('result').style.display = 'block';
                }
            } catch (error) {
                console.error('Error:', error);
            }
        }
    </script>
</body>
</html>
