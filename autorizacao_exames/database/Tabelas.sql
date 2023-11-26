CREATE TABLE pacientes (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    endereco VARCHAR(50) NOT NULL,
    telefone VARCHAR(20),
    criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE laboratorios (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    endereco VARCHAR(50) UNIQUE NOT NULL,
    telefone VARCHAR(20),
    criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
    atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE autorizacao (
   id BIGINT PRIMARY KEY AUTO_INCREMENT,
   exames BIGINT  NOT NULL,
   pacientes BIGINT  NOT NULL,
   laboratorios BIGINT  NOT NULL,
   criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
   atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP,
   FOREIGN KEY (pacientes) REFERENCES pacientes(id),
   FOREIGN KEY (laboratorios) REFERENCES laboratorios(id),
   FOREIGN KEY (exames) REFERENCES exames(id)
);

CREATE TABLE exames (
   id BIGINT	PRIMARY KEY	NOT NULL AUTO_INCREMENT,
   nome	VARCHAR(50) NOT NULL,
   criado_em TIMESTAMP NOT NULL DEFAULT current_timestamp(),
   atualizado_em TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP
);