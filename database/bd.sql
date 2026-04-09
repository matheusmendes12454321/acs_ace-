-- ============================================
-- SISTEMA ACS/ACE - BANCO DE DADOS COMPLETO
-- ============================================

-- Criar banco de dados (MySQL/MariaDB)
CREATE DATABASE IF NOT EXISTS acs_ace_system;
USE acs_ace_system;

-- ============================================
-- 1. TABELA DE USUÁRIOS
-- ============================================
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    funcao ENUM('administrador', 'supervisor', 'acs', 'ace') NOT NULL,
    tipo_usuario VARCHAR(50),
    microarea_id INT,
    telefone VARCHAR(20),
    cns VARCHAR(50),
    ativo BOOLEAN DEFAULT TRUE,
    ultimo_acesso DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================
-- 2. TABELA DE MICROÁREAS
-- ============================================
CREATE TABLE IF NOT EXISTS microareas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    codigo VARCHAR(20) UNIQUE NOT NULL,
    descricao TEXT,
    populacao_estimada INT DEFAULT 0,
    familias_estimadas INT DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================
-- 3. TABELA DE FAMÍLIAS
-- ============================================
CREATE TABLE IF NOT EXISTS families (
    id INT PRIMARY KEY AUTO_INCREMENT,
    endereco VARCHAR(200) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    complemento VARCHAR(100),
    bairro VARCHAR(100) NOT NULL,
    cep VARCHAR(10),
    microarea_id INT,
    responsavel_nome VARCHAR(100),
    responsavel_cpf VARCHAR(14),
    responsavel_telefone VARCHAR(20),
    membros INT DEFAULT 1,
    renda_familiar DECIMAL(10,2),
    bolsa_familia BOOLEAN DEFAULT FALSE,
    criancas_menores_5 INT DEFAULT 0,
    gestantes INT DEFAULT 0,
    idosos INT DEFAULT 0,
    deficientes INT DEFAULT 0,
    hipertensos INT DEFAULT 0,
    diabeticos INT DEFAULT 0,
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8),
    observacoes TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (microarea_id) REFERENCES microareas(id) ON DELETE SET NULL
);

-- ============================================
-- 4. TABELA DE MEMBROS DA FAMÍLIA
-- ============================================
CREATE TABLE IF NOT EXISTS family_members (
    id INT PRIMARY KEY AUTO_INCREMENT,
    family_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    data_nascimento DATE,
    idade INT,
    cpf VARCHAR(14),
    rg VARCHAR(20),
    cartao_sus VARCHAR(50),
    parentesco VARCHAR(50),
    sexo ENUM('M', 'F', 'Outro'),
    raca_cor VARCHAR(30),
    escolaridade VARCHAR(50),
    ocupacao VARCHAR(100),
    peso DECIMAL(5,2),
    altura DECIMAL(3,2),
    tipo_sanguineo VARCHAR(3),
    gestante BOOLEAN DEFAULT FALSE,
    semanas_gestacao INT,
    aleitamento BOOLEAN DEFAULT FALSE,
    fumante BOOLEAN DEFAULT FALSE,
    etilista BOOLEAN DEFAULT FALSE,
    doencas TEXT,
    alergias TEXT,
    medicamentos TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (family_id) REFERENCES families(id) ON DELETE CASCADE
);

-- ============================================
-- 5. TABELA DE VISITAS DOMICILIARES
-- ============================================
CREATE TABLE IF NOT EXISTS visits (
    id INT PRIMARY KEY AUTO_INCREMENT,
    family_id INT NOT NULL,
    agente_id INT NOT NULL,
    data_visita DATE NOT NULL,
    hora TIME,
    resultado ENUM('realizada', 'ausente', 'recusada', 'fechada', 'reagendada') DEFAULT 'realizada',
    motivo VARCHAR(100),
    observacoes TEXT,
    acoes TEXT,
    orientacoes TEXT,
    demandas TEXT,
    encaminhamentos TEXT,
    peso_kg DECIMAL(5,2),
    altura_m DECIMAL(3,2),
    imc DECIMAL(4,2),
    pressao_sistolica INT,
    pressao_diastolica INT,
    temperatura DECIMAL(4,1),
    glicemia DECIMAL(5,2),
    saturacao INT,
    queixas TEXT,
    vacinas_aplicadas TEXT,
    exames_solicitados TEXT,
    is_offline BOOLEAN DEFAULT FALSE,
    synced_at DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (family_id) REFERENCES families(id) ON DELETE CASCADE,
    FOREIGN KEY (agente_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- 6. TABELA DE AGENDAMENTO DE VISITAS
-- ============================================
CREATE TABLE IF NOT EXISTS schedule_visits (
    id INT PRIMARY KEY AUTO_INCREMENT,
    family_id INT NOT NULL,
    agente_id INT NOT NULL,
    data_agendada DATE NOT NULL,
    hora_agendada TIME,
    status ENUM('pendente', 'confirmada', 'realizada', 'cancelada', 'remarcada') DEFAULT 'pendente',
    lembrete_enviado BOOLEAN DEFAULT FALSE,
    observacoes TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (family_id) REFERENCES families(id) ON DELETE CASCADE,
    FOREIGN KEY (agente_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- 7. TABELA DE FOCOS DE ENDEMIAS
-- ============================================
CREATE TABLE IF NOT EXISTS endemics_focus (
    id INT PRIMARY KEY AUTO_INCREMENT,
    tipo ENUM('dengue', 'zika', 'chikungunya', 'escorpiao', 'aranha', 'ratos', 'mosquito') NOT NULL,
    local VARCHAR(200) NOT NULL,
    descricao TEXT,
    agente_id INT NOT NULL,
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8),
    foto VARCHAR(255),
    imoveis_visitados INT DEFAULT 0,
    imoveis_fechados INT DEFAULT 0,
    criadouros_eliminados INT DEFAULT 0,
    tratamento_realizado TEXT,
    status ENUM('pendente', 'em_analise', 'tratado', 'monitoramento', 'resolvido') DEFAULT 'pendente',
    is_offline BOOLEAN DEFAULT FALSE,
    synced_at DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (agente_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- 8. TABELA DE ALERTAS DE CASOS GRAVES
-- ============================================
CREATE TABLE IF NOT EXISTS alerts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(200) NOT NULL,
    descricao TEXT NOT NULL,
    gravidade ENUM('baixa', 'media', 'alta', 'critica') DEFAULT 'media',
    tipo VARCHAR(50),
    visit_id INT,
    agente_id INT,
    status ENUM('pendente', 'visualizado', 'em_andamento', 'resolvido', 'ignorado') DEFAULT 'pendente',
    lida BOOLEAN DEFAULT FALSE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (visit_id) REFERENCES visits(id) ON DELETE SET NULL,
    FOREIGN KEY (agente_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ============================================
-- 9. TABELA DE NOTIFICAÇÕES
-- ============================================
CREATE TABLE IF NOT EXISTS notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    titulo VARCHAR(200) NOT NULL,
    mensagem TEXT NOT NULL,
    tipo ENUM('info', 'success', 'warning', 'danger', 'alerta') DEFAULT 'info',
    lida BOOLEAN DEFAULT FALSE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- 10. TABELA DE ROTAS DIÁRIAS
-- ============================================
CREATE TABLE IF NOT EXISTS routes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    agente_id INT NOT NULL,
    data_rota DATE NOT NULL,
    familias_ids JSON,
    ordem_visitas JSON,
    distancia_total_km DECIMAL(8,2),
    duracao_estimada_minutos INT,
    status ENUM('pendente', 'iniciada', 'concluida', 'cancelada') DEFAULT 'pendente',
    iniciada_em DATETIME,
    concluida_em DATETIME,
    observacoes TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (agente_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- 11. TABELA DE VACINAS
-- ============================================
CREATE TABLE IF NOT EXISTS vaccines (
    id INT PRIMARY KEY AUTO_INCREMENT,
    member_id INT NOT NULL,
    vacina VARCHAR(100) NOT NULL,
    dose INT DEFAULT 1,
    data_aplicacao DATE,
    lote VARCHAR(50),
    unidade_saude VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES family_members(id) ON DELETE CASCADE
);

-- ============================================
-- 12. TABELA DE EXAMES
-- ============================================
CREATE TABLE IF NOT EXISTS exams (
    id INT PRIMARY KEY AUTO_INCREMENT,
    member_id INT NOT NULL,
    visita_id INT,
    tipo_exame VARCHAR(100) NOT NULL,
    data_solicitacao DATE,
    data_realizacao DATE,
    data_resultado DATE,
    resultado TEXT,
    status ENUM('solicitado', 'agendado', 'realizado', 'resultado', 'cancelado') DEFAULT 'solicitado',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES family_members(id) ON DELETE CASCADE,
    FOREIGN KEY (visita_id) REFERENCES visits(id) ON DELETE SET NULL
);

-- ============================================
-- 13. TABELA DE ENCAMINHAMENTOS
-- ============================================
CREATE TABLE IF NOT EXISTS referrals (
    id INT PRIMARY KEY AUTO_INCREMENT,
    member_id INT NOT NULL,
    visita_id INT,
    tipo_encaminhamento VARCHAR(100) NOT NULL,
    especialidade VARCHAR(100),
    destino VARCHAR(200) NOT NULL,
    data_encaminhamento DATE,
    data_agendamento DATE,
    status ENUM('pendente', 'agendado', 'atendido', 'cancelado', 'perdido') DEFAULT 'pendente',
    motivo TEXT,
    retorno TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES family_members(id) ON DELETE CASCADE,
    FOREIGN KEY (visita_id) REFERENCES visits(id) ON DELETE SET NULL
);

-- ============================================
-- 14. TABELA DE LOGS DE AUDITORIA
-- ============================================
CREATE TABLE IF NOT EXISTS audit_logs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    acao VARCHAR(100) NOT NULL,
    tabela VARCHAR(50),
    registro_id INT,
    valores_antigos JSON,
    valores_novos JSON,
    ip_address VARCHAR(45),
    user_agent TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- ============================================
-- 15. TABELA DE DADOS OFFLINE
-- ============================================
CREATE TABLE IF NOT EXISTS offline_data (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    tabela VARCHAR(50) NOT NULL,
    dados JSON NOT NULL,
    operacao ENUM('create', 'update', 'delete') NOT NULL,
    status ENUM('pending', 'synced', 'failed') DEFAULT 'pending',
    tentativas INT DEFAULT 0,
    erro_mensagem TEXT,
    synced_at DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- ============================================
-- 16. TABELA DE CONFIGURAÇÕES DO SISTEMA
-- ============================================
CREATE TABLE IF NOT EXISTS settings (
    id INT PRIMARY KEY AUTO_INCREMENT,
    chave VARCHAR(100) UNIQUE NOT NULL,
    valor TEXT,
    grupo VARCHAR(50) DEFAULT 'geral',
    tipo ENUM('string', 'integer', 'boolean', 'json') DEFAULT 'string',
    descricao TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- ============================================
-- INSERIR DADOS INICIAIS
-- ============================================

-- Inserir usuários padrão
INSERT INTO users (nome, email, cpf, senha, funcao) VALUES
('Administrador', 'admin@gmail.com', '000.000.000-00', MD5('admin123'), 'administrador'),
('Supervisor Geral', 'supervisor@gmail.com', '111.111.111-11', MD5('super123'), 'supervisor'),
('João Silva - ACS', 'acs@gmail.com', '123.456.789-00', MD5('acs123'), 'acs'),
('Maria Santos - ACE', 'ace@gmail.com', '123.456.789-01', MD5('ace123'), 'ace');

-- Inserir microáreas
INSERT INTO microareas (nome, codigo, descricao, populacao_estimada, familias_estimadas) VALUES
('Centro', 'CT-001', 'Região central da cidade', 2500, 800),
('Jardim América', 'JA-001', 'Bairro residencial Jardim América', 3800, 1200),
('Vila Nova', 'VN-001', 'Região norte da cidade', 4200, 1350),
('Parque das Flores', 'PF-001', 'Área nobre, condomínios', 1800, 550);

-- Inserir configurações padrão
INSERT INTO settings (chave, valor, grupo, descricao) VALUES
('sistema_nome', 'ACS/ACE Portal', 'geral', 'Nome do sistema'),
('versao', '4.2.0', 'geral', 'Versão do sistema'),
('sincronizacao_automatica', 'true', 'offline', 'Sincronização automática de dados offline'),
('tempo_sincronizacao_segundos', '30', 'offline', 'Tempo de sincronização em segundos'),
('notificacoes_ativas', 'true', 'notificacoes', 'Ativar notificações push'),
('meta_visitas_mensal', '1500', 'metas', 'Meta de visitas mensal');

-- Inserir notificações iniciais
INSERT INTO notifications (user_id, titulo, mensagem, tipo) VALUES
(1, 'Sistema disponível', 'O sistema ACS/ACE está pronto para uso', 'success'),
(1, 'Campanha de vacinação', 'Iniciada campanha de vacinação contra gripe', 'info'),
(2, 'Meta do mês', 'Meta de visitas do mês é de 1500 atendimentos', 'warning');

-- Inserir alertas de exemplo
INSERT INTO alerts (titulo, descricao, gravidade, tipo, status) VALUES
('Gestante identificada', 'Família Silva possui gestante - acompanhamento necessário', 'alta', 'gravidez', 'pendente'),
('Foco de Dengue', 'Foco de dengue registrado na Rua das Palmeiras', 'critica', 'endemia', 'pendente'),
('Hipertenso descompensado', 'Paciente com pressão arterial elevada', 'media', 'saude', 'visualizado');

-- ============================================
-- VIEWS PARA RELATÓRIOS
-- ============================================

-- View de visitas por agente
CREATE VIEW view_visitas_por_agente AS
SELECT 
    u.id as agente_id,
    u.nome as agente_nome,
    COUNT(v.id) as total_visitas,
    SUM(CASE WHEN v.resultado = 'realizada' THEN 1 ELSE 0 END) as visitas_realizadas,
    SUM(CASE WHEN v.resultado = 'ausente' THEN 1 ELSE 0 END) as visitas_ausente,
    SUM(CASE WHEN v.resultado = 'recusada' THEN 1 ELSE 0 END) as visitas_recusadas,
    DATE_FORMAT(MIN(v.data_visita), '%Y-%m') as mes_referencia
FROM users u
LEFT JOIN visits v ON u.id = v.agente_id
WHERE u.funcao IN ('acs', 'ace')
GROUP BY u.id, u.nome, DATE_FORMAT(v.data_visita, '%Y-%m');

-- View de famílias por microárea
CREATE VIEW view_familias_por_microarea AS
SELECT 
    m.id as microarea_id,
    m.nome as microarea_nome,
    COUNT(f.id) as total_familias,
    SUM(f.membros) as total_membros,
    SUM(f.gestantes) as total_gestantes,
    SUM(f.idosos) as total_idosos,
    SUM(f.hipertensos) as total_hipertensos,
    SUM(f.diabeticos) as total_diabeticos
FROM microareas m
LEFT JOIN families f ON m.id = f.microarea_id
GROUP BY m.id, m.nome;

-- View de focos por status
CREATE VIEW view_focos_por_status AS
SELECT 
    status,
    COUNT(*) as total,
    tipo,
    DATE_FORMAT(created_at, '%Y-%m') as mes
FROM endemics_focus
GROUP BY status, tipo, DATE_FORMAT(created_at, '%Y-%m');

-- ============================================
-- PROCEDURES
-- ============================================

DELIMITER //

-- Procedure para atualizar estatísticas da família
CREATE PROCEDURE atualizar_estatisticas_familia(IN p_family_id INT)
BEGIN
    UPDATE families SET
        membros = (SELECT COUNT(*) FROM family_members WHERE family_id = p_family_id),
        gestantes = (SELECT COUNT(*) FROM family_members WHERE family_id = p_family_id AND gestante = TRUE),
        idosos = (SELECT COUNT(*) FROM family_members WHERE family_id = p_family_id AND idade >= 60),
        hipertensos = (SELECT COUNT(*) FROM family_members WHERE family_id = p_family_id AND doencas LIKE '%hipertens%'),
        diabeticos = (SELECT COUNT(*) FROM family_members WHERE family_id = p_family_id AND doencas LIKE '%diabet%')
    WHERE id = p_family_id;
END //

-- Procedure para gerar alerta de caso grave
CREATE PROCEDURE gerar_alerta_grave(
    IN p_titulo VARCHAR(200),
    IN p_descricao TEXT,
    IN p_gravidade VARCHAR(20),
    IN p_visit_id INT,
    IN p_agente_id INT
)
BEGIN
    INSERT INTO alerts (titulo, descricao, gravidade, visit_id, agente_id, status, created_at)
    VALUES (p_titulo, p_descricao, p_gravidade, p_visit_id, p_agente_id, 'pendente', NOW());
    
    -- Inserir notificação para supervisores
    INSERT INTO notifications (user_id, titulo, mensagem, tipo)
    SELECT id, p_titulo, p_descricao, 'danger'
    FROM users WHERE funcao = 'supervisor';
END //

DELIMITER ;

-- ============================================
-- TRIGGERS
-- ============================================

-- Trigger para atualizar idade do membro ao inserir
DELIMITER //
CREATE TRIGGER calcular_idade_membro
BEFORE INSERT ON family_members
FOR EACH ROW
BEGIN
    IF NEW.data_nascimento IS NOT NULL THEN
        SET NEW.idade = TIMESTAMPDIFF(YEAR, NEW.data_nascimento, CURDATE());
    END IF;
END //

-- Trigger para log de auditoria em usuários
CREATE TRIGGER log_audit_users
AFTER UPDATE ON users
FOR EACH ROW
BEGIN
    INSERT INTO audit_logs (user_id, acao, tabela, registro_id, valores_antigos, valores_novos)
    VALUES (NEW.id, 'UPDATE', 'users', NEW.id, 
            JSON_OBJECT('ativo', OLD.ativo, 'funcao', OLD.funcao),
            JSON_OBJECT('ativo', NEW.ativo, 'funcao', NEW.funcao));
END //

DELIMITER ;

-- ============================================
-- ÍNDICES PARA OTIMIZAÇÃO
-- ============================================

CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_users_cpf ON users(cpf);
CREATE INDEX idx_users_funcao ON users(funcao);
CREATE INDEX idx_families_bairro ON families(bairro);
CREATE INDEX idx_families_microarea ON families(microarea_id);
CREATE INDEX idx_visits_data ON visits(data_visita);
CREATE INDEX idx_visits_agente ON visits(agente_id);
CREATE INDEX idx_visits_family ON visits(family_id);
CREATE INDEX idx_endemics_status ON endemics_focus(status);
CREATE INDEX idx_endemics_tipo ON endemics_focus(tipo);
CREATE INDEX idx_alerts_gravidade ON alerts(gravidade);
CREATE INDEX idx_alerts_status ON alerts(status);
CREATE INDEX idx_notifications_user ON notifications(user_id);
CREATE INDEX idx_notifications_lida ON notifications(lida);

-- ============================================
-- CONSULTAS DE VERIFICAÇÃO
-- ============================================
SELECT '✅ Banco de dados criado com sucesso!' as Mensagem;
SELECT COUNT(*) as total_usuarios FROM users;
SELECT COUNT(*) as total_microareas FROM microareas;
SELECT COUNT(*) as total_configuracoes FROM settings;

-- ============================================
-- FIM DO SCRIPT
-- ============================================