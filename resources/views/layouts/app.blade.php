<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes, viewport-fit=cover">
    <meta name="theme-color" content="#00426d">
    <title>Saúde Conecta - Sistema de Gestão para ACS/ACE</title>
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
        }
        
        /* Sidebar - Responsiva */
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
            transform: translateX(0);
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
        
        /* Main Content - Responsivo */
        .main-content {
            margin-left: 280px;
            padding: 20px 24px;
            transition: all 0.3s;
            min-height: 100vh;
        }
        
        .main-content.full-width {
            margin-left: 0;
        }
        
        /* Top Bar Responsivo */
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
        
        /* Cards Responsivos */
        .card-custom {
            background: var(--card-white);
            border-radius: 20px;
            border: none;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 20px;
            transition: all 0.3s;
            height: 100%;
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
        
        .btn-grad:hover, .btn-grad:focus {
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
        
        /* Badges */
        .badge-risk-high { background: #fee2e2; color: #dc2626; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.7rem; }
        .badge-risk-mid { background: #fed7aa; color: #ea580c; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.7rem; }
        .badge-risk-low { background: #dcfce7; color: #16a34a; padding: 4px 12px; border-radius: 20px; font-weight: 600; font-size: 0.7rem; }
        .badge-status { padding: 4px 10px; border-radius: 20px; font-size: 0.7rem; font-weight: 600; }
        
        /* Tabela Responsiva */
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
        
        /* Menu Hamburguer */
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
        #map, #visitMap, #routesMap, #focosMap { 
            height: 300px; 
            border-radius: 16px; 
            z-index: 1;
            width: 100%;
        }
        
        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: var(--primary-light); border-radius: 10px; }
        
        /* Animações */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
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
            }
            .card-custom {
                padding: 16px;
            }
            .top-bar {
                padding: 10px 16px;
            }
        }
        
        @media (max-width: 768px) {
            .main-content {
                padding: 12px;
            }
            h2 { font-size: 1.5rem; }
            h5 { font-size: 1.1rem; }
            .btn-grad, .btn-outline-custom {
                padding: 8px 16px;
                font-size: 0.85rem;
            }
        }
        
        @media (max-width: 576px) {
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
            }
            .top-bar .dropdown {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>
    <!-- Overlay para mobile -->
    <div id="sidebarOverlay" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.5); z-index: 999; display: none;" onclick="closeSidebar()"></div>
    
    <div class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-heartbeat fa-2x mb-2" style="color: var(--accent);"></i>
            <h3>Saúde Conecta</h3>
            <small id="userRoleBadge" class="text-muted"></small>
        </div>
        <nav class="mt-2" id="mainMenu"></nav>
        <div class="position-absolute bottom-0 start-0 w-100 p-3" style="border-top: 1px solid rgba(255,255,255,0.08);">
            <a href="#" onclick="logout()" class="nav-link text-danger">
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
                <h5 id="pageTitle" class="mb-0 fw-bold">Carregando...</h5>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="position-relative">
                    <i class="fas fa-bell fs-5 text-muted" style="cursor: pointer;" onclick="showNotifications()"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notificationBadge" style="font-size: 10px;">3</span>
                </div>
                <div class="dropdown">
                    <button class="btn btn-light rounded-pill dropdown-toggle shadow-sm" data-bs-toggle="dropdown" style="font-size: 0.9rem;">
                        <i class="fas fa-user-circle me-2"></i> <span id="userNameDisplay">Usuário</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3">
                        <li><a class="dropdown-item" href="#" onclick="loadPage('perfil')"><i class="fas fa-user me-2"></i>Meu Perfil</a></li>
                        <li><a class="dropdown-item" href="#" onclick="loadPage('configuracoes')"><i class="fas fa-cog me-2"></i>Configurações</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-danger" href="#" onclick="logout()"><i class="fas fa-sign-out-alt me-2"></i>Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="pageContent"></div>
    </div>

    <!-- Modal Genérico -->
    <div class="modal fade" id="genericModal" tabindex="-1" data-bs-backdrop="static">
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
        // Estado do sidebar
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
            if (sidebar.classList.contains('mobile-open')) {
                overlay.style.display = 'block';
            } else {
                overlay.style.display = 'none';
            }
        }
        
        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.remove('mobile-open');
            overlay.style.display = 'none';
        }
        
        // Usuário
        const user = JSON.parse(localStorage.getItem('user') || '{}');
        if (!user.nome) window.location.href = '/login';
        
        document.getElementById('userNameDisplay').innerText = user.nome;
        document.getElementById('userRoleBadge').innerHTML = user.funcao === 'administrador' ? '👑 ADMINISTRADOR' : (user.funcao === 'acs' ? '🏥 ACS' : '🦟 ACE');
        
        function showNotifications() {
            const modal = new bootstrap.Modal(document.getElementById('genericModal'));
            document.getElementById('modalTitle').innerHTML = '<i class="fas fa-bell me-2"></i>Notificações';
            document.getElementById('modalBody').innerHTML = `
                <div class="list-group list-group-flush">
                    <div class="list-group-item border-0 py-3"><div class="d-flex"><div class="flex-shrink-0"><i class="fas fa-virus text-danger fa-lg"></i></div><div class="flex-grow-1 ms-3"><h6 class="mb-1">Foco de Dengue detectado</h6><p class="mb-0 text-muted small">Setor Sul - Rua das Palmeiras, 452</p><small class="text-muted">Há 15 minutos</small></div></div></div>
                    <div class="list-group-item border-0 py-3"><div class="d-flex"><div class="flex-shrink-0"><i class="fas fa-clock text-warning fa-lg"></i></div><div class="flex-grow-1 ms-3"><h6 class="mb-1">Visita agendada</h6><p class="mb-0 text-muted small">Família Silva - 14:30 hoje</p><small class="text-muted">Há 2 horas</small></div></div></div>
                    <div class="list-group-item border-0 py-3"><div class="d-flex"><div class="flex-shrink-0"><i class="fas fa-sync-alt text-info fa-lg"></i></div><div class="flex-grow-1 ms-3"><h6 class="mb-1">Sincronização pendente</h6><p class="mb-0 text-muted small">12 formulários aguardando envio</p><small class="text-muted">Há 3 horas</small></div></div></div>
                </div>
            `;
            document.getElementById('modalFooter').innerHTML = '<button class="btn btn-outline-custom" data-bs-dismiss="modal">Fechar</button>';
            modal.show();
        }
        
        // Rotas por perfil
        const routes = {
            administrador: [
                { id: 'dashboard_admin', label: 'Dashboard', icon: 'fa-chart-pie' },
                { id: 'usuarios', label: 'Gestão de Usuários', icon: 'fa-users' },
                { id: 'microareas', label: 'Microáreas', icon: 'fa-map-marked-alt' },
                { id: 'endemias_admin', label: 'Monitoramento Endemias', icon: 'fa-virus' },
                { id: 'auditoria', label: 'Auditoria de Visitas', icon: 'fa-clipboard-list' },
                { id: 'alertas_admin', label: 'Central de Alertas', icon: 'fa-bell' },
                { id: 'relatorios_admin', label: 'Relatórios', icon: 'fa-file-alt' },
                { id: 'sincronizacao', label: 'Sincronização e-SUS', icon: 'fa-cloud-upload-alt' }
            ],
            acs: [
                { id: 'dashboard_acs', label: 'Dashboard', icon: 'fa-tachometer-alt' },
                { id: 'cadastro_familias', label: 'Cadastro de Famílias', icon: 'fa-home' },
                { id: 'registro_visitas', label: 'Registro de Visitas', icon: 'fa-calendar-check' },
                { id: 'rotas', label: 'Minhas Rotas', icon: 'fa-route' },
                { id: 'historico_familiar', label: 'Histórico Familiar', icon: 'fa-history' },
                { id: 'alertas_acs', label: 'Alertas', icon: 'fa-exclamation-triangle' },
                { id: 'relatorios_acs', label: 'Meus Relatórios', icon: 'fa-chart-line' },
                { id: 'sincronizacao', label: 'Sincronização', icon: 'fa-sync' }
            ],
            ace: [
                { id: 'dashboard_ace', label: 'Dashboard', icon: 'fa-tachometer-alt' },
                { id: 'focos_endemias', label: 'Focos de Endemias', icon: 'fa-biohazard' },
                { id: 'registro_vistorias', label: 'Registro de Vistorias', icon: 'fa-search' },
                { id: 'alertas_ace', label: 'Alertas', icon: 'fa-exclamation-triangle' },
                { id: 'relatorios_ace', label: 'Relatórios', icon: 'fa-chart-line' },
                { id: 'sincronizacao', label: 'Sincronização', icon: 'fa-sync' }
            ]
        };
        
        function renderMenu() {
            const menu = routes[user.funcao] || routes.acs;
            document.getElementById('mainMenu').innerHTML = menu.map(item => `
                <a href="#" onclick="loadPage('${item.id}'); closeSidebar();" class="nav-link" id="link-${item.id}">
                    <i class="fas ${item.icon}"></i> ${item.label}
                </a>
            `).join('');
        }
        
        async function loadPage(page) {
            const container = document.getElementById('pageContent');
            const title = document.getElementById('pageTitle');
            document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
            document.getElementById('link-' + page)?.classList.add('active');
            
            const pages = {
                dashboard_admin: () => renderDashboardAdmin(),
                usuarios: () => renderUsuarios(),
                microareas: () => renderMicroareas(),
                endemias_admin: () => renderEndemiasAdmin(),
                auditoria: () => renderAuditoria(),
                alertas_admin: () => renderAlertasAdmin(),
                relatorios_admin: () => renderRelatoriosAdmin(),
                sincronizacao: () => renderSincronizacao(),
                dashboard_acs: () => renderDashboardACS(),
                cadastro_familias: () => renderCadastroFamiliasACS(),
                registro_visitas: () => renderRegistroVisitasACS(),
                rotas: () => renderRotasACS(),
                historico_familiar: () => renderHistoricoFamiliarACS(),
                alertas_acs: () => renderAlertasACS(),
                relatorios_acs: () => renderRelatoriosACS(),
                dashboard_ace: () => renderDashboardACE(),
                focos_endemias: () => renderFocosEndemiasACE(),
                registro_vistorias: () => renderRegistroVistoriasACE(),
                alertas_ace: () => renderAlertasACE(),
                relatorios_ace: () => renderRelatoriosACE(),
                perfil: () => renderPerfil(),
                configuracoes: () => renderConfiguracoes()
            };
            
            if (pages[page]) {
                pages[page]();
            } else {
                container.innerHTML = `<div class="card-custom text-center"><i class="fas fa-tools fa-3x text-muted mb-3"></i><h5>Módulo em Construção</h5><p class="text-muted">A tela <strong>${page}</strong> está sendo finalizada.</p></div>`;
            }
            window.scrollTo(0, 0);
        }
        
        // ==================== TELAS ADMINISTRADOR ====================
        
        function renderDashboardAdmin() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-chart-pie me-2"></i>Dashboard Administrativo';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-6 col-md-3"><div class="card-custom"><div class="d-flex justify-content-between align-items-center"><div><h6 class="text-muted small">Cobertura</h6><h2 class="fw-bold fs-2 fs-md-1">94.2%</h2><small class="text-success">+2.4%</small></div><div class="rounded-circle bg-success bg-opacity-10 p-2 p-md-3"><i class="fas fa-users fa-lg fa-md-2x text-success"></i></div></div></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom"><div class="d-flex justify-content-between"><div><h6 class="text-muted small">Visitas Hoje</h6><h2 class="fw-bold fs-2 fs-md-1">1.2k</h2><small class="text-info">+12%</small></div><div class="rounded-circle bg-info bg-opacity-10 p-2 p-md-3"><i class="fas fa-walking fa-lg fa-md-2x text-info"></i></div></div></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom"><div class="d-flex justify-content-between"><div><h6 class="text-muted small">Agentes</h6><h2 class="fw-bold fs-2 fs-md-1">84</h2><small class="text-success">+5</small></div><div class="rounded-circle bg-primary bg-opacity-10 p-2 p-md-3"><i class="fas fa-user-md fa-lg fa-md-2x text-primary"></i></div></div></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom"><div class="d-flex justify-content-between"><div><h6 class="text-muted small">Alertas</h6><h2 class="fw-bold fs-2 fs-md-1 text-danger">14</h2><small>Críticos</small></div><div class="rounded-circle bg-danger bg-opacity-10 p-2 p-md-3"><i class="fas fa-bell fa-lg fa-md-2x text-danger"></i></div></div></div></div>
                </div>
                <div class="row g-3 g-md-4">
                    <div class="col-md-8"><div class="card-custom"><h5 class="fw-bold mb-3">Tendência de Atendimentos</h5><canvas id="trendChart" height="200"></canvas></div></div>
                    <div class="col-md-4"><div class="card-custom"><h5 class="fw-bold mb-3">Alertas Críticos</h5><div class="mb-3 pb-2 border-bottom"><div class="d-flex justify-content-between flex-wrap"><span><i class="fas fa-virus text-danger me-2"></i>Surto Detectado</span><small class="text-danger">12min</small></div><small class="text-muted">Setor Sul - 15 domicílios</small></div><div class="mb-3 pb-2 border-bottom"><div class="d-flex justify-content-between flex-wrap"><span><i class="fas fa-chart-line text-warning me-2"></i>Baixa Produtividade</span><small class="text-warning">2h</small></div><small class="text-muted">Equipe 04 - 60% da meta</small></div><button class="btn btn-outline-custom w-100 mt-2" onclick="loadPage('alertas_admin')">Ver todos →</button></div></div>
                </div>
            `;
            setTimeout(() => {
                const ctx = document.getElementById('trendChart')?.getContext('2d');
                if(ctx) new Chart(ctx, { type: 'line', data: { labels: ['Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'], datasets: [{ label: 'Visitas', data: [42, 48, 52, 47, 55, 38], borderColor: '#00426d', backgroundColor: 'rgba(0,66,109,0.1)', tension: 0.4, fill: true }] } });
            }, 100);
        }
        
        function renderUsuarios() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-users me-2"></i>Gestão de Usuários';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-primary fs-2">142</h3><small>Total</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-success fs-2">12</h3><small>Supervisores</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-info fs-2">130</h3><small>Agentes</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-warning fs-2">3</h3><small>Pendentes</small></div></div>
                </div>
                <div class="card-custom">
                    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-3">
                        <div class="d-flex gap-2 flex-wrap"><input type="text" class="form-control" placeholder="Buscar..." style="border-radius:12px; width:200px;"><select class="form-select" style="border-radius:12px; width:130px;"><option>Todos</option><option>ACS</option><option>ACE</option></select></div>
                        <button class="btn btn-grad" onclick="showUserModal()"><i class="fas fa-plus me-2"></i>Novo Usuário</button>
                    </div>
                    <div class="table-responsive-custom"><table class="table-custom w-100"><thead><tr><th>Profissional</th><th>Cargo</th><th>Área</th><th>Status</th><th>Ações</th></tr></thead><tbody>
                        <tr><td><strong>Ricardo Mendonça</strong><br><small class="text-muted">ricardo.m@saude.gov</small></td><td><span class="badge-status bg-primary-subtle text-primary">SUPERVISOR</span></td><td class="text-muted small">Setor 04</td><td><span class="badge-status bg-success-subtle text-success">Ativo</span></td><td><button class="btn btn-sm btn-light me-1" onclick="editUser('Ricardo')"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-light text-danger" onclick="deleteUser('Ricardo')"><i class="fas fa-trash"></i></button></td></tr>
                        <tr><td><strong>Ana Souza Lima</strong><br><small class="text-muted">ana.lima@saude.gov</small></td><td><span class="badge-status bg-info-subtle text-info">ACS</span></td><td class="text-muted small">Setor 12</td><td><span class="badge-status bg-success-subtle text-success">Ativo</span></td><td><button class="btn btn-sm btn-light me-1" onclick="editUser('Ana')"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-light text-danger" onclick="deleteUser('Ana')"><i class="fas fa-trash"></i></button></td></tr>
                        <tr><td><strong>João Batista</strong><br><small class="text-muted">j.batista@saude.gov</small></td><td><span class="badge-status bg-warning-subtle text-warning">ACE</span></td><td class="text-muted small">Setor 08</td><td><span class="badge-status bg-danger-subtle text-danger">Bloqueado</span></td><td><button class="btn btn-sm btn-light me-1" onclick="editUser('João')"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-light text-danger" onclick="deleteUser('João')"><i class="fas fa-trash"></i></button></td></tr>
                    </tbody></table></div>
                </div>
            `;
        }
        
        function renderMicroareas() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-map-marked-alt me-2"></i>Microáreas';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-4 col-md-4"><div class="card-custom text-center"><h2 class="fw-bold">12</h2><small>Áreas</small></div></div>
                    <div class="col-4 col-md-4"><div class="card-custom text-center"><h2 class="fw-bold text-success">94%</h2><small>Cobertura</small></div></div>
                    <div class="col-4 col-md-4"><div class="card-custom text-center"><h2 class="fw-bold text-warning">1</h2><small>Pendente</small></div></div>
                </div>
                <div class="row g-3 g-md-4">
                    <div class="col-md-6"><div class="card-custom"><div class="d-flex justify-content-between align-items-start flex-wrap"><div><h5>Microárea 01 - Centro</h5><p class="small">População: 1.240 hab | Agente: Maria Souza</p><div class="progress-custom"><div class="progress-bar bg-success" style="width:88%"></div></div><small>88% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="editMicroarea('M01')"><i class="fas fa-edit"></i></button></div></div></div>
                    <div class="col-md-6"><div class="card-custom"><div class="d-flex justify-content-between flex-wrap"><div><h5>Microárea 02 - Encosta</h5><p class="small">População: 850 hab | Agente: João Santos</p><div class="progress-custom"><div class="progress-bar bg-info" style="width:72%"></div></div><small>72% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="editMicroarea('M02')"><i class="fas fa-edit"></i></button></div></div></div>
                    <div class="col-md-6"><div class="card-custom bg-warning bg-opacity-10"><div class="d-flex justify-content-between flex-wrap"><div><h5>⚠️ Microárea 03 - Vale</h5><p class="small">População: 2.100 hab | <span class="text-danger">Sem Agente</span></p><div class="progress-custom"><div class="progress-bar bg-danger" style="width:0%"></div></div><small>0% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="assignAgent('M03')"><i class="fas fa-user-plus"></i></button></div></div></div>
                    <div class="col-md-6"><div class="card-custom"><div class="d-flex justify-content-between flex-wrap"><div><h5>Microárea 04 - Industrial</h5><p class="small">População: 620 hab | Agente: Ana Luiza</p><div class="progress-custom"><div class="progress-bar bg-success" style="width:95%"></div></div><small>95% visitas</small></div><button class="btn btn-sm btn-outline-custom" onclick="editMicroarea('M04')"><i class="fas fa-edit"></i></button></div></div></div>
                </div>
                <div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Criar Nova Microárea</h5><button class="btn btn-grad" onclick="showNewMicroareaModal()"><i class="fas fa-plus me-2"></i>Novo Polígono</button></div></div></div>
            `;
        }
        
        function renderEndemiasAdmin() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-virus me-2"></i>Monitoramento de Endemias';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">124</h2><small>Casos Ativos</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-info">48</h2><small>Visitas Hoje</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">8</h2><small>Focos Críticos</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-success">92%</h2><small>Cobertura</small></div></div>
                </div>
                <div class="row g-3 g-md-4">
                    <div class="col-md-7"><div class="card-custom"><h5>Focos por Região</h5><div class="mb-3"><div class="d-flex justify-content-between"><span>Setor Norte</span><span>75%</span></div><div class="progress-custom mt-1"><div class="progress-bar bg-danger" style="width:75%"></div></div></div><div class="mb-3"><div class="d-flex justify-content-between"><span>Setor Sul</span><span>45%</span></div><div class="progress-custom mt-1"><div class="progress-bar bg-warning" style="width:45%"></div></div></div></div></div>
                    <div class="col-md-5"><div class="card-custom" style="background: linear-gradient(135deg, #00426d, #005a92); color:white;"><h5><i class="fas fa-map-marker-alt me-2"></i>Alerta Vermelho</h5><p class="mb-1 small"><strong>ID: #88291-BA</strong></p><p class="small">Rua das Palmeiras, 452 - Setor Sul</p><button class="btn btn-light btn-sm mt-2 w-100" onclick="delegateIntervention()">Delegar Intervenção</button></div></div>
                </div>
            `;
        }
        
        function renderAuditoria() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-clipboard-list me-2"></i>Auditoria';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold">1.284</h2><small>Visitas</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">42</h2><small>Revisão</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold">8.4/dia</h2><small>Média</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-success">94%</h2><small>Eficiência</small></div></div>
                </div>
                <div class="row g-3 g-md-4">
                    <div class="col-md-6"><div class="card-custom"><h5>Timeline - Marcos Silva</h5><div class="mt-3"><div class="border-start border-3 border-success ps-3 pb-3"><small class="text-success">08:45</small><p class="mb-0 small"><strong>Residência #402</strong><br>Biometria verificada ✅</p></div><div class="border-start border-3 border-warning ps-3 pb-3"><small class="text-warning">09:12</small><p class="mb-0 small"><strong>Escola Municipal</strong><br>⚠️ Divergência de localização</p><button class="btn btn-sm btn-outline-warning mt-1" onclick="requestReview()">Revisar</button></div></div></div></div>
                    <div class="col-md-6"><div class="card-custom"><h5>Performance</h5><div class="table-responsive-custom"><table class="table-custom w-100"><thead><tr><th>Agente</th><th>Eficiência</th><th>Status</th></tr></thead><tbody><tr><td>Liana Mendes</td><td>98%</td><td><span class="badge-status bg-success-subtle text-success">EXEMPLAR</span></td></tr><tr><td>Marcos Silva</td><td>84%</td><td><span class="badge-status bg-warning-subtle text-warning">AUDITANDO</span></td></tr></tbody></table></div></div></div>
                </div>
            `;
        }
        
        function renderAlertasAdmin() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-bell me-2"></i>Central de Alertas';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">12</h2><small>Urgência Alta</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">8</h2><small>Suspeitos</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-info">5</h2><small>Medicação</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">3</h2><small>Emergências</small></div></div>
                </div>
                <div class="card-custom mb-3 border-start border-4 border-danger"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-danger">🚨 Parada Cardiorrespiratória</h6><small>2min</small></div><p class="small">Agente: Carlos Silva • Micro-área 04<br>Paciente idoso, 78 anos, desacordado.</p><button class="btn btn-danger btn-sm" onclick="contactAgent()">Contatar</button></div>
                <div class="card-custom border-start border-4 border-warning"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-warning">⚠️ Suspeita de Dengue</h6><small>15min</small></div><p class="small">Gestante com sintomas • Micro-área 12</p><button class="btn btn-warning btn-sm" onclick="monitorCase()">Monitorar</button></div>
            `;
        }
        
        function renderRelatoriosAdmin() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-file-alt me-2"></i>Relatórios';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4">
                    <div class="col-md-6"><div class="card-custom"><h5>Configurar Exportação</h5><select class="form-select mb-3"><option>UBS Central</option></select><select class="form-select mb-3"><option>Todas as Microáreas</option></select><hr><div class="d-flex gap-2 flex-wrap"><button class="btn btn-outline-custom btn-sm" onclick="exportReport('PDF')">PDF</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('Excel')">Excel</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('XML')">XML</button></div></div></div>
                    <div class="col-md-6"><div class="card-custom"><h5>Exportações Recentes</h5><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>📄 Boletim Mensal</span><span>Hoje 14:20</span><button class="btn btn-sm btn-light" onclick="downloadReport()">⬇️</button></div><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>📊 Produção</span><span>Hoje 09:15</span><button class="btn btn-sm btn-light" onclick="downloadReport()">⬇️</button></div></div></div>
                </div>
            `;
        }
        
        function renderSincronizacao() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-cloud-upload-alt me-2"></i>Sincronização';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4">
                    <div class="col-md-5"><div class="card-custom text-center"><i class="fas fa-cloud-upload-alt fa-3x text-primary mb-3"></i><h3>12 Registros</h3><p>320kb aguardando</p><button class="btn btn-grad w-100" onclick="syncNow()">Sincronizar</button><div class="mt-3"><small>Modo Offline: <strong class="text-success">Ativo</strong></small></div></div></div>
                    <div class="col-md-7"><div class="card-custom"><h5>Últimas Sincronizações</h5><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>✅ Hoje, 08:12</span><span>42 registros</span></div><div class="d-flex justify-content-between py-2 border-bottom flex-wrap"><span>✅ Ontem, 17:45</span><span>156 registros</span></div></div></div>
                </div>
            `;
        }
        
        // ==================== TELAS ACS ====================
        
        function renderDashboardACS() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-tachometer-alt me-2"></i>Bem-vindo, ' + user.nome;
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-md-4"><div class="card-custom"><h6>Meta Mensal</h6><h2 class="fw-bold">84%</h2><div class="progress-custom"><div class="progress-bar bg-success" style="width:84%"></div></div><small>168 de 200 visitas</small></div></div>
                    <div class="col-md-4"><div class="card-custom"><h6>Rota Otimizada</h6><h2 class="fw-bold text-success">-12.4 km</h2><small>Economia hoje</small></div></div>
                    <div class="col-md-4"><div class="card-custom"><h6>Próxima Visita</h6><p class="mb-0"><strong>Família Silva</strong><br>Setor 4 • 14:30</p><button class="btn btn-grad btn-sm mt-2 w-100" onclick="startVisit()">Iniciar</button></div></div>
                </div>
                <div class="row g-3 g-md-4">
                    <div class="col-md-6"><div class="card-custom"><h5>Atividades Recentes</h5><div class="py-2 border-bottom"><small>09:45</small><p>✅ Visita Concluída - Família Oliveira</p></div><div class="py-2"><small>Ontem</small><p>⚠️ Alerta - Maria Santos</p></div></div></div>
                    <div class="col-md-6"><div class="card-custom"><h5>Sincronização</h5><div class="text-center py-3"><i class="fas fa-sync-alt fa-2x text-primary mb-2"></i><p>12 formulários pendentes</p><button class="btn btn-grad btn-sm" onclick="syncNow()">Sincronizar</button></div></div></div>
                </div>
            `;
        }
        
        function renderCadastroFamiliasACS() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-home me-2"></i>Famílias';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold">142</h2><small>Famílias</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-success">8</h2><small>Gestantes</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-danger">12</h2><small>Alto Risco</small></div></div>
                    <div class="col-6 col-md-3"><div class="card-custom text-center"><h2 class="fw-bold text-warning">24</h2><small>Pendentes</small></div></div>
                </div>
                <div class="card-custom">
                    <div class="d-flex flex-column flex-sm-row justify-content-between mb-4 gap-3">
                        <input type="text" class="form-control" placeholder="Buscar família..." style="border-radius:12px; max-width:250px;">
                        <button class="btn btn-grad" onclick="showFamilyModal()"><i class="fas fa-plus me-2"></i>Nova Família</button>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6"><div class="border rounded-3 p-3"><div class="d-flex justify-content-between flex-wrap"><strong>👨‍👩‍👧‍👦 Família Silva Oliveira</strong><span class="badge bg-success">Em dia</span></div><p class="small mb-1">Rua das Palmeiras, 402 • 5 integrantes</p><button class="btn btn-sm btn-outline-custom mt-2" onclick="viewFamilyDetails()">Ver →</button></div></div>
                        <div class="col-md-6"><div class="border rounded-3 p-3"><div class="d-flex justify-content-between flex-wrap"><strong>👵 Família Santos Dumont</strong><span class="badge bg-warning">Pendente</span></div><p class="small mb-1">Av. Central, 1205 • 3 integrantes</p><button class="btn btn-sm btn-outline-custom mt-2" onclick="viewFamilyDetails()">Ver →</button></div></div>
                    </div>
                </div>
            `;
        }
        
        function renderRegistroVisitasACS() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-calendar-check me-2"></i>Visitas';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4">
                    <div class="col-md-6"><div class="card-custom"><h5>Rota do Dia</h5><div id="visitMap" style="height: 250px; border-radius: 16px; margin-bottom: 16px;"></div><div class="p-3 bg-light rounded-3 mb-3"><div class="d-flex justify-content-between flex-wrap align-items-center"><div><strong>📍 Próxima: Rua das Flores, 120</strong><br><span class="badge bg-warning">Hipertenso</span></div><button class="btn btn-grad btn-sm" onclick="startVisit()">Iniciar</button></div></div><div><div class="d-flex justify-content-between py-2 flex-wrap"><span>10:30</span><strong>Família Oliveira</strong><button class="btn btn-sm btn-light" onclick="viewVisitDetails()">Detalhes</button></div></div></div></div>
                    <div class="col-md-6"><div class="card-custom"><h5>Resumo do Dia</h5><div class="d-flex justify-content-between mb-2"><span>Realizadas:</span><strong class="text-success">04</strong></div><div class="d-flex justify-content-between mb-3"><span>Pendentes:</span><strong class="text-warning">06</strong></div><div class="progress-custom mb-3"><div class="progress-bar bg-success" style="width:40%"></div></div><button class="btn btn-outline-custom w-100" onclick="openNavigation()"><i class="fas fa-directions me-2"></i>Navegação</button></div></div>
                </div>
            `;
            setTimeout(() => {
                const map = L.map('visitMap').setView([-23.5505, -46.6333], 13);
                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', { attribution: '© OpenStreetMap' }).addTo(map);
                L.marker([-23.5505, -46.6333]).addTo(map).bindPopup('Rua das Flores, 120');
            }, 100);
        }
        
        function renderRotasACS() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-route me-2"></i>Minhas Rotas';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4">
                    <div class="col-md-8"><div class="card-custom"><h5>Mapa de Rotas</h5><div id="routesMap" style="height: 350px; border-radius: 16px;"></div></div></div>
                    <div class="col-md-4"><div class="card-custom"><h5>Rota Otimizada</h5><div class="alert alert-success small"><i class="fas fa-check-circle me-2"></i>Economia de 12.4km</div><div class="list-group list-group-flush"><div class="list-group-item px-0">1. Família Silva - 650m</div><div class="list-group-item px-0">2. Família Oliveira - 1.2km</div></div><button class="btn btn-grad w-100 mt-3" onclick="optimizeRoute()">Recalcular</button></div></div>
                </div>
            `;
            setTimeout(() => {
                const map = L.map('routesMap').setView([-23.5505, -46.6333], 13);
                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', { attribution: '© OpenStreetMap' }).addTo(map);
                L.marker([-23.5505, -46.6333]).addTo(map);
                L.marker([-23.545, -46.638]).addTo(map);
            }, 100);
        }
        
        function renderHistoricoFamiliarACS() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-history me-2"></i>Histórico';
            document.getElementById('pageContent').innerHTML = `
                <div class="card-custom">
                    <div class="d-flex gap-2 mb-4 flex-wrap"><select class="form-select w-auto"><option>Família Silva Oliveira</option></select><button class="btn btn-outline-custom btn-sm" onclick="filterHistory()">Filtrar</button></div>
                    <div class="border-start border-3 border-primary ps-3 pb-3"><small>15 OUT, 2023 • 14:30</small><h6>Família Silva Oliveira</h6><p class="small">PA: 120/80, 78.5kg. Medicação mantida.</p></div>
                    <div class="border-start border-3 border-danger ps-3 pb-3"><small>12 OUT, 2023 • 09:15</small><h6>Família Souza Santos</h6><p class="small">⚠️ Crise hipoglicêmica. Encaminhado para UPA.</p></div>
                </div>
            `;
        }
        
        function renderAlertasACS() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Alertas';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4"><div class="col-4"><div class="card-custom text-center"><h2 class="text-danger">3</h2><small>Críticos</small></div></div><div class="col-4"><div class="card-custom text-center"><h2>12</h2><small>Acompanhar</small></div></div><div class="col-4"><div class="card-custom text-center"><h2>45</h2><small>Concluídos</small></div></div></div>
                <div class="card-custom border-start border-4 border-danger mb-3"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-danger">🚨 Crise Hipertensiva</h6><small>AGORA</small></div><p class="small">PA 190/110 mmHg. Rua das Flores, 123</p><div><button class="btn btn-danger btn-sm me-2" onclick="callEmergency()">Emergência</button><button class="btn btn-outline-danger btn-sm" onclick="openMap()">Mapa</button></div></div>
                <div class="card-custom border-start border-4 border-warning"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-warning">⚠️ Atraso de Medicação</h6><small>15min</small></div><p class="small">Insulina NPH não confirmada</p><button class="btn btn-warning btn-sm" onclick="recordMedication()">Registrar</button></div>
            `;
        }
        
        function renderRelatoriosACS() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-chart-line me-2"></i>Relatórios';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4">
                    <div class="col-md-6"><div class="card-custom text-center"><h2>124</h2><small>Visitas</small><span class="text-success d-block">+12%</span></div></div>
                    <div class="col-md-6"><div class="card-custom text-center"><h2>80%</h2><small>Meta</small><div class="progress-custom mt-2"><div class="progress-bar bg-info" style="width:80%"></div></div></div></div>
                </div>
                <div class="row mt-4"><div class="col-12"><div class="card-custom"><h5>Exportar</h5><div class="d-flex gap-2 flex-wrap"><button class="btn btn-outline-custom btn-sm" onclick="exportReport('PDF')">PDF</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('Excel')">Excel</button></div></div></div></div>
            `;
        }
        
        // ==================== TELAS ACE ====================
        
        function renderDashboardACE() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-tachometer-alt me-2"></i>Endemias';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-4"><div class="card-custom text-center"><h2 class="text-danger">124</h2><small>Focos</small></div></div>
                    <div class="col-4"><div class="card-custom text-center"><h2>48</h2><small>Vistorias</small></div></div>
                    <div class="col-4"><div class="card-custom text-center"><h2 class="text-warning">8</h2><small>Alto Risco</small></div></div>
                </div>
                <div class="card-custom mb-3" style="background: linear-gradient(135deg, #dc2626, #b91c1c); color:white;"><h5>🚨 ALERTA: Foco Crítico</h5><p class="small">Rua das Palmeiras, 452</p><button class="btn btn-light btn-sm" onclick="delegateIntervention()">Intervir</button></div>
                <div class="row g-3 g-md-4"><div class="col-md-6"><div class="card-custom"><h5>Evidências</h5><div class="d-flex gap-2 flex-wrap"><span class="badge bg-danger">Foco #843</span><span class="badge bg-secondary">Foco #842</span></div></div></div><div class="col-md-6"><div class="card-custom"><h5>Ações</h5><button class="btn btn-grad w-100 mb-2" onclick="allocateTeam()">Alocar Equipe</button><button class="btn btn-outline-custom w-100" onclick="createOrder()">Nova Ordem</button></div></div></div>
            `;
        }
        
        function renderFocosEndemiasACE() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-biohazard me-2"></i>Focos';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4">
                    <div class="col-4"><div class="card-custom text-center"><h2 class="text-danger">8</h2><small>Críticos</small></div></div>
                    <div class="col-4"><div class="card-custom text-center"><h2 class="text-warning">15</h2><small>Moderados</small></div></div>
                    <div class="col-4"><div class="card-custom text-center"><h2 class="text-success">42</h2><small>Baixos</small></div></div>
                </div>
                <div class="card-custom mb-3"><div id="focosMap" style="height: 250px; border-radius: 16px;"></div></div>
                <div class="card-custom"><div class="table-responsive-custom"><table class="table-custom w-100"><thead><tr><th>ID</th><th>Local</th><th>Risco</th><th>Ação</th></tr></thead><tbody><tr><td>#843</td><td>Rua das Palmeiras</td><td><span class="badge-risk-high">CRÍTICO</span></td><td><button class="btn btn-sm btn-outline-custom" onclick="viewFocusDetails()">Ver</button></td></tr><tr><td>#842</td><td>Av. Central</td><td><span class="badge-risk-mid">MODERADO</span></td><td><button class="btn btn-sm btn-outline-custom" onclick="viewFocusDetails()">Ver</button></td></tr></tbody></table></div></div>
            `;
            setTimeout(() => {
                const map = L.map('focosMap').setView([-23.5505, -46.6333], 13);
                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', { attribution: '© OpenStreetMap' }).addTo(map);
                L.marker([-23.5505, -46.6333]).addTo(map).bindPopup('Foco #843');
            }, 100);
        }
        
        function renderRegistroVistoriasACE() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-search me-2"></i>Vistorias';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4">
                    <div class="col-md-6"><div class="card-custom"><h5>Próximas Vistorias</h5><div class="p-3 bg-light rounded-3 mb-3"><strong>📍 Rua das Flores, 120</strong><br><span class="badge bg-danger">URGENTE</span><br><button class="btn btn-grad btn-sm mt-2" onclick="startInspection()">Iniciar</button></div><div class="list-group"><div class="list-group-item d-flex justify-content-between flex-wrap"><span>10:30</span><span>Av. Central, 450</span><button class="btn btn-sm btn-light" onclick="scheduleInspection()">Agendar</button></div></div></div></div>
                    <div class="col-md-6"><div class="card-custom"><h5>Registrar Vistoria</h5><form><div class="mb-2"><input type="text" class="form-control" placeholder="Endereço"></div><div class="mb-2"><select class="form-select"><option>Dengue</option><option>Zika</option></select></div><div class="mb-2"><input type="file" class="form-control" accept="image/*"></div><button type="button" class="btn btn-grad w-100" onclick="registerInspection()">Registrar</button></form></div></div>
                </div>
            `;
        }
        
        function renderAlertasACE() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-exclamation-triangle me-2"></i>Alertas';
            document.getElementById('pageContent').innerHTML = `
                <div class="card-custom border-start border-4 border-danger mb-3"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-danger">🚨 Suspeita de Zika</h6><small>12min</small></div><p class="small">Gestante com sintomas • Micro-área 042</p><button class="btn btn-danger btn-sm" onclick="prioritizeInspection()">Priorizar</button></div>
                <div class="card-custom border-start border-4 border-warning"><div class="d-flex justify-content-between flex-wrap"><h6 class="text-warning">⚠️ Risco Ambiental</h6><small>2h</small></div><p class="small">Aumento de 40% no risco no Setor Sul</p><button class="btn btn-warning btn-sm" onclick="viewHeatMap()">Mapa de Calor</button></div>
            `;
        }
        
        function renderRelatoriosACE() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-chart-line me-2"></i>Relatórios';
            document.getElementById('pageContent').innerHTML = `
                <div class="row g-3 g-md-4 mb-4"><div class="col-md-6"><div class="card-custom text-center"><h2>87%</h2><small>Vistorias</small><div class="progress-custom mt-2"><div class="progress-bar bg-success" style="width:87%"></div></div></div></div><div class="col-md-6"><div class="card-custom text-center"><h2 class="text-success">142</h2><small>Focos Eliminados</small></div></div></div>
                <div class="card-custom"><h5>Exportar</h5><div class="d-flex gap-2 flex-wrap"><button class="btn btn-outline-custom btn-sm" onclick="exportReport('PDF')">PDF</button><button class="btn btn-outline-custom btn-sm" onclick="exportReport('Excel')">Excel</button></div></div>
            `;
        }
        
        // ==================== COMUNS ====================
        
        function renderPerfil() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-user me-2"></i>Perfil';
            document.getElementById('pageContent').innerHTML = `
                <div class="card-custom" style="max-width:500px; margin:0 auto;"><div class="text-center"><i class="fas fa-user-circle fa-4x text-primary mb-3"></i><h4>${user.nome}</h4><p class="text-muted small">${user.funcao === 'administrador' ? 'Administrador' : (user.funcao === 'acs' ? 'Agente ACS' : 'Agente ACE')}</p></div><hr><p><i class="fas fa-envelope me-2"></i> ${user.email || 'usuario@saude.gov.br'}</p><p><i class="fas fa-phone me-2"></i> (11) 98765-4321</p><button class="btn btn-outline-custom w-100 mt-3" onclick="editProfile()">Editar</button></div>
            `;
        }
        
        function renderConfiguracoes() {
            document.getElementById('pageTitle').innerHTML = '<i class="fas fa-cog me-2"></i>Configurações';
            document.getElementById('pageContent').innerHTML = `
                <div class="card-custom" style="max-width:600px; margin:0 auto;"><h5>Preferências</h5><div class="d-flex justify-content-between align-items-center py-2 border-bottom"><span><i class="fas fa-moon me-2"></i>Modo Escuro</span><div class="form-check form-switch"><input class="form-check-input" type="checkbox"></div></div><div class="d-flex justify-content-between align-items-center py-2 border-bottom"><span><i class="fas fa-bell me-2"></i>Notificações</span><div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked></div></div><hr><button class="btn btn-outline-custom w-100 mb-2" onclick="changePassword()">Alterar Senha</button><button class="btn btn-outline-danger w-100" onclick="logout()">Sair</button></div>
            `;
        }
        
        // ==================== MODAIS ====================
        
        function showUserModal() {
            const modal = new bootstrap.Modal(document.getElementById('genericModal'));
            document.getElementById('modalTitle').innerHTML = '<i class="fas fa-user-plus me-2"></i>Novo Usuário';
            document.getElementById('modalBody').innerHTML = `
                <form><div class="mb-3"><label class="form-label">Nome</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">E-mail</label><input type="email" class="form-control"></div><div class="mb-3"><label class="form-label">Função</label><select class="form-select"><option>ACS</option><option>ACE</option></select></div></form>
            `;
            document.getElementById('modalFooter').innerHTML = '<button class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-grad" onclick="saveUser()">Salvar</button>';
            modal.show();
        }
        
        function showFamilyModal() {
            const modal = new bootstrap.Modal(document.getElementById('genericModal'));
            document.getElementById('modalTitle').innerHTML = '<i class="fas fa-home me-2"></i>Nova Família';
            document.getElementById('modalBody').innerHTML = `
                <form><div class="mb-3"><label class="form-label">Responsável</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">Endereço</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">Integrantes</label><input type="number" class="form-control"></div></form>
            `;
            document.getElementById('modalFooter').innerHTML = '<button class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-grad" onclick="saveFamily()">Cadastrar</button>';
            modal.show();
        }
        
        function showNewMicroareaModal() {
            const modal = new bootstrap.Modal(document.getElementById('genericModal'));
            document.getElementById('modalTitle').innerHTML = '<i class="fas fa-draw-polygon me-2"></i>Nova Microárea';
            document.getElementById('modalBody').innerHTML = `
                <form><div class="mb-3"><label class="form-label">Nome</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">Agente</label><select class="form-select"><option>Maria Souza</option></select></div></form>
            `;
            document.getElementById('modalFooter').innerHTML = '<button class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-grad" onclick="saveMicroarea()">Criar</button>';
            modal.show();
        }
        
        // ==================== FUNÇÕES AUXILIARES ====================
        
        function syncNow() { alert("🔄 Sincronização iniciada!"); }
        function exportReport() { alert("📄 Relatório exportado!"); }
        function downloadReport() { alert("⬇️ Download iniciado!"); }
        function delegateIntervention() { alert("✅ Intervenção delegada!"); }
        function contactAgent() { alert("📞 Contatando agente..."); }
        function monitorCase() { alert("🔍 Caso em monitoramento."); }
        function callEmergency() { alert("🚑 Chamando SAMU 192..."); }
        function openMap() { alert("🗺️ Abrindo mapa."); }
        function startVisit() { alert("🚀 Iniciando visita!"); }
        function registerInspection() { alert("✅ Vistoria registrada!"); }
        function changePassword() { alert("🔐 Alterar senha"); }
        function editProfile() { alert("✏️ Editar perfil"); }
        function viewFamilyDetails() { alert("📋 Detalhes da família"); }
        function viewVisitDetails() { alert("📋 Detalhes da visita"); }
        function openNavigation() { alert("🗺️ Abrindo navegação"); }
        function optimizeRoute() { alert("🔄 Rota recalculada!"); }
        function prioritizeInspection() { alert("⚠️ Vistoria priorizada!"); }
        function viewHeatMap() { alert("🌡️ Mapa de calor"); }
        function allocateTeam() { alert("👥 Alocando equipe"); }
        function createOrder() { alert("📋 Ordem criada"); }
        function viewFocusDetails() { alert("🔍 Detalhes do foco"); }
        function startInspection() { alert("🔍 Iniciando vistoria"); }
        function scheduleInspection() { alert("📅 Vistoria agendada"); }
        function recordMedication() { alert("💊 Medicamento registrado"); }
        function requestReview() { alert("📋 Revisão solicitada"); }
        function saveUser() { alert("✅ Usuário salvo!"); document.querySelector('#genericModal .btn-close').click(); }
        function saveFamily() { alert("✅ Família salva!"); document.querySelector('#genericModal .btn-close').click(); }
        function saveMicroarea() { alert("✅ Microárea criada!"); document.querySelector('#genericModal .btn-close').click(); }
        function editUser() { alert("✏️ Editando usuário"); }
        function deleteUser() { if(confirm("Excluir?")) alert("🗑️ Usuário excluído"); }
        function editMicroarea() { alert("✏️ Editando microárea"); }
        function assignAgent() { alert("👤 Atribuindo agente"); }
        function filterHistory() { alert("🔍 Filtrando histórico"); }
        
        renderMenu();
        const initialPage = user.funcao === 'administrador' ? 'dashboard_admin' : (user.funcao === 'acs' ? 'dashboard_acs' : 'dashboard_ace');
        loadPage(initialPage);
        
        // Ajustar no resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 992) {
                document.getElementById('sidebar').classList.remove('mobile-open');
                document.getElementById('sidebarOverlay').style.display = 'none';
            }
        });
    </script>
</body>
</html>
