CREATE DATABASE clima;

USE clima;

CREATE TABLE leituras_clima (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_estacao INT,
    estacao_lat DECIMAL(9, 6),
    estacao_lon DECIMAL(9, 6),
    gps_lat DECIMAL(9, 6),
    gps_lon DECIMAL(9, 6),
    data DATE,
    hora TIME,
    temperatura DECIMAL(5, 2),
    umidade DECIMAL(5, 2),
    vento_dir VARCHAR(255),
    vento_vel DECIMAL(5, 2),
    solar_uv DECIMAL(5, 2)
);
