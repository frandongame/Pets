-- Crear tablas
CREATE TABLE IF NOT EXISTS usuarios (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS productos (
    id SERIAL PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL
);

-- Insertar datos iniciales
INSERT INTO usuarios (nombre, email) VALUES
('Juan Pérez', 'juan@example.com'),
('Ana Gómez', 'ana@example.com');

INSERT INTO productos (nombre, precio) VALUES
('Camiseta', 19.99),
('Pantalón', 29.50),
('Zapatos', 49.90);

-- Verificación opcional
-- SELECT * FROM usuarios;
-- SELECT * FROM productos;
