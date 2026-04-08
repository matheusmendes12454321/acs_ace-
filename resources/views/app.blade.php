<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>ACS/ACE - Sistema de Saúde</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Inter', sans-serif; background: #f0f2f5; }
        
        /* Sidebar - Estilo Governo */
        .sidebar {
            position: fixed; left: 0; top: 0; width: 280px; height: 100%;
            background: linear-gradient(135deg, #0066b3 0%, #003d6b 100%);
            color: white; transition: all 0.3s; z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar-header { padding: 30px 25px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-header i { font-size: 48px; margin-bottom: 10px; }
        .sidebar-header h3 { font-size: 20px; font-weight: 600; }
        .sidebar-header p { font-size: 12px; opacity: 0.8; }
        .sidebar-menu { padding: 20px 0; }
        .sidebar-menu .nav-link {
            display: flex; align-items: center; padding: 14px 25px;
            color: rgba(255,255,255,0.85); text-decoration: none; transition: 0.3s;
            border-left: 3px solid transparent; cursor: pointer; font-size: 14px;
        }
        .sidebar-menu .nav-link:hover, .sidebar-menu .nav-link.active {
            background: rgba(255,255,255,0.1); color: white; border-left-color: #00a8ff;
        }
        .sidebar-menu .nav-link i { width: 28px; margin-right: 12px; font-size: 18px; }
        .sidebar-footer {
            position: absolute; bottom: 0; left: 0; width: 100%; padding: 20px 25px;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        .sidebar-footer .user-info { display: flex; align-items: center; gap: 12px; margin-bottom: 15px; }
        .sidebar-footer .user-avatar {
            width: 45px; height: 45px; background: rgba(255,255,255,0.2);
            border-radius: 12px; display: flex; align-items: center; justify-content: center;
            font-weight: bold; font-size: 18px;
        }
        .sidebar-footer .user-name { font-weight: 600; font-size: 14px; }
        .sidebar-footer .user-role { font-size: 11px; opacity: 0.7; }
        .btn-logout {
            width: 100%; background: rgba(220,53,69,0.8); border: none; padding: 10px;
            border-radius: 10px; color: white; cursor: pointer; transition: 0.3s;
            font-weight: 600;
        }
        .btn-logout:hover { background: #dc3545; }
        
        /* Main Content */
        .main-content { margin-left: 280px; min-height: 100vh; }
        .top-bar {
            background: white; padding: 15px 30px; display: flex; justify-content: space-between;
            align-items: center; box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky; top: 0; z-index: 99;
        }
        .page-title h3 { margin: 0; font-size: 20px; font-weight: 600; color: #1a3a4f; }
        .page-title p { margin: 0; font-size: 13px; color: #6c757d; }
        .content-area { padding: 30px; }
        
        /* Cards Estatísticos */
        .stat-card {
            background: white; border-radius: 20px; padding: 20px; margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); transition: 0.3s; cursor: pointer;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .stat-card:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .stat-icon {
            width: 55px; height: 55px; border-radius: 15px; display: flex; align-items: center;
            justify-content: center; font-size: 28px; margin-bottom: 15px;
        }
        .stat-info h3 { font-size: 32px; font-weight: 700; margin: 0; color: #1a3a4f; }
        .stat-info p { margin: 0; color: #6c757d; font-size: 13px; font-weight: 500; }
        
        /* Data Card */
        .data-card {
            background: white; border-radius: 20px; padding: 20px; margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .data-card-header {
            display: flex; justify-content: space-between; align-items: center;
            margin-bottom: 20px; padding-bottom: 15px; border-bottom: 1px solid #e9ecef;
        }
        .btn-primary-custom {
            background: linear-gradient(135deg, #0066b3 0%, #004d8c 100%);
            border: none; padding: 10px 24px; border-radius: 12px; color: white;
            cursor: pointer; transition: 0.3s; font-weight: 500; font-size: 14px;
        }
        .btn-primary-custom:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,102,179,0.3); }
        .btn-success-custom {
            background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
            border: none; padding: 8px 16px; border-radius: 10px; color: white;
            cursor: pointer; font-size: 12px;
        }
        
        /* Tabelas */
        table { width: 100%; }
        th { padding: 12px 15px; text-align: left; background: #f8f9fa; font-weight: 600; font-size: 13px; color: #495057; }
        td { padding: 12px 15px; border-bottom: 1px solid #e9ecef; font-size: 14px; }
        
        /* Modais */
        .modal-custom {
            display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.5); justify-content: center; align-items: center;
            z-index: 2000;
        }
        .modal-content-custom {
            background: white; border-radius: 24px; padding: 30px;
            width: 550px; max-width: 90%; animation: modalFade 0.3s ease;
            max-height: 90vh; overflow-y: auto;
        }
        @keyframes modalFade {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .form-control, .form-select {
            width: 100%; padding: 12px 14px; margin-bottom: 15px;
            border: 1px solid #dee2e6; border-radius: 12px; font-size: 14px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0066b3; outline: none; box-shadow: 0 0 0 3px rgba(0,102,179,0.1);
        }
        
        /* Badges */
        .badge { padding: 5px 12px; border-radius: 20px; font-size: 11px; font-weight: 600; }
        .badge-success { background: #d4edda; color: #155724; }
        .badge-warning { background: #fff3cd; color: #856404; }
        .badge-danger { background: #f8d7da; color: #721c24; }
        .badge-info { background: #d1ecf1; color: #0c5460; }
        .badge-primary { background: #cce5ff; color: #004085; }
        
        /* Alertas e Notificações */
        .alert-item {
            background: #f8f9fa; border-radius: 14px; padding: 15px; margin-bottom: 10px;
            border-left: 4px solid; transition: 0.3s; cursor: pointer;
        }
        .alert-item:hover { transform: translateX(5px); background: white; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        
        .notification-badge {
            position: absolute; top: -5px; right: -5px; background: #dc3545;
            color: white; border-radius: 50%; width: 18px; height: 18px;
            font-size: 10px; display: flex; align-items: center; justify-content: center;
        }
        
        /* Offline Indicator */
        .offline-indicator {
            position: fixed; bottom: 20px; right: 20px; background: #ffc107;
            color: #333; padding: 8px 15px; border-radius: 20px; font-size: 12px;
            font-weight: 600; z-index: 1000; display: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }
        
        /* Mapa */
        .map-container { height: 450px; width: 100%; border-radius: 15px; margin-bottom: 15px; z-index: 1; }
        
        /* Calendário */
        .calendar-grid {
            display: grid; grid-template-columns: repeat(7, 1fr); gap: 8px; margin-top: 15px;
        }
        .calendar-day {
            background: white; border-radius: 12px; padding: 12px 8px; text-align: center;
            cursor: pointer; transition: 0.3s; border: 1px solid #e9ecef;
        }
        .calendar-day:hover { background: #0066b3; color: white; transform: scale(1.05); }
        .calendar-day.agendado { background: #0066b3; color: white; }
        .calendar-day.hoje { border: 2px solid #0066b3; }
        
        /* Busca */
        .search-input { position: relative; }
        .search-input i { position: absolute; left: 15px; top: 14px; color: #6c757d; }
        .search-input input { padding-left: 40px; }
        
        /* Botões grandes para mobile */
        .btn-large {
            padding: 14px 20px; font-size: 16px; border-radius: 14px;
        }
        
        @media (max-width: 768px) {
            .sidebar { transform: translateX(-100%); }
            .main-content { margin-left: 0; }
            .menu-toggle { display: block; }
            .stat-info h3 { font-size: 24px; }
        }
        .menu-toggle {
            display: none; background: #0066b3; border: none; color: white;
            padding: 10px 15px; border-radius: 10px; cursor: pointer;
        }
        
        /* Loading */
        .loading-overlay {
            position: fixed; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0,0,0,0.7); display: none; justify-content: center;
            align-items: center; z-index: 9999;
        }
        .loading-spinner {
            width: 50px; height: 50px; border: 4px solid #f3f3f3;
            border-top: 4px solid #0066b3; border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    </style>
</head>
<body>
    <div class="loading-overlay" id="loadingOverlay"><div class="loading-spinner"></div></div>
    <div class="offline-indicator" id="offlineIndicator"><i class="fas fa-wifi"></i> Modo Offline - Dados serão sincronizados</div>
    
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-heartbeat"></i>
            <h3>ACS/ACE</h3>
            <p>Sistema de Saúde</p>
        </div>
        <div class="sidebar-menu" id="sidebarMenu"></div>
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar" id="userAvatar">A</div>
                <div>
                    <div class="user-name" id="userName">Carregando...</div>
                    <div class="user-role" id="userRole"></div>
                </div>
            </div>
            <button class="btn-logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Sair</button>
        </div>
    </div>
    
    <div class="main-content">
        <div class="top-bar">
            <button class="menu-toggle" onclick="document.getElementById('sidebar').classList.toggle('show')">
                <i class="fas fa-bars"></i>
            </button>
            <div class="page-title">
                <h3 id="pageTitle">Dashboard</h3>
                <p id="pageSubtitle">Visão geral do sistema</p>
            </div>
            <div class="d-flex gap-3 align-items-center">
                <div id="syncStatus" style="cursor:pointer" onclick="sincronizarOffline()" title="Sincronizar dados">
                    <i class="fas fa-cloud-upload-alt fa-lg"></i>
                </div>
                <div id="notificationIcon" style="position:relative;cursor:pointer" onclick="carregarNotificacoes()">
                    <i class="fas fa-bell fa-lg"></i>
                    <span id="notificationCount" class="notification-badge" style="display:none">0</span>
                </div>
                <span id="topUserName"></span>
            </div>
        </div>
        <div class="content-area" id="contentArea"></div>
    </div>
    
    <script>
        let currentUser = null;
        let mapInstance = null;
        let offlineQueue = [];
        
        function showLoading(show) { document.getElementById('loadingOverlay').style.display = show ? 'flex' : 'none'; }
        
        function checkOnlineStatus() {
            const indicator = document.getElementById('offlineIndicator');
            if (!navigator.onLine) {
                indicator.style.display = 'block';
            } else {
                indicator.style.display = 'none';
                sincronizarOffline();
            }
        }
        
        async function sincronizarOffline() {
            if (!navigator.onLine) return;
            const offlineData = JSON.parse(localStorage.getItem('offlineData') || '[]');
            if (offlineData.length === 0) return;
            showLoading(true);
            for (const item of offlineData) {
                try {
                    await apiRequest(item.url, item.method, item.data);
                } catch(e) { console.error('Sync failed:', e); }
            }
            localStorage.setItem('offlineData', '[]');
            showLoading(false);
            alert('Dados sincronizados com sucesso!');
            carregarPagina('dashboard');
        }
        
        function saveOffline(url, method, data) {
            let offline = JSON.parse(localStorage.getItem('offlineData') || '[]');
            offline.push({ url, method, data, timestamp: new Date() });
            localStorage.setItem('offlineData', JSON.stringify(offline));
            alert('Dados salvos offline. Serão sincronizados quando houver internet.');
        }
        
        function logout() { localStorage.removeItem('user'); window.location.href = '/login'; }
        
        async function apiRequest(url, method = 'GET', data = null) {
            const options = { method, headers: { 'Content-Type': 'application/json' } };
            if (data) options.body = JSON.stringify(data);
            if (!navigator.onLine && method !== 'GET') {
                saveOffline(url, method, data);
                return { success: true, offline: true };
            }
            const response = await fetch(url, options);
            return response.json();
        }
        
        function carregarMenu() {
            let menuHtml = '';
            if (currentUser.funcao === 'admin') {
                menuHtml = `
                    <div class="nav-link active" onclick="carregarPagina('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</div>
                    <div class="nav-link" onclick="carregarPagina('agentes')"><i class="fas fa-users"></i> Agentes</div>
                    <div class="nav-link" onclick="carregarPagina('microareas')"><i class="fas fa-map-marker-alt"></i> Microáreas</div>
                    <div class="nav-link" onclick="carregarPagina('familias')"><i class="fas fa-home"></i> Famílias</div>
                    <div class="nav-link" onclick="carregarPagina('visitas')"><i class="fas fa-calendar-check"></i> Visitas</div>
                    <div class="nav-link" onclick="carregarPagina('agenda')"><i class="fas fa-calendar-alt"></i> Agenda</div>
                    <div class="nav-link" onclick="carregarPagina('mapa')"><i class="fas fa-map"></i> Mapa de Focos</div>
                    <div class="nav-link" onclick="carregarPagina('focos')"><i class="fas fa-bug"></i> Focos</div>
                    <div class="nav-link" onclick="carregarPagina('relatorios')"><i class="fas fa-chart-line"></i> Relatórios</div>
                    <div class="nav-link" onclick="carregarPagina('alertas')"><i class="fas fa-exclamation-triangle"></i> Alertas</div>`;
            } else if (currentUser.funcao === 'supervisor') {
                menuHtml = `
                    <div class="nav-link active" onclick="carregarPagina('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</div>
                    <div class="nav-link" onclick="carregarPagina('equipe')"><i class="fas fa-users"></i> Minha Equipe</div>
                    <div class="nav-link" onclick="carregarPagina('familias')"><i class="fas fa-home"></i> Famílias</div>
                    <div class="nav-link" onclick="carregarPagina('visitas')"><i class="fas fa-calendar-check"></i> Visitas</div>
                    <div class="nav-link" onclick="carregarPagina('relatorios')"><i class="fas fa-chart-line"></i> Relatórios</div>
                    <div class="nav-link" onclick="carregarPagina('alertas')"><i class="fas fa-exclamation-triangle"></i> Alertas</div>`;
            } else {
                menuHtml = `
                    <div class="nav-link active" onclick="carregarPagina('dashboard')"><i class="fas fa-tachometer-alt"></i> Dashboard</div>
                    <div class="nav-link" onclick="carregarPagina('familias')"><i class="fas fa-home"></i> Famílias</div>
                    <div class="nav-link" onclick="carregarPagina('visitas')"><i class="fas fa-calendar-check"></i> Visitas</div>
                    <div class="nav-link" onclick="carregarPagina('agenda')"><i class="fas fa-calendar-alt"></i> Minha Agenda</div>
                    <div class="nav-link" onclick="carregarPagina('mapa')"><i class="fas fa-map"></i> Mapa de Focos</div>
                    <div class="nav-link" onclick="carregarPagina('focos')"><i class="fas fa-bug"></i> Focos</div>
                    <div class="nav-link" onclick="carregarPagina('alertas')"><i class="fas fa-exclamation-triangle"></i> Alertas</div>`;
            }
            document.getElementById('sidebarMenu').innerHTML = menuHtml;
        }
        
        function carregarPagina(pagina) {
            document.querySelectorAll('.sidebar-menu .nav-link').forEach(link => link.classList.remove('active'));
            if(event && event.target) event.target.classList.add('active');
            const titles = {
                dashboard: 'Dashboard', agentes: 'Agentes', microareas: 'Microáreas',
                familias: 'Famílias', visitas: 'Visitas', agenda: 'Agenda de Visitas',
                mapa: 'Mapa de Focos', focos: 'Focos de Endemias', relatorios: 'Relatórios',
                alertas: 'Alertas', equipe: 'Minha Equipe'
            };
            document.getElementById('pageTitle').innerText = titles[pagina] || 'Dashboard';
            const content = document.getElementById('contentArea');
            if (pagina === 'dashboard') carregarDashboard(content);
            else if (pagina === 'agentes') carregarAgentes(content);
            else if (pagina === 'microareas') carregarMicroareas(content);
            else if (pagina === 'familias') carregarFamilias(content);
            else if (pagina === 'visitas') carregarVisitas(content);
            else if (pagina === 'agenda') carregarAgenda(content);
            else if (pagina === 'mapa') carregarMapa(content);
            else if (pagina === 'focos') carregarFocos(content);
            else if (pagina === 'relatorios') carregarRelatorios(content);
            else if (pagina === 'alertas') carregarAlertas(content);
            else if (pagina === 'equipe') carregarEquipe(content);
        }
        
        async function carregarDashboard(container) {
            const stats = await apiRequest('/api/stats');
            const alertas = await apiRequest('/api/alertas');
            const agenda = await apiRequest('/api/agenda/hoje');
            container.innerHTML = `
                <div class="row">
                    <div class="col-md-3"><div class="stat-card"><div class="stat-icon" style="background:rgba(0,102,179,0.1);color:#0066b3"><i class="fas fa-users"></i></div><div class="stat-info"><h3>${stats.agentes || 0}</h3><p>Agentes</p></div></div></div>
                    <div class="col-md-3"><div class="stat-card"><div class="stat-icon" style="background:rgba(46,204,113,0.1);color:#2ecc71"><i class="fas fa-home"></i></div><div class="stat-info"><h3>${stats.familias || 0}</h3><p>Famílias</p></div></div></div>
                    <div class="col-md-3"><div class="stat-card"><div class="stat-icon" style="background:rgba(155,89,182,0.1);color:#9b59b6"><i class="fas fa-calendar-check"></i></div><div class="stat-info"><h3>${stats.visitas || 0}</h3><p>Visitas</p></div></div></div>
                    <div class="col-md-3"><div class="stat-card"><div class="stat-icon" style="background:rgba(231,76,60,0.1);color:#e74c3c"><i class="fas fa-bug"></i></div><div class="stat-info"><h3>${stats.focos || 0}</h3><p>Focos</p></div></div></div>
                </div>
                <div class="row">
                    <div class="col-md-8"><div class="data-card"><div class="data-card-header"><h5><i class="fas fa-chart-line"></i> Produtividade Mensal</h5></div><canvas id="graficoProdutividade" height="250"></canvas></div></div>
                    <div class="col-md-4"><div class="data-card"><div class="data-card-header"><h5><i class="fas fa-calendar"></i> Agenda Hoje</h5><div id="agendaHoje">${agenda.map(a => `<div class="alert-item" style="border-left-color:#0066b3"><strong>${a.endereco || 'Visita'}</strong><br><small>⏰ ${a.hora_agendada} - ${a.status}</small></div>`).join('') || '<p class="text-muted">Nenhuma visita agendada</p>'}</div></div></div>
                </div>
                <div class="row mt-3"><div class="col-md-12"><div class="data-card"><div class="data-card-header"><h5><i class="fas fa-exclamation-triangle"></i> Alertas Recentes</h5></div><div>${alertas.slice(0,3).map(a => `<div class="alert-item" style="border-left-color:${a.gravidade === 'critica' ? '#e74c3c' : '#f39c12'}"><strong>${a.titulo}</strong><p class="mb-0 small">${a.descricao}</p></div>`).join('') || '<p class="text-muted">Nenhum alerta</p>'}</div></div></div></div>`;
            const ctx = document.getElementById('graficoProdutividade')?.getContext('2d');
            if(ctx) new Chart(ctx, { type: 'line', data: { labels: ['Jan','Fev','Mar','Abr','Mai','Jun'], datasets: [{ label: 'Visitas', data: [45,52,48,60,55,70], borderColor: '#0066b3', backgroundColor: 'rgba(0,102,179,0.1)', tension: 0.4, fill: true }] } });
        }
        
        async function carregarFamilias(container) {
            let familias = await apiRequest('/api/familias');
            const microareas = await apiRequest('/api/microareas');
            container.innerHTML = `
                <div class="data-card"><div class="data-card-header"><h5><i class="fas fa-home"></i> Famílias Cadastradas</h5><button class="btn-primary-custom" onclick="abrirModalFamilia()"><i class="fas fa-plus"></i> Nova Família</button></div><div class="search-input mb-3"><i class="fas fa-search"></i><input type="text" id="buscaFamilia" class="form-control" placeholder="Buscar por endereço, responsável..."></div><div class="table-responsive"><table class="table"><thead><tr><th>Endereço</th><th>Bairro</th><th>Responsável</th><th>Grupo Risco</th><th>Ações</th></tr></thead><tbody id="listaFamilias"></tbody></table></div></div>
                <div id="modalFamilia" class="modal-custom"><div class="modal-content-custom"><h4><i class="fas fa-home"></i> Cadastrar Família</h4><div class="row"><div class="col-md-8"><input type="text" id="endereco" class="form-control" placeholder="Endereço"></div><div class="col-md-4"><input type="text" id="numero" class="form-control" placeholder="Número"></div></div><input type="text" id="bairro" class="form-control" placeholder="Bairro"><input type="text" id="responsavel" class="form-control" placeholder="Responsável"><input type="text" id="telefoneResp" class="form-control" placeholder="Telefone"><select id="microareaFamilia" class="form-select"><option value="">Selecione a microárea</option>${microareas.map(m => `<option value="${m.id}">${m.nome}</option>`).join('')}</select><div class="row"><div class="col-md-6"><input type="text" id="latitude" class="form-control" placeholder="Latitude"></div><div class="col-md-6"><input type="text" id="longitude" class="form-control" placeholder="Longitude"></div></div><div class="mt-3"><button class="btn-primary-custom" onclick="salvarFamilia()">Salvar</button><button class="btn btn-secondary" onclick="fecharModalFamilia()">Cancelar</button></div></div></div>`;
            carregarListaFamilias();
            document.getElementById('buscaFamilia')?.addEventListener('input', (e) => { const busca = e.target.value.toLowerCase(); document.querySelectorAll('#listaFamilias tr').forEach(row => row.style.display = row.textContent.toLowerCase().includes(busca) ? '' : 'none'); });
            window.abrirModalFamilia = () => document.getElementById('modalFamilia').style.display = 'flex';
            window.fecharModalFamilia = () => document.getElementById('modalFamilia').style.display = 'none';
            window.salvarFamilia = async () => { await apiRequest('/api/familias', 'POST', { endereco: document.getElementById('endereco').value, numero: document.getElementById('numero').value, bairro: document.getElementById('bairro').value, responsavel_nome: document.getElementById('responsavel').value, responsavel_telefone: document.getElementById('telefoneResp').value, microarea_id: document.getElementById('microareaFamilia').value, latitude: document.getElementById('latitude').value, longitude: document.getElementById('longitude').value }); fecharModalFamilia(); carregarPagina('familias'); alert('Família cadastrada!'); };
            window.excluirFamilia = async (id) => { if(confirm('Excluir?')){ await apiRequest(`/api/familias/${id}`, 'DELETE'); carregarPagina('familias'); } };
            async function carregarListaFamilias() { familias = await apiRequest('/api/familias'); document.getElementById('listaFamilias').innerHTML = familias.map(f => `<tr><td><strong>${f.endereco}, ${f.numero}</strong>${f.complemento ? `<br><small>${f.complemento}</small>` : ''}</td><td>${f.bairro}</td><td>${f.responsavel_nome || '-'}</td><td><span class="badge badge-warning">${f.grupo_risco || 'Nenhum'}</span></td><td><button class="btn btn-success btn-sm me-1" onclick="agendarVisita(${f.id})"><i class="fas fa-calendar-plus"></i></button><button class="btn btn-danger btn-sm" onclick="excluirFamilia(${f.id})"><i class="fas fa-trash"></i></button></td>`).join(''); }
            window.agendarVisita = (id) => { carregarPagina('agenda'); setTimeout(() => { document.getElementById('familiaAgenda') && (document.getElementById('familiaAgenda').value = id); }, 500); };
        }
        
        async function carregarVisitas(container) {
            const familias = await apiRequest('/api/familias');
            let visitas = await apiRequest('/api/visitas');
            container.innerHTML = `
                <div class="row"><div class="col-md-5"><div class="data-card"><h5><i class="fas fa-clinic-medical"></i> Registrar Visita (2 min)</h5><form id="formVisita"><select id="familiaId" class="form-select" required><option value="">Selecione a família</option>${familias.map(f => `<option value="${f.id}">${f.endereco}, ${f.numero}</option>`).join('')}</select><input type="date" id="dataVisita" class="form-control" value="${new Date().toISOString().split('T')[0]}"><input type="time" id="horaVisita" class="form-control" value="08:00"><select id="resultado" class="form-select"><option value="realizada">✅ Realizada</option><option value="ausente">🚪 Morador Ausente</option><option value="recusada">❌ Recusada</option></select><textarea id="observacoes" class="form-control" rows="3" placeholder="Observações..."></textarea><button type="submit" class="btn-primary-custom w-100 btn-large">Salvar Visita</button></form></div></div><div class="col-md-7"><div class="data-card"><h5><i class="fas fa-history"></i> Histórico de Visitas</h5><div id="listaVisitas"></div></div></div></div>`;
            carregarListaVisitas();
            document.getElementById('formVisita')?.addEventListener('submit', async (e) => { e.preventDefault(); await apiRequest('/api/visitas', 'POST', { family_id: document.getElementById('familiaId').value, data_visita: document.getElementById('dataVisita').value, hora: document.getElementById('horaVisita').value, resultado: document.getElementById('resultado').value, observacoes: document.getElementById('observacoes').value }); alert('Visita registrada!'); carregarPagina('visitas'); });
            async function carregarListaVisitas() { visitas = await apiRequest('/api/visitas'); const familiasData = await apiRequest('/api/familias'); document.getElementById('listaVisitas').innerHTML = visitas.slice().reverse().map(v => { const f = familiasData.find(fam => fam.id == v.family_id); return `<div class="alert-item" style="border-left-color:#2ecc71"><strong>${f?.endereco || 'Família'}</strong><br><small>📅 ${v.data_visita} ${v.hora ? `às ${v.hora}` : ''} | ${v.resultado}</small><br><small>${v.observacoes || ''}</small></div>`; }).join(''); }
        }
        
        async function carregarAgenda(container) {
            const familias = await apiRequest('/api/familias');
            const agenda = await apiRequest('/api/agenda');
            const diasSemana = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
            let calendarioHtml = '<div class="calendar-grid">';
            for(let i=0; i<7; i++) calendarioHtml += `<div class="calendar-day"><strong>${diasSemana[i]}</strong></div>`;
            for(let d=1; d<=31; d++) { let hasAgenda = agenda.some(a => new Date(a.data_agendada).getDate() == d); calendarioHtml += `<div class="calendar-day ${hasAgenda ? 'agendado' : ''}">${d}</div>`; }
            calendarioHtml += '</div>';
            container.innerHTML = `
                <div class="row"><div class="col-md-5"><div class="data-card"><h5><i class="fas fa-plus"></i> Agendar Visita</h5><form id="formAgenda"><select id="familiaAgenda" class="form-select" required><option value="">Selecione a família</option>${familias.map(f => `<option value="${f.id}">${f.endereco}, ${f.numero}</option>`).join('')}</select><input type="date" id="dataAgendada" class="form-control" required><input type="time" id="horaAgendada" class="form-control" required><textarea id="obsAgenda" class="form-control" rows="2" placeholder="Observações"></textarea><button type="submit" class="btn-primary-custom w-100">Agendar</button></form></div></div><div class="col-md-7"><div class="data-card"><h5><i class="fas fa-calendar"></i> Calendário</h5>${calendarioHtml}<div class="mt-3"><h6>Próximas Visitas</h6><div id="listaAgenda"></div></div></div></div></div>`;
            carregarListaAgenda();
            document.getElementById('formAgenda')?.addEventListener('submit', async (e) => { e.preventDefault(); await apiRequest('/api/agenda', 'POST', { family_id: document.getElementById('familiaAgenda').value, data_agendada: document.getElementById('dataAgendada').value, hora_agendada: document.getElementById('horaAgendada').value, observacoes: document.getElementById('obsAgenda').value }); alert('Visita agendada!'); carregarPagina('agenda'); });
            async function carregarListaAgenda() { const lista = await apiRequest('/api/agenda'); const familiasData = await apiRequest('/api/familias'); document.getElementById('listaAgenda').innerHTML = lista.slice(0,5).map(a => { const f = familiasData.find(fam => fam.id == a.family_id); return `<div class="alert-item" style="border-left-color:#0066b3"><strong>${f?.endereco || 'Família'}</strong><br><small>📅 ${a.data_agendada} às ${a.hora_agendada}</small></div>`; }).join(''); }
        }
        
        async function carregarMapa(container) {
            const focos = await apiRequest('/api/focos');
            container.innerHTML = `<div class="data-card"><h5><i class="fas fa-map"></i> Mapa de Focos de Endemias</h5><div id="mapContainer" class="map-container"></div><p class="text-muted small">Clique nos marcadores para ver detalhes. Use sua localização para registrar novos focos.</p><button class="btn-primary-custom" onclick="centralizarMapa()"><i class="fas fa-location-dot"></i> Centralizar na minha localização</button></div>`;
            setTimeout(() => {
                if(mapInstance) mapInstance.remove();
                mapInstance = L.map('mapContainer').setView([-23.5505, -46.6333], 13);
                L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OSM</a>' }).addTo(mapInstance);
                focos.forEach(foco => {
                    if(foco.latitude && foco.longitude) {
                        let cor = foco.status === 'pendente' ? 'red' : foco.status === 'tratado' ? 'green' : 'orange';
                        L.marker([foco.latitude, foco.longitude]).addTo(mapInstance).bindPopup(`<b>${foco.tipo}</b><br>📍 ${foco.local}<br>📝 ${foco.descricao}<br><span class="badge badge-warning">${foco.status}</span>`);
                    }
                });
            }, 100);
            window.centralizarMapa = () => { if(navigator.geolocation) navigator.geolocation.getCurrentPosition(p => mapInstance.setView([p.coords.latitude, p.coords.longitude], 15)); };
        }
        
        async function carregarFocos(container) {
            let focos = await apiRequest('/api/focos');
            container.innerHTML = `
                <div class="data-card"><div class="data-card-header"><h5><i class="fas fa-bug"></i> Focos de Endemias</h5><button class="btn-primary-custom" onclick="abrirModalFoco()"><i class="fas fa-plus"></i> Registrar Foco</button></div><div class="row" id="listaFocos"></div></div>
                <div id="modalFoco" class="modal-custom"><div class="modal-content-custom"><h4><i class="fas fa-bug"></i> Registrar Foco</h4><select id="tipoFoco" class="form-select"><option value="Dengue">🦟 Dengue</option><option value="Zika">🦟 Zika</option><option value="Chikungunya">🦟 Chikungunya</option><option value="Escorpiao">🦂 Escorpião</option></select><input type="text" id="localFoco" class="form-control" placeholder="Local"><textarea id="descricaoFoco" class="form-control" rows="3" placeholder="Descrição"></textarea><div class="row"><div class="col-md-6"><input type="text" id="latFoco" class="form-control" placeholder="Latitude"></div><div class="col-md-6"><input type="text" id="lngFoco" class="form-control" placeholder="Longitude"></div></div><button class="btn btn-sm btn-secondary mb-2" onclick="getLocalizacaoFoco()"><i class="fas fa-location-dot"></i> Usar minha localização</button><select id="statusFoco" class="form-select"><option value="pendente">Pendente</option><option value="tratado">Tratado</option><option value="monitoramento">Monitoramento</option></select><div class="mt-3"><button class="btn-primary-custom" onclick="salvarFoco()">Salvar</button><button class="btn btn-secondary" onclick="fecharModalFoco()">Cancelar</button></div></div></div>`;
            carregarListaFocos();
            window.abrirModalFoco = () => document.getElementById('modalFoco').style.display = 'flex';
            window.fecharModalFoco = () => document.getElementById('modalFoco').style.display = 'none';
            window.getLocalizacaoFoco = () => { if(navigator.geolocation) navigator.geolocation.getCurrentPosition(p => { document.getElementById('latFoco').value = p.coords.latitude; document.getElementById('lngFoco').value = p.coords.longitude; alert('Localização obtida!'); }); };
            window.salvarFoco = async () => { await apiRequest('/api/focos', 'POST', { tipo: document.getElementById('tipoFoco').value, local: document.getElementById('localFoco').value, descricao: document.getElementById('descricaoFoco').value, latitude: document.getElementById('latFoco').value, longitude: document.getElementById('lngFoco').value, status: document.getElementById('statusFoco').value }); fecharModalFoco(); carregarPagina('focos'); alert('Foco registrado!'); };
            async function carregarListaFocos() { focos = await apiRequest('/api/focos'); document.getElementById('listaFocos').innerHTML = focos.map(f => `<div class="col-md-4 mb-3"><div class="stat-card" style="cursor:default"><i class="fas fa-bug" style="font-size:30px;color:#e74c3c"></i><h6>${f.tipo}</h6><p class="small"><strong>📍 ${f.local}</strong></p><p class="small">${f.descricao}</p><small>📅 ${f.created_at?.split(' ')[0]}</small><br><span class="badge ${f.status === 'pendente' ? 'badge-warning' : 'badge-success'}">${f.status}</span></div></div>`).join(''); }
        }
        
        async function carregarRelatorios(container) {
            const stats = await apiRequest('/api/stats');
            container.innerHTML = `<div class="data-card"><h5><i class="fas fa-chart-bar"></i> Relatório Geral</h5><table class="table"><tr><th>Indicador</th><th>Total</th></tr><tr><td>Agentes</td><td><strong>${stats.agentes || 0}</strong></td></tr><tr><td>Microáreas</td><td><strong>${stats.microareas || 0}</strong></td></tr><tr><td>Famílias</td><td><strong>${stats.familias || 0}</strong></td></tr><tr><td>Visitas</td><td><strong>${stats.visitas || 0}</strong></td></tr><tr><td>Focos</td><td><strong>${stats.focos || 0}</strong></td></tr></table><button class="btn-primary-custom mt-3" onclick="alert('Relatório exportado!')"><i class="fas fa-download"></i> Exportar Relatório</button></div>`;
        }
        
        async function carregarAlertas(container) {
            const alertas = await apiRequest('/api/alertas');
            container.innerHTML = `<div class="data-card"><div class="data-card-header"><h5><i class="fas fa-exclamation-triangle"></i> Alertas de Casos Graves</h5></div>${alertas.map(a => `<div class="alert-item" style="border-left-color:${a.gravidade === 'critica' ? '#e74c3c' : '#f39c12'}"><strong><i class="fas ${a.gravidade === 'critica' ? 'fa-skull-crossbones' : 'fa-exclamation-circle'}"></i> ${a.titulo}</strong><p>${a.descricao}</p><small>📅 ${a.created_at?.split(' ')[0]}</small></div>`).join('') || '<p class="text-muted">Nenhum alerta registrado</p>'}</div>`;
        }
        
        async function carregarAgentes(container) {
            let agentes = await apiRequest('/api/agentes');
            container.innerHTML = `<div class="data-card"><div class="data-card-header"><h5><i class="fas fa-user-md"></i> Agentes</h5><button class="btn-primary-custom" onclick="abrirModalAgente()"><i class="fas fa-plus"></i> Novo Agente</button></div><div class="table-responsive"><table class="table"><thead><tr><th>Nome</th><th>Email</th><th>Função</th><th>Ações</th></tr></thead><tbody>${agentes.map(a => `<td><td><strong>${a.nome}</strong></td><td>${a.email}</td><td><span class="badge badge-info">${a.funcao.toUpperCase()}</span></td><td><button class="btn btn-danger btn-sm" onclick="excluirAgente(${a.id})"><i class="fas fa-trash"></i></button></td></tr>`).join('')}</tbody></table></div></div>
            <div id="modalAgente" class="modal-custom"><div class="modal-content-custom"><h4>Novo Agente</h4><input type="text" id="nomeAgente" class="form-control" placeholder="Nome"><input type="email" id="emailAgente" class="form-control" placeholder="Email"><input type="password" id="senhaAgente" class="form-control" placeholder="Senha"><select id="funcaoAgente" class="form-select"><option value="acs">ACS</option><option value="ace">ACE</option></select><button class="btn-primary-custom" onclick="salvarAgente()">Salvar</button><button class="btn btn-secondary" onclick="fecharModalAgente()">Cancelar</button></div></div>`;
            window.abrirModalAgente = () => document.getElementById('modalAgente').style.display = 'flex';
            window.fecharModalAgente = () => document.getElementById('modalAgente').style.display = 'none';
            window.salvarAgente = async () => { await apiRequest('/api/agentes', 'POST', { nome: document.getElementById('nomeAgente').value, email: document.getElementById('emailAgente').value, senha: document.getElementById('senhaAgente').value, funcao: document.getElementById('funcaoAgente').value }); fecharModalAgente(); carregarPagina('agentes'); alert('Agente cadastrado!'); };
            window.excluirAgente = async (id) => { if(confirm('Excluir?')){ await apiRequest(`/api/agentes/${id}`, 'DELETE'); carregarPagina('agentes'); } };
        }
        
        async function carregarMicroareas(container) {
            let microareas = await apiRequest('/api/microareas');
            container.innerHTML = `<div class="data-card"><div class="data-card-header"><h5><i class="fas fa-map-marker-alt"></i> Microáreas</h5><button class="btn-primary-custom" onclick="abrirModalMicroarea()"><i class="fas fa-plus"></i> Nova Microárea</button></div><div class="row" id="listaMicroareas"></div></div>
            <div id="modalMicroarea" class="modal-custom"><div class="modal-content-custom"><h4>Nova Microárea</h4><input type="text" id="nomeMicroarea" class="form-control" placeholder="Nome"><input type="text" id="codigoMicroarea" class="form-control" placeholder="Código"><textarea id="descMicroarea" class="form-control" placeholder="Descrição"></textarea><button class="btn-primary-custom" onclick="salvarMicroarea()">Salvar</button><button class="btn btn-secondary" onclick="fecharModalMicroarea()">Cancelar</button></div></div>`;
            carregarListaMicroareas();
            window.abrirModalMicroarea = () => document.getElementById('modalMicroarea').style.display = 'flex';
            window.fecharModalMicroarea = () => document.getElementById('modalMicroarea').style.display = 'none';
            window.salvarMicroarea = async () => { await apiRequest('/api/microareas', 'POST', { nome: document.getElementById('nomeMicroarea').value, codigo: document.getElementById('codigoMicroarea').value, descricao: document.getElementById('descMicroarea').value }); fecharModalMicroarea(); carregarPagina('microareas'); alert('Microárea cadastrada!'); };
            async function carregarListaMicroareas() { microareas = await apiRequest('/api/microareas'); document.getElementById('listaMicroareas').innerHTML = microareas.map(m => `<div class="col-md-4 mb-3"><div class="stat-card" style="cursor:default"><i class="fas fa-map-marker-alt" style="font-size:30px;color:#0066b3"></i><h5>${m.nome}</h5><p class="text-muted">${m.codigo}</p><button class="btn btn-danger btn-sm" onclick="excluirMicroarea(${m.id})">Excluir</button></div></div>`).join(''); }
            window.excluirMicroarea = async (id) => { if(confirm('Excluir?')){ await apiRequest(`/api/microareas/${id}`, 'DELETE'); carregarPagina('microareas'); } };
        }
        
        async function carregarEquipe(container) {
            const agentes = await apiRequest('/api/agentes');
            container.innerHTML = `<div class="data-card"><h5><i class="fas fa-users"></i> Minha Equipe</h5><div class="table-responsive"><table class="table"><thead><tr><th>Nome</th><th>Email</th><th>Função</th><th>Microárea</th></tr></thead><tbody>${agentes.map(a => `<tr><td><strong>${a.nome}</strong></td><td>${a.email}</td><td><span class="badge badge-info">${a.funcao.toUpperCase()}</span></td><td>${a.microarea || '-'}</td></tr>`).join('')}</tbody></table></div></div>`;
        }
        
        async function carregarNotificacoes() {
            const notificacoes = await apiRequest('/api/notificacoes');
            const content = document.getElementById('contentArea');
            content.innerHTML = `<div class="data-card"><div class="data-card-header"><h5><i class="fas fa-bell"></i> Notificações</h5></div>${notificacoes.map(n => `<div class="alert-item" style="border-left-color:#0066b3"><strong>${n.titulo}</strong><p>${n.mensagem}</p><small>${n.created_at?.split(' ')[0]}</small></div>`).join('') || '<p class="text-muted">Nenhuma notificação</p>'}</div>`;
        }
        
        // Inicialização
        const user = localStorage.getItem('user');
        if (!user && window.location.pathname !== '/login') window.location.href = '/login';
        else if (user) {
            currentUser = JSON.parse(user);
            document.getElementById('userName').innerText = currentUser.nome;
            document.getElementById('topUserName').innerHTML = `<i class="fas fa-user-circle"></i> ${currentUser.nome}`;
            document.getElementById('userAvatar').innerText = currentUser.nome.charAt(0);
            document.getElementById('userRole').innerText = currentUser.funcao === 'admin' ? 'Administrador' : 'Supervisor';
            carregarMenu();
            carregarPagina('dashboard');
            checkOnlineStatus();
            window.addEventListener('online', sincronizarOffline);
            window.addEventListener('offline', () => document.getElementById('offlineIndicator').style.display = 'block');
            setInterval(async () => { const notifs = await apiRequest('/api/notificacoes/naoLidas'); const badge = document.getElementById('notificationCount'); if(notifs.length > 0) { badge.style.display = 'flex'; badge.innerText = notifs.length; } else badge.style.display = 'none'; }, 30000);
        }
    </script>
</body>
</html>
