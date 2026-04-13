@extends('layouts.master')

@section('title', 'Cadastro de Agentes')

@section('content')
<style>
    .foto-preview {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #00426d;
        background: #f0f4f8;
    }
    .foto-placeholder {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: #f0f4f8;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px dashed #00426d;
        cursor: pointer;
    }
    .form-section {
        background: #f8fafc;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
    }
    .form-section-title {
        font-size: 18px;
        font-weight: 600;
        color: #00426d;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e2e8f0;
    }
</style>

<div class="card-custom">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0"><i class="fas fa-user-plus me-2"></i>Cadastro de Agentes</h4>
        <button class="btn btn-outline-custom" onclick="window.location.href='{{ route('admin.agentes.lista') }}'">
            <i class="fas fa-list me-2"></i>Ver Lista
        </button>
    </div>
    
    <form id="agenteForm" enctype="multipart/form-data">
        @csrf
        
        <!-- Foto -->
        <div class="form-section">
            <div class="form-section-title"><i class="fas fa-camera me-2"></i>Foto do Agente</div>
            <div class="text-center">
                <div id="fotoPreview" class="foto-placeholder mx-auto" onclick="document.getElementById('fotoInput').click()">
                    <i class="fas fa-camera fa-3x text-muted"></i>
                    <p class="small text-muted mt-2 mb-0">Clique para adicionar foto</p>
                </div>
                <input type="file" id="fotoInput" name="foto" accept="image/*" style="display: none;" onchange="previewFoto(this)">
                <small class="text-muted d-block mt-2">Formatos: JPG, PNG. Tamanho máximo: 5MB</small>
            </div>
        </div>
        
        <!-- Dados Pessoais -->
        <div class="form-section">
            <div class="form-section-title"><i class="fas fa-user me-2"></i>Dados Pessoais</div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nome Completo *</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">E-mail *</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">CPF *</label>
                    <input type="text" name="cpf" class="form-control cpf-mask" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">RG *</label>
                    <input type="text" name="rg" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Data de Nascimento *</label>
                    <input type="date" name="data_nascimento" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Telefone *</label>
                    <input type="text" name="telefone" class="form-control telefone-mask" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Celular</label>
                    <input type="text" name="celular" class="form-control celular-mask">
                </div>
            </div>
        </div>
        
        <!-- Endereço -->
        <div class="form-section">
            <div class="form-section-title"><i class="fas fa-map-marker-alt me-2"></i>Endereço</div>
            <div class="row g-3">
                <div class="col-md-8">
                    <label class="form-label">Endereço *</label>
                    <input type="text" name="endereco" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Número *</label>
                    <input type="text" name="numero" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Complemento</label>
                    <input type="text" name="complemento" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Bairro *</label>
                    <input type="text" name="bairro" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cidade *</label>
                    <input type="text" name="cidade" class="form-control" value="São Paulo" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label">UF *</label>
                    <select name="uf" class="form-select" required>
                        <option value="SP">SP</option><option value="RJ">RJ</option><option value="MG">MG</option>
                        <option value="BA">BA</option><option value="PR">PR</option><option value="RS">RS</option>
                        <option value="SC">SC</option><option value="PE">PE</option><option value="CE">CE</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">CEP *</label>
                    <input type="text" name="cep" class="form-control cep-mask" required>
                </div>
            </div>
        </div>
        
        <!-- Dados Profissionais -->
        <div class="form-section">
            <div class="form-section-title"><i class="fas fa-briefcase me-2"></i>Dados Profissionais</div>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Função *</label>
                    <select name="funcao" class="form-select" required>
                        <option value="">Selecione</option>
                        <option value="acs">Agente Comunitário de Saúde (ACS)</option>
                        <option value="ace">Agente de Combate a Endemias (ACE)</option>
                        <option value="enfermeiro">Enfermeiro</option>
                        <option value="supervisor">Supervisor</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Cargo *</label>
                    <input type="text" name="cargo" class="form-control" placeholder="Ex: Agente de Saúde" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Microárea</label>
                    <select name="microarea_id" class="form-select" id="microareaSelect">
                        <option value="">Selecionar Microárea</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Registro Profissional</label>
                    <input type="text" name="registro_profissional" class="form-control" placeholder="COREN/CRBM...">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Data de Admissão *</label>
                    <input type="date" name="data_admissao" class="form-control" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="ativo" class="form-select">
                        <option value="1">Ativo</option>
                        <option value="0">Inativo</option>
                    </select>
                </div>
            </div>
        </div>
        
        <!-- Dados de Acesso -->
        <div class="form-section">
            <div class="form-section-title"><i class="fas fa-lock me-2"></i>Dados de Acesso</div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Senha *</label>
                    <input type="password" name="password" class="form-control" required>
                    <small class="text-muted">Mínimo 6 caracteres</small>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirmar Senha *</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
            </div>
        </div>
        
        <!-- Observações -->
        <div class="form-section">
            <div class="form-section-title"><i class="fas fa-notes-medical me-2"></i>Observações</div>
            <textarea name="observacoes" class="form-control" rows="3" placeholder="Informações adicionais sobre o agente..."></textarea>
        </div>
        
        <div class="d-flex justify-content-end gap-2 mt-4">
            <button type="button" class="btn btn-outline-custom" onclick="window.location.href='{{ route('admin.dashboard') }}'">
                Cancelar
            </button>
            <button type="submit" class="btn btn-grad">
                <i class="fas fa-save me-2"></i>Cadastrar Agente
            </button>
        </div>
    </form>
</div>

<script>
    // Máscaras
    document.querySelectorAll('.cpf-mask').forEach(el => {
        el.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d)/, '$1.$2');
                value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                e.target.value = value;
            }
        });
    });
    
    document.querySelectorAll('.telefone-mask, .celular-mask').forEach(el => {
        el.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/(\d{2})(\d)/, '($1) $2');
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
                e.target.value = value;
            }
        });
    });
    
    document.querySelectorAll('.cep-mask').forEach(el => {
        el.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 8) {
                value = value.replace(/(\d{5})(\d)/, '$1-$2');
                e.target.value = value;
            }
        });
    });
    
    // Preview da foto
    function previewFoto(input) {
        const preview = document.getElementById('fotoPreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="foto-preview">`;
                preview.classList.remove('foto-placeholder');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    // Carregar microáreas
    async function carregarMicroareas() {
        const select = document.getElementById('microareaSelect');
        // Simulando dados - depois conecta com o back
        const microareas = [
            { id: 1, nome: 'Microárea 01 - Centro' },
            { id: 2, nome: 'Microárea 02 - Norte' },
            { id: 3, nome: 'Microárea 03 - Sul' }
        ];
        select.innerHTML = '<option value="">Selecionar Microárea</option>';
        microareas.forEach(m => {
            select.innerHTML += `<option value="${m.id}">${m.nome}</option>`;
        });
    }
    
    carregarMicroareas();
    
    // Submit do formulário
    document.getElementById('agenteForm').onsubmit = async (e) => {
        e.preventDefault();
        const senha = document.querySelector('[name="password"]').value;
        const confirm = document.querySelector('[name="password_confirmation"]').value;
        
        if (senha !== confirm) {
            alert('As senhas não coincidem!');
            return;
        }
        
        if (senha.length < 6) {
            alert('A senha deve ter no mínimo 6 caracteres!');
            return;
        }
        
        alert('Agente cadastrado com sucesso! (Banco de dados será conectado em breve)');
        // Aqui depois será feita a requisição AJAX para o backend
    };
</script>
@endsection
