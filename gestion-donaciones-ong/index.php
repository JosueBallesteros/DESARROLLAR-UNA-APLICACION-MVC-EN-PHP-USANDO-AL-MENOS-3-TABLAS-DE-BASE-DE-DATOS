<?php
// Incluir configuración de la base de datos
include_once 'config/database.php';
include_once 'controllers/DonacionController.php';

// Inicializar base de datos
$database = new Database();
$db = $database->getConnection();

// Inicializar controlador
$controller = new DonacionController($db);

// Manejar la solicitud
$controller->handleRequest();
?>