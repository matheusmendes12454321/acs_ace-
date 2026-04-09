<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ ucfirst(str_replace('_', ' ', '$pasta')) }} - ACS/ACE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f0f2f5; font-family: 'Segoe UI', sans-serif; }
        .sidebar { position: fixed; left: 0; top: 0; width: 260px; height: 100%; background: linear-gradient(135deg, #0066b3 0%, #003d6b 100%); color: white; padding-top: 20px; }
        .sidebar h4 { text-align: center; margin-bottom: 30px; }
        .sidebar a { display: block; padding: 12px 20px; color: white; text-decoration: none; transition: 0.3s; }
        .sidebar a:hover { background: #00a8ff; }
        .main-content { margin-left: 260px; padding: 20px; }
        .top-bar { background: white; padding: 15px 20px; border-radius: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center; }
        .btn-logout { background: #dc3545; color: white; border: none; padding: 8px 20px; border-radius: 8px; cursor: pointer; }
        .card { background: white; border-radius: 15px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4><i class="fas fa-heartbeat"></i> ACS/ACE</h4>
        <a href="/admin_dashboard"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="/familias"><i class="fas fa-home"></i> Famílias</a>
        <a href="/visitas"><i class="fas fa-calendar-check"></i> Visitas</a>
        <a href="/alertas"><i class="fas fa-exclamation-triangle"></i> Alertas</a>
        <a href="/relatorios"><i class="fas fa-chart-line"></i> Relatórios</a>
    </div>
    <div class="main-content">
        <div class="top-bar">
            <h3>{{ ucfirst(str_replace('_', ' ', '$pasta')) }}</h3>
            <button class="btn-logout" onclick="logout()"><i class="fas fa-sign-out-alt"></i> Sair</button>
        </div>
        <div class="card">
            <h4>Bem-vindo ao sistema!</h4>
            <p>Esta é a página de {{ ucfirst(str_replace('_', ' ', '$pasta')) }}.</p>
        </div>
    </div>
    <script>
        function logout() { localStorage.removeItem('usuario'); window.location.href = '/login'; }
        const user = localStorage.getItem('usuario');
        if (!user) window.location.href = '/login';
    </script>
</body>
</html>
