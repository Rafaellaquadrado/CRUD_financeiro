CREATE DATABASE financeiro;
USE financeiro;

CREATE TABLE transacoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(255) NOT NULL,
    valor DECIMAL(10, 2) NOT NULL,
    tipo_id INT NOT NULL,
    data DATE NOT NULL,
    FOREIGN KEY (tipo_id) REFERENCES tipos_transacao(id)
);