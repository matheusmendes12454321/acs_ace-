<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <title>Saúde Conecta - @yield('title')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #00426d;
            --secondary: #00b4d8;
            --accent: #00d4ff;
            --bg-main: #f8fafc;
            --sidebar-dark: #0a2b3e;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --border-color: #e2e8f0;
            --shadow-sm: 0 2px 4px rgba(0,0,0,0.02), 0 1px 2px rgba(0,0,0,0.03);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-main);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* --- SIDEBAR REFEITA (REF: IMAGE_102E39) --- */
        .sidebar {
            position: fixed;
            left: 0; top: 0;
            width: 260px;
            height: 100vh;
            background: var(--sidebar-dark);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .sidebar-brand {
            padding: 32px 24px;
            color: white;
        }

        .sidebar-brand h3 {
            font-weight: 800;
            font-size: 1.25rem;
            letter-spacing: -0.5px;
            margin: 0;
            background: linear-gradient(135deg, #fff, var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-group-title {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: rgba(255,255,255,0.4);
            padding: 20px 24px 8px;
            font-weight: 700;
        }

        .nav-link {
            color: rgba(255,255,255,0.65);
            padding: 12px 24px;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
        }

        .nav-link i {
            width: 20px;
            margin-right: 12px;
            font-size: 1.1rem;
        }

        .nav-link:hover, .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.08);
        }

        .nav-link.active {
            background: rgba(0, 180, 216, 0.15);
            border-left: 4px solid var(--secondary);
            font-weight: 700;
        }

        /* Botão Alerta de Emergência (REF: SCREEN.JPG) */
        .btn-emergency-sidebar {
            background: #be123c;
            color: white;
            margin: 20px;
            padding: 12px;
            border-radius: 12px;
            text-align: center;
            font-weight: 700;
            font-size: 0.8rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        /* --- TOP BAR REFEITA (REF: IMAGE_1035DF) --- */
        .main-content {
            margin-left: 260px;
            padding: 24px 40px;
            min-height: 100vh;
        }

        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            gap: 20px;
        }

        .search-box {
            position: relative;
            flex-grow: 1;
            max-width: 500px;
        }

        .search-box input {
            background: #f1f5f9;
            border: 1px solid transparent;
            border-radius: 14px;
            padding: 12px 16px 12px 45px;
            width: 100%;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .top-nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .icon-btn {
            width: 44px; height: 44px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 12px;
            color: var(--text-muted);
            background: transparent;
            border: none;
            font-size: 1.2rem;
            position: relative;
        }

        .icon-btn:hover { background: #f1f5f9; color: var(--primary); }

        .v-divider {
            width: 1px; height: 32px;
            background: var(--border-color);
            margin: 0 8px;
        }

        .user-widget {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 6px 6px 6px 16px;
            border-radius: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        .user-widget:hover { background: #f1f5f9; }

        .user-info { text-align: right; }
        .user-info .name { font-weight: 700; font-size: 0.85rem; color: var(--text-main); margin: 0; }
        .user-info .role { font-size: 0.75rem; color: var(--text-muted); margin: 0; }

        .avatar {
            width: 40px; height: 40px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid white;
            box-shadow: var(--shadow-sm);
        }

        /* --- CARDS & UI (REF: SCREEN (1).PNG) --- */
        .card-stats {
            background: white;
            border-radius: 20px;
            padding: 24px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow-sm);
        }

        @media (max-width: 992px) {
            .sidebar { transform: translateX(-100%); }
            .sidebar.mobile-open { transform: translateX(0); }
            .main-content { margin-left: 0; padding: 20px; }
        }
    </style>
    @stack('styles')
</head>
<body>
    @php $role = session('user_funcao', 'admin'); @endphp

    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h3>Saúde Conecta</h3>
        </div>

        <div class="flex-grow-1 overflow-auto">
            @if($role == 'admin')
                <div class="nav-group-title">Painel Gestor</div>
                <a href="#" class="nav-link active"><i class="fas fa-th-large"></i> Dashboard</a>
                <a href="#" class="nav-link"><i class="fas fa-users"></i> Equipes</a>
                <a href="#" class="nav-link"><i class="fas fa-map-marked-alt"></i> Microáreas</a>
                <a href="#" class="nav-link"><i class="fas fa-file-invoice"></i> Relatórios</a>
                
                <div class="nav-group-title">Controle</div>
                <a href="#" class="nav-link"><i class="fas fa-shield-alt"></i> Auditoria</a>
                <a href="#" class="nav-link"><i class="fas fa-cog"></i> Configurações</a>
            @else
                <div class="nav-group-title">Menu Agente</div>
                <a href="#" class="nav-link active"><i class="fas fa-home"></i> Início</a>
                <a href="#" class="nav-link"><i class="fas fa-walking"></i> Minhas Visitas</a>
                <a href="#" class="nav-link"><i class="fas fa-sync"></i> Sincronizar</a>
            @endif
        </div>

        <a href="#" class="btn-emergency-sidebar">
            <i class="fas fa-exclamation-triangle"></i> ALERTAR EMERGÊNCIA
        </a>
        
        <div class="p-3 border-top border-secondary border-opacity-10">
            <a href="#" class="nav-link text-danger py-2"><i class="fas fa-sign-out-alt"></i> Sair</a>
        </div>
    </div>

    <div class="main-content">
        <nav class="top-navbar">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar indicadores ou equipes...">
            </div>

            <div class="top-nav-actions">
                <button class="icon-btn">
                    <i class="far fa-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.5rem; padding: 4px 6px; margin-top: 10px; margin-left: -10px;">12</span>
                </button>
                <button class="icon-btn">
                    <i class="fas fa-cog"></i>
                </button>
                
                <div class="v-divider"></div>

                <div class="user-widget" data-bs-toggle="dropdown">
                    <div class="user-info d-none d-md-block">
                        <p class="name">{{ session('user_nome', 'Dr. Ricardo Silva') }}</p>
                        <p class="role">{{ $role == 'admin' ? 'Gestor Municipal' : 'Agente Comunitário' }}</p>
                    </div>
                    <img src="https://ui-avatars.com/api/?name=Ricardo+Silva&background=00426d&color=fff" class="avatar" alt="User">
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleMobileSidebar() {
            document.getElementById('sidebar').classList.toggle('mobile-open');
        }
    </script>
    @stack('scripts')
</body>
</html>