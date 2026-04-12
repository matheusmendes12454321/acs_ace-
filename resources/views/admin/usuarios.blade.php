@extends('layouts.master')

@section('title', 'Gestão de Usuários')

@section('content')
<div class="row g-3 g-md-4 mb-4">
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-primary fs-2">142</h3><small>Total</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-success fs-2">12</h3><small>Supervisores</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-info fs-2">130</h3><small>Agentes</small></div></div>
    <div class="col-6 col-md-3"><div class="card-custom text-center"><h3 class="fw-bold text-warning fs-2">3</h3><small>Pendentes</small></div></div>
</div>
<div class="card-custom">
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center mb-4 gap-3">
        <div class="d-flex gap-2 flex-wrap"><input type="text" class="form-control" placeholder="Buscar..." style="border-radius:12px; width:200px;"><select class="form-select" style="border-radius:12px; width:130px;"><option>Todos</option><option>ACS</option><option>ACE</option></select></div>
        <button class="btn btn-grad" data-bs-toggle="modal" data-bs-target="#userModal"><i class="fas fa-plus me-2"></i>Novo Usuário</button>
    </div>
    <div class="table-responsive-custom">
        <table class="table-custom w-100">
            <thead><tr><th>Profissional</th><th>Cargo</th><th>Área</th><th>Status</th><th>Ações</th></tr></thead>
            <tbody>
                <tr><td><strong>Ricardo Mendonça</strong><br><small class="text-muted">ricardo.m@saude.gov</small></td><td><span class="badge-status bg-primary-subtle text-primary">SUPERVISOR</span></td><td class="text-muted small">Setor 04</td><td><span class="badge-status bg-success-subtle text-success">Ativo</span></td><td><button class="btn btn-sm btn-light me-1" onclick="alert('Editar')"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-light text-danger" onclick="if(confirm('Excluir?')) alert('Excluído')"><i class="fas fa-trash"></i></button></td></tr>
                <tr><td><strong>Ana Souza Lima</strong><br><small class="text-muted">ana.lima@saude.gov</small></td><td><span class="badge-status bg-info-subtle text-info">ACS</span></td><td class="text-muted small">Setor 12</td><td><span class="badge-status bg-success-subtle text-success">Ativo</span></td><td><button class="btn btn-sm btn-light me-1" onclick="alert('Editar')"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-light text-danger" onclick="if(confirm('Excluir?')) alert('Excluído')"><i class="fas fa-trash"></i></button></td></tr>
                <tr><td><strong>João Batista</strong><br><small class="text-muted">j.batista@saude.gov</small></td><td><span class="badge-status bg-warning-subtle text-warning">ACE</span></td><td class="text-muted small">Setor 08</td><td><span class="badge-status bg-danger-subtle text-danger">Bloqueado</span></td><td><button class="btn btn-sm btn-light me-1" onclick="alert('Editar')"><i class="fas fa-edit"></i></button><button class="btn btn-sm btn-light text-danger" onclick="if(confirm('Excluir?')) alert('Excluído')"><i class="fas fa-trash"></i></button></td></tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Novo Usuário -->
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-custom">
            <div class="modal-header border-0"><h5 class="modal-title fw-bold"><i class="fas fa-user-plus me-2"></i>Novo Usuário</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div>
            <div class="modal-body"><form><div class="mb-3"><label class="form-label">Nome</label><input type="text" class="form-control"></div><div class="mb-3"><label class="form-label">E-mail</label><input type="email" class="form-control"></div><div class="mb-3"><label class="form-label">Função</label><select class="form-select"><option>ACS</option><option>ACE</option></select></div></form></div>
            <div class="modal-footer border-0"><button class="btn btn-outline-custom" data-bs-dismiss="modal">Cancelar</button><button class="btn btn-grad" onclick="alert('Usuário salvo!')">Salvar</button></div>
        </div>
    </div>
</div>
@endsection
