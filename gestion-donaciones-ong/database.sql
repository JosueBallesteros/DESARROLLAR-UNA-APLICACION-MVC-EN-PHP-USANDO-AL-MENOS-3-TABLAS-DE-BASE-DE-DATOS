-- Crear base de datos
CREATE DATABASE IF NOT EXISTS gestion_donaciones_ong;
USE gestion_donaciones_ong;

-- Tabla de Donantes
CREATE TABLE donantes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefono VARCHAR(20),
    direccion TEXT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de Proyectos
CREATE TABLE proyectos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    presupuesto_objetivo DECIMAL(10,2),
    fecha_inicio DATE,
    fecha_fin DATE,
    estado ENUM('activo', 'completado', 'cancelado') DEFAULT 'activo'
);

-- Tabla de Donaciones
CREATE TABLE donaciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    donante_id INT NOT NULL,
    proyecto_id INT NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    fecha_donacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    metodo_pago ENUM('efectivo', 'tarjeta', 'transferencia') DEFAULT 'efectivo',
    FOREIGN KEY (donante_id) REFERENCES donantes(id) ON DELETE CASCADE,
    FOREIGN KEY (proyecto_id) REFERENCES proyectos(id) ON DELETE CASCADE
);

-- Insertar datos de ejemplo
INSERT INTO donantes (nombre, email, telefono, direccion) VALUES
('Juan Pérez', 'juan.perez@email.com', '+1 234 567 8900', 'Calle Principal 123, Ciudad'),
('María García', 'maria.garcia@email.com', '+1 234 567 8901', 'Avenida Central 456, Ciudad'),
('Carlos López', 'carlos.lopez@email.com', NULL, 'Plaza Mayor 789, Ciudad');

INSERT INTO proyectos (nombre, descripcion, presupuesto_objetivo, fecha_inicio, fecha_fin, estado) VALUES
('Educación para Niños', 'Proveer educación básica a niños en comunidades rurales', 50000.00, '2024-01-01', '2024-12-31', 'activo'),
('Alimentación Comunitaria', 'Programa de alimentación para familias necesitadas', 30000.00, '2024-02-01', '2024-11-30', 'activo'),
('Construcción de Viviendas', 'Construcción de viviendas para familias sin hogar', 100000.00, '2024-03-01', '2024-10-31', 'activo');

INSERT INTO donaciones (donante_id, proyecto_id, monto, metodo_pago) VALUES
(1, 1, 1000.00, 'transferencia'),
(2, 1, 500.00, 'tarjeta'),
(3, 2, 750.00, 'efectivo'),
(1, 3, 2000.00, 'transferencia');