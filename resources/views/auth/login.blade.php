<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACS/ACE Portal - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #004a80;
            --dark-blue: #00335c;
            --input-bg: #eff3f6;
            --text-muted: #6c757d;
        }

        /* Faz o body ocupar 100% sem scroll */
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        /* Container que ocupa a tela toda */
        .full-screen-container {
            display: flex;
            min-height: 100vh;
            width: 100vw;
        }

        /* Lado Esquerdo (Banner) - 45% da tela */
        .login-sidebar {
            background-color: var(--primary-blue);
            color: white;
            padding: 60px;
            width: 45%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        /* Lado Direito (Formulário) - 55% da tela */
        .login-form-section {
            width: 55%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }

        .form-wrapper {
            max-width: 420px;
            width: 100%;
        }

        .logo-box {
            color: var(--primary-blue);
            text-align: center;
            margin-bottom: 40px;
        }

        .logo-box i { font-size: 3rem; margin-bottom: 15px; }

        .form-label {
            font-size: 0.7rem;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--text-muted);
            letter-spacing: 0.5px;
        }

        .form-control, .form-select {
            background-color: var(--input-bg);
            border: 1px solid #e0e6ed;
            padding: 14px;
            font-size: 0.9rem;
            border-radius: 8px;
        }

        .btn-entrar {
            background-color: var(--dark-blue);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 14px;
            width: 100%;
            font-weight: 600;
            margin-top: 25px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .btn-biometria {
            background-color: #f8f9fa;
            border: 1px solid #e0e6ed;
            color: var(--text-muted);
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            margin-top: 15px;
            font-size: 0.85rem;
        }

        .footer-credits {
            font-size: 0.7rem;
            color: #adb5bd;
            text-align: center;
            margin-top: 50px;
        }

        /* Responsividade Mobile: Empilha e faz o form ocupar tudo */
        @media (max-width: 992px) {
            .login-sidebar {
                display: none; /* Esconde a barra lateral no mobile como na imagem 1 */
            }
            .login-form-section {
                width: 100%;
                padding: 20px;
            }
            .form-wrapper {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="full-screen-container">
        
        <div class="login-sidebar">
            <div>
                <h2 class="fw-bold mb-4">Cuidado que<br>transforma vidas.</h2>
                <p class="lead opacity-75">Bem-vindo ao Portal do Agente Comunitário de Saúde e Agente de Combate às Endemias.</p>
            </div>
            
            <div class="mt-auto d-flex align-items-center">
                <div class="bg-white p-2 rounded-circle me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-shield-alt text-primary"></i>
                </div>
                <div>
                    <p class="mb-0 fw-bold small">Vigie Saúde</p>
                    <p class="mb-0 extra-small opacity-50" style="font-size: 0.7rem;">Sistema de Gestão de Saúde Comunitária</p>
                </div>
            </div>
        </div>

        <div class="login-form-section">
            <div class="form-wrapper">
                
                <div class="logo-box">
                    <i class="fas fa-file-medical"></i>
                    <h3 class="fw-bold mb-0">ACS/ACE Portal</h3>
                    <p class="text-muted small">Clinical Sanctuary Login</p>
                </div>

                <form action="#">
                    <div class="mb-3">
                        <label class="form-label">E-mail Institucional</label>
                        <input type="email" class="form-control" placeholder="nome@saude.gov.br">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">CPF</label>
                        <input type="text" class="form-control" placeholder="000.000.000-00">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo de Usuário</label>
                        <select class="form-select">
                            <option selected disabled>Selecione seu perfil</option>
                            <option>Agente Comunitário (ACS)</option>
                            <option>Agente de Endemias (ACE)</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Senha</label>
                            <a href="#" class="text-decoration-none extra-small" style="font-size: 0.7rem;">Esqueceu a senha?</a>
                        </div>
                        <div class="input-group">
                            <input type="password" class="form-control border-end-0" placeholder="********">
                            <span class="input-group-text bg-light border-start-0"><i class="far fa-eye-slash text-muted"></i></span>
                        </div>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="check">
                        <label class="form-check-label small text-muted" for="check">Lembrar de mim neste dispositivo</label>
                    </div>

                    <button type="submit" class="btn-entrar">
                        Entrar <i class="fas fa-arrow-right"></i>
                    </button>

                    <button type="button" class="btn-biometria">
                        <i class="fas fa-fingerprint me-2"></i> Entrar com biometria
                    </button>
                </form>

                <div class="footer-credits">
                    <p class="mb-1">© 2024 CLINICAL SANCTUARY. ALL RIGHTS RESERVED.</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="text-muted text-decoration-none">PRIVACY POLICY</a>
                        <a href="#" class="text-muted text-decoration-none">HELP DESK</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>