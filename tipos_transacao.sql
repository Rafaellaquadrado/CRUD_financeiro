CREATE DATABASE financeiro;
USE financeiro;

CREATE TABLE tipos_transacao (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL
);


INSERT INTO tipos_transacao (nome) VALUES
('Aluguel'),
('Pagamento'),
('Prolabore');

