-- Crie a tabela "tokens"
CREATE TABLE tokens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    status TINYINT(1) DEFAULT 1
);

-- Insira quatro registros de exemplo
INSERT INTO tokens (token, status) VALUES
    ('w5zmt2CqvpPN', 1),
    ('ZcAqItlD8Nd7', 1),
    ('t3VsDDnHpS2E', 1),
    ('4AtmhW9D3LMM', 0);
