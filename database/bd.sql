# ============================================
# 1. INSTALAR MYSQL NO DEBIAN
# ============================================

sudo apt update
sudo apt install -y mysql-server mysql-client
sudo systemctl start mysql
sudo systemctl enable mysql

# Configurar senha do MySQL
sudo mysql << EOF
ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'root123';
FLUSH PRIVILEGES;
EXIT;
EOF

# Criar banco de dados e tabelas (sem dados pré-carregados)
sudo mysql -u root -proot123 << EOF
CREATE DATABASE IF NOT EXISTS acs_ace_system;
USE acs_ace_system;

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    cpf VARCHAR(14) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    funcao ENUM('admin', 'supervisor', 'acs', 'ace') NOT NULL,
    microarea_id INT NULL,
    ativo BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de microáreas
CREATE TABLE IF NOT EXISTS microareas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    codigo VARCHAR(50) UNIQUE NOT NULL,
    descricao TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de famílias
CREATE TABLE IF NOT EXISTS families (
    id INT AUTO_INCREMENT PRIMARY KEY,
    endereco VARCHAR(255) NOT NULL,
    numero VARCHAR(20) NOT NULL,
    bairro VARCHAR(255) NOT NULL,
    complemento VARCHAR(255),
    microarea_id INT,
    membros INT DEFAULT 1,
    telefone VARCHAR(20),
    grupo_risco VARCHAR(100),
    latitude DECIMAL(10,8),
    longitude DECIMAL(11,8),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (microarea_id) REFERENCES microareas(id) ON DELETE SET NULL
);

-- Tabela de membros da família
CREATE TABLE IF NOT EXISTS family_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    family_id INT NOT NULL,
    nome VARCHAR(255) NOT NULL,
    data_nascimento DATE,
    parentesco VARCHAR(100),
    possui_doenca_cronica BOOLEAN DEFAULT FALSE,
    doenca_descricao TEXT,
    FOREIGN KEY (family_id) REFERENCES families(id) ON DELETE CASCADE
);

-- Tabela de visitas
CREATE TABLE IF NOT EXISTS visits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    family_id INT NOT NULL,
    agente_id INT NOT NULL,
    data_visita DATE NOT NULL,
    resultado ENUM('realizada', 'ausente', 'recusada', 'fechada') DEFAULT 'realizada',
    observacoes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (family_id) REFERENCES families(id) ON DELETE CASCADE,
    FOREIGN KEY (agente_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tabela de focos de endemias
CREATE TABLE IF NOT EXISTS endemics_focus (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tipo VARCHAR(100) NOT NULL,
    local VARCHAR(255) NOT NULL,
    descricao TEXT,
    agente_id INT NOT NULL,
    status ENUM('pendente', 'tratado', 'monitoramento') DEFAULT 'pendente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (agente_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Tabela de alertas
CREATE TABLE IF NOT EXISTS alerts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    gravidade ENUM('baixa', 'media', 'alta', 'critica') DEFAULT 'media',
    visit_id INT,
    status ENUM('pendente', 'visualizado', 'resolvido') DEFAULT 'pendente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (visit_id) REFERENCES visits(id) ON DELETE CASCADE
);

-- Inserir APENAS o usuário ADMIN (sem outros dados)
INSERT INTO users (nome, email, cpf, senha, funcao) VALUES 
('Administrador', 'admin@gmail.com', '00000000000', MD5('admin123'), 'admin');

EOF

echo "✅ Banco de dados criado com sucesso!"
echo "✅ Usuário Admin: admin@gmail.com | Senha: admin123"