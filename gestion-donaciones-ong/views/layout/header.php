<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Donaciones para ONG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <i class="fas fa-hand-holding-heart me-2"></i>
                Gestión de Donaciones ONG
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="fas fa-chart-bar me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?entity=donante&action=listar">
                            <i class="fas fa-users me-1"></i>Donantes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?entity=proyecto&action=listar">
                            <i class="fas fa-project-diagram me-1"></i>Proyectos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?entity=donacion&action=listar">
                            <i class="fas fa-donate me-1"></i>Donaciones
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <?php 
                    $entity = isset($_GET['entity']) ? $_GET['entity'] : '';
                    $action = isset($_GET['action']) ? $_GET['action'] : '';
                    
                    if ($entity === 'donante') {
                        echo '<li class="breadcrumb-item active">Donantes</li>';
                        if ($action === 'crear') {
                            echo '<li class="breadcrumb-item active">Nuevo Donante</li>';
                        }
                    } elseif ($entity === 'proyecto') {
                        echo '<li class="breadcrumb-item active">Proyectos</li>';
                        if ($action === 'crear') {
                            echo '<li class="breadcrumb-item active">Nuevo Proyecto</li>';
                        }
                    } elseif ($entity === 'donacion') {
                        echo '<li class="breadcrumb-item active">Donaciones</li>';
                        if ($action === 'crear') {
                            echo '<li class="breadcrumb-item active">Nueva Donación</li>';
                        }
                    } else {
                        echo '<li class="breadcrumb-item active">Dashboard</li>';
                    }
                    ?>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container main-container">
        <!-- Alert Messages -->
        <?php if(isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                Operación realizada con éxito!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                Error al realizar la operación!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if(isset($_GET['deleted'])): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <i class="fas fa-trash-alt me-2"></i>
                Registro eliminado correctamente!
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>