<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema ACE/ACS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-container {
            background: white;
            border-radius: 30px;
            padding: 50px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: fadeInUp 0.5s ease;
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .login-header { text-align: center; margin-bottom: 40px; }
        .login-header i { font-size: 70px; color: #667eea; margin-bottom: 20px; }
        .login-header h2 { color: #333; font-weight: 600; }
        .form-control {
            border-radius: 12px;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
        }
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            color: white;
            width: 100%;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-login:hover { transform: translateY(-2px); box-shadow: 0 5px 20px rgba(102,126,234,0.4); }
        .demo-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 12px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <i class="fas fa-heartbeat"></i>
            <h2>Sistema ACE/ACS</h2>
            <p class="text-muted">Agentes Comunitários de Saúde</p>
        </div>
        
        <form id="loginForm">
            <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" id="cpf" class="form-control" placeholder="000.000.000-00" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" id="senha" class="form-control" placeholder="••••••" required>
            </div>
            <button type="submit" class="btn-login">
                <i class="fas fa-sign-in-alt"></i> Entrar no Sistema
            </button>
        </form>
        
        <div class="demo-info">
            <i class="fas fa-info-circle"></i> Credenciais de teste:<br>
            <strong>CPF:</strong> qualquer número | <strong>Senha:</strong> 123
        </div>
        
        <div id="loginError" class="alert alert-danger mt-3" style="display: none;"></div>
    </div>
    
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const cpf = document.getElementById('cpf').value;
            const senha = document.getElementById('senha').value;
            
            if (senha === '123') {
                localStorage.setItem('usuario', JSON.stringify({
                    nome: 'Agente de Saúde',
                    cpf: cpf,
                    funcao: 'acs'
                }));
                window.location.href = '/dashboard';
            } else {
                const errorDiv = document.getElementById('loginError');
                errorDiv.style.display = 'block';
                errorDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> Senha incorreta! Use a senha: 123';
            }
        });
    </script>
</body>
</html>
