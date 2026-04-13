<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <title>ACS/ACE Portal - Saúde Conecta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body {
            background: linear-gradient(135deg, #0a2b3e 0%, #1a4a6f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .login-card {
            background: rgba(255,255,255,0.98);
            border-radius: 32px;
            padding: 40px 32px;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25);
            backdrop-filter: blur(10px);
        }
        
        .logo-area {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .logo-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #00426d, #00b4d8);
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        
        .logo-icon i { font-size: 36px; color: white; }
        .title { font-size: 28px; font-weight: 700; color: #00426d; margin-bottom: 8px; text-align: center; }
        .subtitle { font-size: 14px; color: #5a6e7a; margin-bottom: 32px; text-align: center; }
        
        .form-label { font-size: 13px; font-weight: 600; color: #2c3e50; margin-bottom: 6px; }
        
        .form-control, .form-select {
            border-radius: 14px;
            padding: 14px 16px;
            border: 1.5px solid #e2e8f0;
            background: #ffffff;
            font-size: 14px;
            transition: all 0.2s;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 0 3px rgba(0,180,216,0.1);
            outline: none;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #00426d, #00b4d8);
            color: white;
            border: none;
            border-radius: 14px;
            padding: 16px;
            width: 100%;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s;
            margin-top: 24px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,66,109,0.3);
            color: white;
        }
        
        .biometric-btn {
            background: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-radius: 14px;
            padding: 14px;
            width: 100%;
            font-weight: 500;
            font-size: 14px;
            color: #2c3e50;
            transition: all 0.2s;
        }
        
        .biometric-btn:hover {
            background: #f1f5f9;
            border-color: #00b4d8;
        }
        
        .footer-text { font-size: 11px; color: #94a3b8; text-align: center; }
        .footer-links { display: flex; justify-content: center; gap: 16px; margin-top: 16px; flex-wrap: wrap; }
        .footer-links a { color: #94a3b8; text-decoration: none; font-size: 11px; }
        .footer-links a:hover { color: #00b4d8; }
        
        /* Responsividade */
        @media (max-width: 768px) {
            body { padding: 16px; }
            .login-card { padding: 28px 20px; }
            .title { font-size: 24px; }
            .logo-icon { width: 60px; height: 60px; }
            .logo-icon i { font-size: 28px; }
        }
        
        @media (max-width: 480px) {
            .login-card { padding: 24px 16px; }
            .btn-login, .biometric-btn { padding: 12px; }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-area">
                <div class="logo-icon"><i class="fas fa-heartbeat"></i></div>
                <h1 class="title">ACS/ACE Portal</h1>
                <p class="subtitle">Cuidado que transforma vidas</p>
            </div>
            
            <p style="font-size: 13px; color: #5a6e7a; margin-bottom: 24px; text-align: center;">
                Bem-vindo ao Portal do Agente Comunitário de Saúde e Agente de Combate às Endemias.
            </p>
            
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">E-MAIL INSTITUCIONAL</label>
                    <input type="email" name="email" class="form-control" placeholder="nome@saude.gov.br" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">CPF</label>
                    <input type="text" name="cpf" class="form-control" placeholder="000.000.000-00" id="cpf" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">TIPO DE USUÁRIO</label>
                    <select name="funcao" class="form-select" required>
                        <option value="administrador">Administrador</option>
                        <option value="acs">Agente Comunitário de Saúde (ACS)</option>
                        <option value="ace">Agente de Combate às Endemias (ACE)</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">SENHA</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label" style="font-size: 13px; color: #5a6e7a;" for="remember">Lembrar de mim neste dispositivo</label>
                    </div>
                    <a href="#" class="text-decoration-none" style="font-size: 13px; color: #00b4d8;">Esqueceu a senha?</a>
                </div>
                
                <button type="submit" class="btn-login">
                    Entrar <i class="fas fa-arrow-right ms-2"></i>
                </button>
            </form>
            
            <div class="text-center my-4"><span class="footer-text">IDENTIFICAÇÃO INSTITUCIONAL</span></div>
            
            <button class="biometric-btn" onclick="alert('Leitor biométrico ativado')">
                <i class="fas fa-fingerprint me-2"></i> Entrar com Biometria
            </button>
            
            <hr class="my-4" style="border-color: #e2e8f0;">
            
            <div class="footer-text">
                <p>ACESSO RESTRITO AO SISTEMA DE SAÚDE<br>AMBIENTE SEGURO E MONITORADO</p>
            </div>
            
            <div class="footer-links">
                <a href="#">PRIVACY POLICY</a>
                <a href="#">TERMS OF SERVICE</a>
                <a href="#">INSTITUTIONAL PORTAL</a>
                <a href="#">HELP DESK</a>
            </div>
            
            <div class="text-center mt-4">
                <span class="footer-text">Vitalis Nexus • Sistema de Gestão de Saúde Comunitária</span><br>
                <span class="footer-text">V4.2.0 • ENCRYPTED</span><br>
                <span class="footer-text">© 2024 CLINICAL SANCTUARY. ALL RIGHTS RESERVED.</span>
            </div>
        </div>
    </div>
    
    <script>
        // Máscara para CPF
        document.getElementById('cpf').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                e.target.value = value;
            }
        });
    </script>
</body>
</html>
