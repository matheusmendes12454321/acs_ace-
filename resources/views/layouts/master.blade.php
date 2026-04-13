<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <meta name="theme-color" content="#00426d">
    <title>Saúde Conecta - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        :root {
            --primary: #00426d;
            --primary-light: #005a92;
            --primary-dark: #003155;
            --secondary: #00b4d8;
            --accent: #00d4ff;
            --success: #2ecc71;
            --warning: #f39c12;
            --danger: #e74c3c;
            --info: #3498db;
            --bg: #f0f4f8;
            --sidebar-bg: #0a2b3e;
            --card-white: #ffffff;
            --text-dark: #181c1e;
            --text-muted: #5a6e7a;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: var(--sidebar-bg);
            color: white;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            overflow-y: auto;
        }
        
        .sidebar.collapsed {
            transform: translateX(-100%);
        }
        
        .sidebar-brand {
            padding: 24px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 20px;
        }
        
        .sidebar-brand h3 {
            font-weight: 700;
            background: linear-gradient(135deg, var(--secondary), var(--accent));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 14px 24px;
            display: flex;
            align-items: center;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
        }
        
        .nav-link:hover, .nav-link.active {
            background: rgba(255,255,255,0.05);
            color: var(--accent);
            border-left-color: var(--accent);
        }
        
        .nav-link i {
            width: 28px;
            margin-right: 12px;
            text-align: center;
            font-size: 1.1rem;
        }
        
        /* Main Content - Desktop ocupa tela toda */
        .main-content {
            margin-left: 280px;
            padding: 20px 24px;
            transition: all 0.3s;
            min-height: 100vh;
            width: calc(100% - 280px);
        }
        
        .main-content.full-width {
            margin-left: 0;
            width: 100%;
        }
        
        /* Top Bar */
        .top-bar {
            background: var(--card-white);
            padding: 12px 20px;
            border-radius: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 12px;
        }
        
        /* Cards */
        .card-custom {
            background: var(--card-white);
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 20px;
            transition: all 0.3s;
            height: 100%;
        }
        
        .card-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }
        
        /* Botões */
        .btn-grad {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            border: none;
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-grad:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,70,173,0.3);
            color: white;
        }
        
        .btn-outline-custom {
            border: 1.5px solid var(--primary-light);
            background: transparent;
            border-radius: 12px;
            padding: 8px 20px;
            font-weight: 500;
            color: var(--primary);
            transition: all 0.3s;
        }
        
        .btn-outline-custom:hover {
            background: var(--primary);
            color: white;
        }
        
        /* Badges */
        .badge-risk-high { background: #fee2e2; color: #dc2626; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.7rem; }
        .badge-risk-mid { background: #fed7aa; color: #ea580c; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.7rem; }
        .badge-risk-low { background: #dcfce7; color: #16a34a; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.7rem; }
        .badge-status { padding: 4px 10px; border-radius: 20px; font-size: 0.7rem; font-weight: 600; }
        
        /* Tabelas */
        .table-responsive-custom {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        
        .table-custom {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
            min-width: 500px;
        }
        
        .table-custom td, .table-custom th {
            padding: 14px;
            background: var(--card-white);
            vertical-align: middle;
        }
        
        .table-custom tr td:first-child { border-radius: 16px 0 0 16px; }
        .table-custom tr td:last-child { border-radius: 0 16px 16px 0; }
        
        /* Progress */
        .progress-custom {
            height: 8px;
            border-radius: 10px;
            background: #e5e7eb;
        }
        
        /* Modal */
        .modal-custom .modal-content {
            border-radius: 24px;
            border: none;
            padding: 8px;
        }
        
        /* Menu Toggle */
        .menu-toggle {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            color: var(--primary);
            cursor: pointer;
            padding: 8px;
            border-radius: 12px;
        }
        
        .menu-toggle:hover {
            background: rgba(0,66,109,0.05);
        }
        
        /* Mapas */
        .map-container {
            height: 300px;
            border-radius: 16px;
            width: 100%;
        }
        
        /* Responsividade */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 16px;
                width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .main-content { padding: 12px; }
            h2 { font-size: 1.5rem; }
            .card-custom { padding: 16px; }
        }
        
        /* Overlay mobile */
        #sidebarOverlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 999;
            display: none;
        }
    </style>
    @stack('styles')
</head>
<body>
    <div id="sidebarOverlay" onclick="closeSidebar()"></div>
    
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-heartbeat fa-2x mb-2" style="color: var(--accent);"></i>
            <h3>Saúde Conecta</h3>
            <small id="userRoleBadge" class="text-muted">{{ session('user_funcao') == 'administrador' ? '👑 ADMINISTRADOR' : (session('user_funcao') == 'acs' ? '🏥 ACS' : '🦟 ACE') }}</small>
        </div>
        <nav class="mt-2">
            @if(session('user_funcao') == 'administrador')
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-pie"></i> Dashboard
                </a>
                <a href="{{ route('admin.usuarios') }}" class="nav-link"><i class="fas fa-users"></i> Gestão de Usuários</a>
                <a href="{{ route('admin.agentes') }}" class="nav-link"><i class="fas fa-user-md"></i> Cadastro de Agentes</a>
                <a href="{{ route('admin.microareas') }}" class="nav-link"><i class="fas fa-map-marked-alt"></i> Microáreas</a>
                <a href="{{ route('admin.endemias') }}" class="nav-link"><i class="fas fa-virus"></i> Monitoramento Endemias</a>
                <a href="{{ route('admin.auditoria') }}" class="nav-link"><i class="fas fa-clipboard-list"></i> Auditoria</a>
                <a href="{{ route('admin.alertas') }}" class="nav-link"><i class="fas fa-bell"></i> Central de Alertas</a>
                <a href="{{ route('admin.relatorios') }}" class="nav-link"><i class="fas fa-file-alt"></i> Relatórios</a>
                <a href="{{ route('admin.sincronizacao') }}" class="nav-link"><i class="fas fa-cloud-upload-alt"></i> Sincronização</a>
            @elseif(session('user_funcao') == 'acs')
                <a href="{{ route('acs.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="{{ route('acs.familias') }}" class="nav-link"><i class="fas fa-home"></i> Famílias</a>
                <a href="{{ route('acs.visitas') }}" class="nav-link"><i class="fas fa-calendar-check"></i> Visitas</a>
                <a href="{{ route('acs.rotas') }}" class="nav-link"><i class="fas fa-route"></i> Minhas Rotas</a>
                <a href="{{ route('acs.historico') }}" class="nav-link"><i class="fas fa-history"></i> Histórico</a>
                <a href="{{ route('acs.alertas') }}" class="nav-link"><i class="fas fa-exclamation-triangle"></i> Alertas</a>
                <a href="{{ route('acs.relatorios') }}" class="nav-link"><i class="fas fa-chart-line"></i> Relatórios</a>
                <a href="{{ route('acs.sincronizacao') }}" class="nav-link"><i class="fas fa-sync"></i> Sincronização</a>
            @elseif(session('user_funcao') == 'ace')
                <a href="{{ route('ace.dashboard') }}" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                <a href="{{ route('ace.focos') }}" class="nav-link"><i class="fas fa-biohazard"></i> Focos de Endemias</a>
                <a href="{{ route('ace.vistorias') }}" class="nav-link"><i class="fas fa-search"></i> Vistorias</a>
                <a href="{{ route('ace.alertas') }}" class="nav-link"><i class="fas fa-exclamation-triangle"></i> Alertas</a>
                <a href="{{ route('ace.relatorios') }}" class="nav-link"><i class="fas fa-chart-line"></i> Relatórios</a>
                <a href="{{ route('ace.sincronizacao') }}" class="nav-link"><i class="fas fa-sync"></i> Sincronização</a>
            @endif
        </nav>
        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="border-top: 1px solid rgba(255,255,255,0.08);">
            <a href="{{ route('logout') }}" class="nav-link text-danger">
                <i class="fas fa-sign-out-alt"></i> Sair
            </a>
        </div>
    </div>

    <div class="main-content" id="mainContent">
        <div class="top-bar">
            <div class="d-flex align-items-center gap-3">
                <button class="menu-toggle d-lg-none" onclick="toggleMobileSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <button class="menu-toggle d-none d-lg-block" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
                <h5 class="mb-0 fw-bold">@yield('title')</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="position-relative">
                    <i class="fas fa-bell fs-5 text-muted" style="cursor: pointer;" onclick="showNotifications()"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">3</span>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light rounded-pill dropdown-toggle shadow-sm" data-bs-toggle="dropdown" style="font-size: 0.9rem;">
                        <i class="fas fa-user-circle me-2"></i> {{ session('user_nome', 'Usuário') }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3">
                        <li><a class="dropdown-item" href="{{ route('perfil') }}"><i class="fas fa-user me-2"></i>Meu Perfil</a></li>
                        <li><a class="dropdown-item" href="{{ route('configuracoes') }}"><i class="fas fa-cog me-2"></i>Configurações</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt me-2"></i>Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        @yield('content')
    </div>

    <div class="modal fade" id="genericModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
            <div class="modal-content modal-custom">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold" id="modalTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="modalBody"></div>
                <div class="modal-footer border-0 pt-0" id="modalFooter"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        let sidebarCollapsed = false;
        
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            if (window.innerWidth > 992) {
                sidebarCollapsed = !sidebarCollapsed;
                if (sidebarCollapsed) {
                    sidebar.style.transform = 'translateX(-100%)';
                    mainContent.classList.add('full-width');
                } else {
                    sidebar.style.transform = 'translateX(0)';
                    mainContent.classList.remove('full-width');
                }
            }
        }
        
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('mobile-open');
            overlay.style.display = sidebar.classList.contains('mobile-open') ? 'block' : 'none';
        }
        
        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('mobile-open');
            document.getElementById('sidebarOverlay').style.display = 'none';
        }
        
        function showNotifications() {
            const modal = new bootstrap.Modal(document.getElementById('genericModal'));
            document.getElementById('modalTitle').innerHTML = '<i class="fas fa-bell me-2"></i>Notificações';
            document.getElementById('modalBody').innerHTML = `
                <div class="list-group list-group-flush">
                    <div class="list-group-item border-0 py-3">
                        <div class="d-flex"><div class="flex-shrink-0"><i class="fas fa-virus text-danger fa-lg"></i></div><div class="flex-grow-1 ms-3"><h6 class="mb-1">Foco de Dengue detectado</h6><p class="mb-0 text-muted small">Setor Sul - Rua das Palmeiras, 452</p><small class="text-muted">Há 15 minutos</small></div></div>
                    </div>
                    <div class="list-group-item border-0 py-3">
                        <div class="d-flex"><div class="flex-shrink-0"><i class="fas fa-clock text-warning fa-lg"></i></div><div class="flex-grow-1 ms-3"><h6 class="mb-1">Visita agendada</h6><p class="mb-0 text-muted small">Família Silva - 14:30 hoje</p><small class="text-muted">Há 2 horas</small></div></div>
                    </div>
                </div>
            `;
            document.getElementById('modalFooter').innerHTML = '<button class="btn btn-outline-custom" data-bs-dismiss="modal">Fechar</button>';
            modal.show();
        }
        
        function syncNow() { alert("🔄 Sincronização iniciada!"); }
        function exportReport(format) { alert(`📄 Relatório exportado em formato ${format}`); }
        function downloadReport() { alert("⬇️ Download iniciado!"); }
        
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                document.getElementById('sidebar').classList.remove('mobile-open');
                document.getElementById('sidebarOverlay').style.display = 'none';
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
