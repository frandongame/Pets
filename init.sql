-- Crear la tabla pet si no existe
CREATE TABLE IF NOT EXISTS pet (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    born DATE,
    chip VARCHAR(255),
    category VARCHAR(255)
);

-- Insertar algunos datos de ejemplo
INSERT INTO pet (name, born, chip, category) VALUES
    ('Luna', '2020-01-15', 'CHIP123', 'Dog'),
    ('Milo', '2019-06-22', 'CHIP456', 'Cat'),
    ('Rocky', '2021-03-10', 'CHIP789', 'Dog')
ON CONFLICT DO NOTHING;