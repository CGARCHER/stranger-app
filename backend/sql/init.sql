-- Crear la base de datos stranger
--- CREATE DATABASE stranger;

-- Crear la tabla de personajes
CREATE TABLE IF NOT EXISTS characters (
    id BIGINT GENERATED ALWAYS AS IDENTITY PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    power VARCHAR(200),
    power_level INT,
    description VARCHAR(300)
);

-- Insertar datos de ejemplo
INSERT INTO characters (name, power, power_level, description) VALUES
('Eleven', 'Telequinesis', 90, 'Puede mover objetos y utilizar energía mental.'),
('Will Byers', 'Hechicería', 95, 'Ha desarrollado habilidades mágicas sencillas y sensibilidad a energías.'),
('Vecna', 'Control mental', 99, 'Capaz de influir en pensamientos y emociones.'),
('Demogorgon', 'Fuerza sobrenatural', 85, 'Criatura poderosa con gran resistencia física.');

