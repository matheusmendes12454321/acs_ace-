<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema ACE/ACS - @yield('title', 'Dashboard')</title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
        }
        
        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 280px;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: white;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar-header {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-header i {
            font-size: 50px;
            margin-bottom: 10px;
            color: #667eea;
        }
        
        .sidebar-header h4 {
            margin: 10px 0 5px;
            font-weight: 600;
        }
        
        .sidebar-header p {
            font-size: 12px;
            opacity: 0.7;
            margin: 0;
        }
        
        .sidebar-menu {
            padding: 20px 0;
        }
        
        .sidebar-menu .nav-item {
            list-style: none;
        }
        
        .sidebar-menu .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 3px solid transparent;
        }
        
        .sidebar-menu .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left-color: #667eea;
        }
        
        .sidebar-menu .nav-link.active {
            background: rgba(102,126,234,0.2);
            color: white;
            border-left-color: #667eea;
        }
        
        .sidebar-menu .nav-link i {
            width: 25px;
            margin-right: 10px;
            font-size: 18px;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            transition: all 0.3s;
        }
        
        /* Top Bar */
        .top-bar {
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        
        .page-title h3 {
            margin: 0;
            color: #333;
        }
        
        .page-title p {
            margin: 0;
            font-size: 14px;
            color: #666;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }
        
        .btn-logout {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .btn-logout:hover {
            background: #c82333;
            transform: translateY(-2px);
        }
        
        /* Content Area */
        .content-area {
            padding: 30px;
        }
        
        /* Cards */
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            cursor: pointer;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 15px;
        }
        
        .stat-info h3 {
            font-size: 28px;
            margin: 0;
            font-weight: bold;
        }
        
        .stat-info p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }
        
        /* Tables */
        .table-custom {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .table-custom thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        .table-custom th, .table-custom td {
            padding: 12px 15px;
        }
        
        /* Buttons */
        .btn-primary-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 10px 25px;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102,126,234,0.4);
        }
        
        /* Modal */
        .modal-custom {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }
        
        .modal-content-custom {
            background: white;
            border-radius: 20px;
            padding: 30px;
            width: 500px;
            max-width: 90%;
            animation: slideIn 0.3s ease;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .menu-toggle {
                display: block;
            }
        }
        
        .menu-toggle {
            display: none;
            background: #667eea;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            cursor: pointer;
        }
        
        .alert-item {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 10px;
            border-left: 4px solid;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .alert-item:hover {
            transform: translateX(5px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .badge-critical { background: #dc3545; color: white; padding: 3px 8px; border-radius: 5px; font-size: 11px; }
        .badge-high { background: #fd7e14; color: white; padding: 3px 8px; border-radius: 5px; font-size: 11px; }
        .badge-medium { background: #ffc107; color: #333; padding: 3px 8px; border-radius: 5px; font-size: 11px; }
        .badge-low { background: #28a745; color: white; padding: 3px 8px; border-radius: 5px; font-size: 11px; }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-heartbeat"></i>
            <h4>ACE/ACS System</h4>
            <p>Saúde em Ação</p>
        </div>
        
        <ul class="sidebar-menu">
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('dashboard')">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('familias')">
                    <i class="fas fa-users"></i> Famílias
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('visitas')">
                    <i class="fas fa-calendar-check"></i> Visitas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('focos')">
                    <i class="fas fa-bug"></i> Focos de Endemias
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('rotas')">
                    <i class="fas fa-route"></i> Rotas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('alertas')">
                    <i class="fas fa-exclamation-triangle"></i> Alertas
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('relatorios')">
                    <i class="fas fa-chart-line"></i> Relatórios
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('historico')">
                    <i class="fas fa-history"></i> Histórico
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" onclick="carregarPagina('perfil')">
                    <i class="fas fa-user-circle"></i> Meu Perfil
                </a>
            </li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <div class="top-bar">
            <button class="menu-toggle" id="menuToggle" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            
            <div class="page-title">
                <h3 id="pageTitle">Dashboard</h3>
                <p id="pageSubtitle">Bem-vindo ao sistema</p>
            </div>
            
            <div class="user-info">
                <div class="user-avatar" id="userAvatar">
                    <i class="fas fa-user"></i>
                </div>
                <span id="userName">Carregando...</span>
                <button class="btn-logout" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </button>
            </div>
        </div>
        
        <div class="content-area" id="contentArea">
            @yield('content')
        </div>
    </div>
    
    <script>
        // Estado da aplicação
        let currentUser = null;
        let currentPage = 'dashboard';
        
        // Inicialização
        function init() {
            const user = localStorage.getItem('usuario');
            if (!user && window.location.pathname !== '/login') {
                window.location.href = '/login';
                return;
            }
            currentUser = JSON.parse(user);
            document.getElementById('userName').innerText = currentUser?.nome || 'Agente';
            document.getElementById('userAvatar').innerHTML = '<i class="fas fa-user-md"></i>';
            
            // Inicializar dados
            if (!localStorage.getItem('familias')) {
                localStorage.setItem('familias', JSON.stringify([]));
                localStorage.setItem('visitas', JSON.stringify([]));
                localStorage.setItem('focos', JSON.stringify([]));
                localStorage.setItem('alertas', JSON.stringify([]));
                localStorage.setItem('rotas', JSON.stringify([]));
                
                // Adicionar dados de exemplo
                const exemplosFamilias = [
                    { id: 1, endereco: 'Rua das Flores, 123', bairro: 'Centro', membros: 4, telefone: '(11) 99999-9999', latitude: -23.5505, longitude: -46.6333 },
                    { id: 2, endereco: 'Av. Brasil, 456', bairro: 'Jardim América', membros: 3, telefone: '(11) 98888-8888', latitude: -23.5605, longitude: -46.6433 },
                    { id: 3, endereco: 'Rua da Paz, 789', bairro: 'Vila Nova', membros: 5, telefone: '(11) 97777-7777', latitude: -23.5405, longitude: -46.6233 }
                ];
                localStorage.setItem('familias', JSON.stringify(exemplosFamilias));
            }
        }
        
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }
        
        function logout() {
            localStorage.removeItem('usuario');
            window.location.href = '/login';
        }
        
        function carregarPagina(pagina) {
            currentPage = pagina;
            const titles = {
                dashboard: { title: 'Dashboard', subtitle: 'Visão geral do sistema' },
                familias: { title: 'Famílias', subtitle: 'Gerenciar famílias cadastradas' },
                visitas: { title: 'Visitas Domiciliares', subtitle: 'Registrar novas visitas' },
                focos: { title: 'Focos de Endemias', subtitle: 'Monitorar focos de doenças' },
                rotas: { title: 'Rotas', subtitle: 'Planejamento de rotas diárias' },
                alertas: { title: 'Alertas', subtitle: 'Casos graves e emergências' },
                relatorios: { title: 'Relatórios', subtitle: 'Estatísticas e relatórios' },
                historico: { title: 'Histórico', subtitle: 'Histórico de visitas' },
                perfil: { title: 'Meu Perfil', subtitle: 'Informações pessoais' }
            };
            
            document.getElementById('pageTitle').innerText = titles[pagina]?.title || 'Dashboard';
            document.getElementById('pageSubtitle').innerText = titles[pagina]?.subtitle || '';
            
            // Atualizar menu ativo
            document.querySelectorAll('.sidebar-menu .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            event?.target?.classList?.add('active');
            
            // Carregar conteúdo
            const content = document.getElementById('contentArea');
            switch(pagina) {
                case 'dashboard': carregarDashboard(content); break;
                case 'familias': carregarFamilias(content); break;
                case 'visitas': carregarVisitas(content); break;
                case 'focos': carregarFocos(content); break;
                case 'rotas': carregarRotas(content); break;
                case 'alertas': carregarAlertas(content); break;
                case 'relatorios': carregarRelatorios(content); break;
                case 'historico': carregarHistorico(content); break;
                case 'perfil': carregarPerfil(content); break;
                default: carregarDashboard(content);
            }
        }
        
        function carregarDashboard(container) {
            const familias = JSON.parse(localStorage.getItem('familias') || '[]');
            const visitas = JSON.parse(localStorage.getItem('visitas') || '[]');
            const focos = JSON.parse(localStorage.getItem('focos') || '[]');
            const alertas = JSON.parse(localStorage.getItem('alertas') || '[]');
            
            container.innerHTML = `
                <div class="row">
                    <div class="col-md-3">
                        <div class="stat-card" onclick="carregarPagina('familias')">
                            <div class="stat-icon" style="background: rgba(102,126,234,0.1); color: #667eea;">
                                <i class="fas fa-home"></i>
                            </div>
                            <div class="stat-info">
                                <h3>${familias.length}</h3>
                                <p>Famílias Cadastradas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" onclick="carregarPagina('visitas')">
                            <div class="stat-icon" style="background: rgba(40,167,69,0.1); color: #28a745;">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="stat-info">
                                <h3>${visitas.length}</h3>
                                <p>Visitas Realizadas</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" onclick="carregarPagina('focos')">
                            <div class="stat-icon" style="background: rgba(220,53,69,0.1); color: #dc3545;">
                                <i class="fas fa-bug"></i>
                            </div>
                            <div class="stat-info">
                                <h3>${focos.length}</h3>
                                <p>Focos de Endemias</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="stat-card" onclick="carregarPagina('alertas')">
                            <div class="stat-icon" style="background: rgba(255,193,7,0.1); color: #ffc107;">
                                <i class="fas fa-exclamation-triangle"></i>
                            </div>
                            <div class="stat-info">
                                <h3>${alertas.filter(a => a.status === 'pendente').length}</h3>
                                <p>Alertas Pendentes</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-8">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-chart-line"></i> Visitas por Mês</h5>
                            <canvas id="graficoVisitas" height="250"></canvas>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-bell"></i> Últimos Alertas</h5>
                            <div id="ultimosAlertas">
                                ${alertas.slice(0,3).map(a => `
                                    <div class="alert-item" style="border-left-color: ${a.gravidade === 'critica' ? '#dc3545' : '#ffc107'}">
                                        <strong>${a.titulo}</strong>
                                        <p style="font-size:12px; margin:5px 0">${a.descricao}</p>
                                        <small class="text-muted">${a.data}</small>
                                    </div>
                                `).join('') || '<p class="text-muted">Nenhum alerta recente</p>'}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-clock"></i> Próximas Visitas</h5>
                            <table class="table">
                                <thead>
                                    <tr><th>Família</th><th>Data</th><th>Status</th></tr>
                                </thead>
                                <tbody>
                                    ${visitas.slice(0,5).map(v => `
                                        <tr>
                                            <td>${v.endereco || 'Família ' + v.familiaId}</td>
                                            <td>${v.data}</td>
                                            <td><span class="badge bg-warning">Pendente</span></td>
                                        </tr>
                                    `).join('') || '<tr><td colspan="3">Nenhuma visita agendada</td></tr>'}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            `;
            
            // Gráfico
            const ctx = document.getElementById('graficoVisitas')?.getContext('2d');
            if (ctx) {
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun'],
                        datasets: [{
                            label: 'Visitas',
                            data: [12, 19, 15, 17, 14, 18],
                            borderColor: '#667eea',
                            backgroundColor: 'rgba(102,126,234,0.1)',
                            tension: 0.4,
                            fill: true
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: true }
                });
            }
        }
        
        function carregarFamilias(container) {
            let familias = JSON.parse(localStorage.getItem('familias') || '[]');
            
            container.innerHTML = `
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><i class="fas fa-users"></i> Famílias Cadastradas</h4>
                    <button class="btn-primary-custom" onclick="abrirModalFamilia()">
                        <i class="fas fa-plus"></i> Nova Família
                    </button>
                </div>
                
                <div class="mb-3">
                    <input type="text" id="buscaFamilia" class="form-control" placeholder="🔍 Buscar por endereço ou bairro...">
                </div>
                
                <div class="table-custom">
                    <table class="table">
                        <thead>
                            <tr><th>Endereço</th><th>Bairro</th><th>Membros</th><th>Telefone</th><th>Ações</th></tr>
                        </thead>
                        <tbody id="listaFamilias">
                            ${familias.map(f => `
                                <tr>
                                    <td>${f.endereco}</td>
                                    <td>${f.bairro}</td>
                                    <td>${f.membros}</td>
                                    <td>${f.telefone || '-'}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger" onclick="excluirFamilia(${f.id})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            `).join('')}
                        </tbody>
                    </table>
                </div>
                
                <div id="modalFamilia" class="modal-custom">
                    <div class="modal-content-custom">
                        <h4><i class="fas fa-home"></i> Nova Família</h4>
                        <input type="text" id="endereco" class="form-control mb-2" placeholder="Endereço">
                        <input type="text" id="bairro" class="form-control mb-2" placeholder="Bairro">
                        <input type="number" id="membros" class="form-control mb-2" placeholder="Nº de Membros">
                        <input type="text" id="telefone" class="form-control mb-2" placeholder="Telefone">
                        <div class="mt-3">
                            <button class="btn-primary-custom" onclick="salvarFamilia()">Salvar</button>
                            <button class="btn btn-secondary" onclick="fecharModalFamilia()">Cancelar</button>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('buscaFamilia')?.addEventListener('input', (e) => {
                const busca = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('#listaFamilias tr');
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(busca) ? '' : 'none';
                });
            });
            
            window.abrirModalFamilia = () => document.getElementById('modalFamilia').style.display = 'flex';
            window.fecharModalFamilia = () => document.getElementById('modalFamilia').style.display = 'none';
            window.salvarFamilia = () => {
                const familiasAtuais = JSON.parse(localStorage.getItem('familias') || '[]');
                const nova = {
                    id: Date.now(),
                    endereco: document.getElementById('endereco').value,
                    bairro: document.getElementById('bairro').value,
                    membros: parseInt(document.getElementById('membros').value),
                    telefone: document.getElementById('telefone').value,
                    latitude: -23.5505,
                    longitude: -46.6333
                };
                familiasAtuais.push(nova);
                localStorage.setItem('familias', JSON.stringify(familiasAtuais));
                fecharModalFamilia();
                carregarPagina('familias');
                alert('Família cadastrada com sucesso!');
            };
            window.excluirFamilia = (id) => {
                if (confirm('Excluir esta família?')) {
                    let familiasAtuais = JSON.parse(localStorage.getItem('familias') || '[]');
                    familiasAtuais = familiasAtuais.filter(f => f.id !== id);
                    localStorage.setItem('familias', JSON.stringify(familiasAtuais));
                    carregarPagina('familias');
                }
            };
        }
        
        function carregarVisitas(container) {
            const familias = JSON.parse(localStorage.getItem('familias') || '[]');
            const visitas = JSON.parse(localStorage.getItem('visitas') || '[]');
            
            container.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-clinic-medical"></i> Registrar Nova Visita</h5>
                            <form id="formVisita">
                                <select id="familiaId" class="form-control mb-2" required>
                                    <option value="">Selecione a família</option>
                                    ${familias.map(f => `<option value="${f.id}">${f.endereco} - ${f.bairro}</option>`).join('')}
                                </select>
                                <select id="resultado" class="form-control mb-2" required>
                                    <option value="realizada">Realizada</option>
                                    <option value="recusada">Recusada</option>
                                    <option value="ausente">Morador Ausente</option>
                                    <option value="fechada">Residência Fechada</option>
                                </select>
                                <textarea id="observacoes" class="form-control mb-2" rows="3" placeholder="Observações..."></textarea>
                                <button type="submit" class="btn-primary-custom w-100">Salvar Visita</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-history"></i> Últimas Visitas</h5>
                            <div id="listaVisitas">
                                ${visitas.slice(0,10).map(v => {
                                    const familia = familias.find(f => f.id == v.familiaId);
                                    return `
                                        <div class="alert alert-info">
                                            <strong>${familia?.endereco || 'Família'}</strong><br>
                                            Data: ${v.data}<br>
                                            Resultado: ${v.resultado}<br>
                                            ${v.observacoes ? `Obs: ${v.observacoes}` : ''}
                                        </div>
                                    `;
                                }).join('') || '<p class="text-muted">Nenhuma visita registrada</p>'}
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            document.getElementById('formVisita')?.addEventListener('submit', (e) => {
                e.preventDefault();
                const visitasAtuais = JSON.parse(localStorage.getItem('visitas') || '[]');
                visitasAtuais.push({
                    id: Date.now(),
                    familiaId: parseInt(document.getElementById('familiaId').value),
                    resultado: document.getElementById('resultado').value,
                    observacoes: document.getElementById('observacoes').value,
                    data: new Date().toLocaleDateString('pt-BR')
                });
                localStorage.setItem('visitas', JSON.stringify(visitasAtuais));
                alert('Visita registrada com sucesso!');
                carregarPagina('visitas');
            });
        }
        
        function carregarFocos(container) {
            const focos = JSON.parse(localStorage.getItem('focos') || '[]');
            
            container.innerHTML = `
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4><i class="fas fa-bug"></i> Focos de Endemias</h4>
                    <button class="btn-primary-custom" onclick="abrirModalFoco()">
                        <i class="fas fa-plus"></i> Registrar Foco
                    </button>
                </div>
                
                <div class="row">
                    ${focos.map(f => `
                        <div class="col-md-4 mb-3">
                            <div class="stat-card">
                                <i class="fas fa-bug" style="font-size: 30px; color: #dc3545;"></i>
                                <h5>${f.tipo}</h5>
                                <p>${f.descricao}</p>
                                <small class="text-muted">${f.data}</small>
                                <br>
                                <span class="badge ${f.status === 'pendente' ? 'bg-warning' : 'bg-success'}">${f.status}</span>
                            </div>
                        </div>
                    `).join('') || '<div class="col-12"><p class="text-muted">Nenhum foco registrado</p></div>'}
                </div>
                
                <div id="modalFoco" class="modal-custom">
                    <div class="modal-content-custom">
                        <h4><i class="fas fa-bug"></i> Registrar Foco</h4>
                        <select id="tipoFoco" class="form-control mb-2">
                            <option value="dengue">Dengue</option>
                            <option value="zika">Zika</option>
                            <option value="chikungunya">Chikungunya</option>
                        </select>
                        <input type="text" id="localFoco" class="form-control mb-2" placeholder="Local">
                        <textarea id="descricaoFoco" class="form-control mb-2" rows="3" placeholder="Descrição"></textarea>
                        <div class="mt-3">
                            <button class="btn-primary-custom" onclick="salvarFoco()">Salvar</button>
                            <button class="btn btn-secondary" onclick="fecharModalFoco()">Cancelar</button>
                        </div>
                    </div>
                </div>
            `;
            
            window.abrirModalFoco = () => document.getElementById('modalFoco').style.display = 'flex';
            window.fecharModalFoco = () => document.getElementById('modalFoco').style.display = 'none';
            window.salvarFoco = () => {
                const focosAtuais = JSON.parse(localStorage.getItem('focos') || '[]');
                focosAtuais.push({
                    id: Date.now(),
                    tipo: document.getElementById('tipoFoco').value,
                    local: document.getElementById('localFoco').value,
                    descricao: document.getElementById('descricaoFoco').value,
                    data: new Date().toLocaleDateString('pt-BR'),
                    status: 'pendente'
                });
                localStorage.setItem('focos', JSON.stringify(focosAtuais));
                fecharModalFoco();
                carregarPagina('focos');
                alert('Foco registrado com sucesso!');
            };
        }
        
        function carregarRotas(container) {
            container.innerHTML = `
                <div class="table-custom p-3">
                    <h5><i class="fas fa-route"></i> Planejamento de Rotas</h5>
                    <p>Configure as rotas diárias para visitas domiciliares</p>
                    <button class="btn-primary-custom" onclick="alert('Funcionalidade em desenvolvimento')">
                        <i class="fas fa-map"></i> Gerar Rota do Dia
                    </button>
                </div>
            `;
        }
        
        function carregarAlertas(container) {
            const alertas = JSON.parse(localStorage.getItem('alertas') || '[]');
            
            container.innerHTML = `
                <h4><i class="fas fa-exclamation-triangle"></i> Alertas de Casos Graves</h4>
                <div class="row">
                    ${alertas.map(a => `
                        <div class="col-md-6 mb-3">
                            <div class="stat-card">
                                <div class="badge-${a.gravidade}">${a.gravidade.toUpperCase()}</div>
                                <h5>${a.titulo}</h5>
                                <p>${a.descricao}</p>
                                <small>${a.data}</small>
                                <br>
                                <span class="badge ${a.status === 'pendente' ? 'bg-warning' : 'bg-success'}">${a.status}</span>
                            </div>
                        </div>
                    `).join('') || '<div class="col-12"><p class="text-muted">Nenhum alerta registrado</p></div>'}
                </div>
            `;
        }
        
        function carregarRelatorios(container) {
            const familias = JSON.parse(localStorage.getItem('familias') || '[]');
            const visitas = JSON.parse(localStorage.getItem('visitas') || '[]');
            const focos = JSON.parse(localStorage.getItem('focos') || '[]');
            
            container.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-chart-bar"></i> Relatório Geral</h5>
                            <table class="table">
                                <tr><td>Total de Famílias</td><td><strong>${familias.length}</strong></td></tr>
                                <tr><td>Total de Visitas</td><td><strong>${visitas.length}</strong></td></tr>
                                <tr><td>Total de Focos</td><td><strong>${focos.length}</strong></td></tr>
                                <tr><td>Média de Membros por Família</td><td><strong>${(familias.reduce((acc, f) => acc + f.membros, 0) / familias.length || 0).toFixed(1)}</strong></td></tr>
                            </table>
                            <button class="btn-primary-custom" onclick="exportarRelatorio()">
                                <i class="fas fa-download"></i> Exportar Relatório
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-chart-pie"></i> Distribuição por Bairro</h5>
                            <canvas id="graficoBairros" height="250"></canvas>
                        </div>
                    </div>
                </div>
            `;
            
            const bairros = {};
            familias.forEach(f => bairros[f.bairro] = (bairros[f.bairro] || 0) + 1);
            const ctx = document.getElementById('graficoBairros')?.getContext('2d');
            if (ctx) {
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: Object.keys(bairros),
                        datasets: [{ data: Object.values(bairros), backgroundColor: ['#667eea', '#28a745', '#dc3545', '#ffc107', '#17a2b8'] }]
                    }
                });
            }
            
            window.exportarRelatorio = () => {
                const relatorio = `RELATÓRIO ACE/ACS\nData: ${new Date().toLocaleString()}\n\nTotal Famílias: ${familias.length}\nTotal Visitas: ${visitas.length}\nTotal Focos: ${focos.length}\n\nDetalhamento:\n${familias.map(f => `- ${f.endereco}: ${f.membros} membros`).join('\n')}`;
                const blob = new Blob([relatorio], { type: 'text/plain' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = `relatorio_ace_acs_${new Date().toISOString().split('T')[0]}.txt`;
                link.click();
                alert('Relatório exportado com sucesso!');
            };
        }
        
        function carregarHistorico(container) {
            const visitas = JSON.parse(localStorage.getItem('visitas') || '[]');
            const familias = JSON.parse(localStorage.getItem('familias') || '[]');
            
            container.innerHTML = `
                <div class="table-custom p-3">
                    <h5><i class="fas fa-history"></i> Histórico Completo</h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr><th>Data</th><th>Família</th><th>Resultado</th><th>Observações</th></tr>
                            </thead>
                            <tbody>
                                ${visitas.map(v => {
                                    const familia = familias.find(f => f.id == v.familiaId);
                                    return `
                                        <tr>
                                            <td>${v.data}</td>
                                            <td>${familia?.endereco || 'Família ' + v.familiaId}</td>
                                            <td>${v.resultado}</td>
                                            <td>${v.observacoes || '-'}</td>
                                        </tr>
                                    `;
                                }).join('') || '<tr><td colspan="4">Nenhum registro encontrado</td></tr>'}
                            </tbody>
                        </table>
                    </div>
                </div>
            `;
        }
        
        function carregarPerfil(container) {
            const user = JSON.parse(localStorage.getItem('usuario') || '{"nome":"Agente","cpf":"123"}');
            container.innerHTML = `
                <div class="row">
                    <div class="col-md-4">
                        <div class="table-custom p-3 text-center">
                            <div class="user-avatar" style="width: 100px; height: 100px; margin: 0 auto 20px;">
                                <i class="fas fa-user-md" style="font-size: 50px;"></i>
                            </div>
                            <h4>${user.nome}</h4>
                            <p class="text-muted">Agente Comunitário de Saúde</p>
                            <hr>
                            <p><i class="fas fa-envelope"></i> ${user.cpf}@saude.gov.br</p>
                            <p><i class="fas fa-phone"></i> (11) 99999-9999</p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="table-custom p-3">
                            <h5><i class="fas fa-chart-line"></i> Minhas Estatísticas</h5>
                            <table class="table">
                                <tr><td>Total de Visitas</td><td><strong>${JSON.parse(localStorage.getItem('visitas') || '[]').length}</strong></td></tr>
                                <tr><td>Famílias Atendidas</td><td><strong>${new Set(JSON.parse(localStorage.getItem('visitas') || '[]').map(v => v.familiaId)).size}</strong></td></tr>
                                <tr><td>Focos Registrados</td><td><strong>${JSON.parse(localStorage.getItem('focos') || '[]').length}</strong></td></tr>
                            </table>
                        </div>
                    </div>
                </div>
            `;
        }
        
        init();
        carregarPagina('dashboard');
    </script>
</body>
</html>
