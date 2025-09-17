
-- Criação da tabela tb_clientes
CREATE TABLE tb_clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,  -- Identificador único do cliente
    nome VARCHAR(255) NOT NULL,                 -- Nome completo do cliente
    cpf VARCHAR(14) NOT NULL,                   -- CPF do cliente (formato XXX.XXX.XXX-XX)
    telefone VARCHAR(15),                       -- Telefone do cliente (formato (XX) XXXXX-XXXX)
    email VARCHAR(255),                         -- E-mail do cliente
    endereco VARCHAR(255),                      -- Endereço do cliente
    num_processo VARCHAR(50),                   -- Número do processo do cliente
    estado_processo TINYINT(1) NOT NULL         -- Estado do processo (1 para aberto, 0 para resolvido)
);

-- Criação da tabela tb_processos
CREATE TABLE tb_processos (
    id_processo INT AUTO_INCREMENT PRIMARY KEY,  -- Identificador único do processo
    num_processo VARCHAR(50) NOT NULL,           -- Número do processo
    descricao TEXT,                              -- Descrição do processo
    comarca VARCHAR(255),                        -- Comarca do processo
    vara VARCHAR(255),                           -- Vara do processo
    data_inicio DATE,                            -- Data de início do processo
    data_fim DATE,                               -- Data de fim do processo
    cliente_vinculado INT,                       -- ID do cliente vinculado ao processo (chave estrangeira)
    FOREIGN KEY (cliente_vinculado) REFERENCES tb_clientes(id_cliente) -- Relacionamento com a tabela tb_clientes
);
