<?php include 'layout/header.php'; ?>

<div class="row">
    <div class="col-md-12">
        <h1 class="mb-4">📊 Dashboard - Sistema de Gestión de Donaciones</h1>
        <p class="lead">Bienvenido al sistema de gestión de donaciones para ONG</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Total Donantes</h5>
                        <h2 class="card-text"><?php echo $totalDonantes; ?></h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fs-1">👥</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Total Proyectos</h5>
                        <h2 class="card-text"><?php echo $totalProyectos; ?></h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fs-1">📋</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Total Donaciones</h5>
                        <h2 class="card-text"><?php echo $totalDonaciones; ?></h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fs-1">💰</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info mb-3">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Monto Total</h5>
                        <h2 class="card-text">$<?php echo number_format($montoTotal ? $montoTotal : 0, 2); ?></h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fs-1">💵</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5>🚀 Acciones Rápidas</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="index.php?entity=donante&action=crear" class="btn btn-outline-primary">➕ Registrar Donante</a>
                    <a href="index.php?entity=proyecto&action=crear" class="btn btn-outline-success">🆕 Crear Proyecto</a>
                    <a href="index.php?entity=donacion&action=crear" class="btn btn-outline-warning">💳 Registrar Donación</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h5>📈 Últimas Donaciones</h5>
            </div>
            <div class="card-body">
                <?php
                $stmt = $this->db->query("SELECT d.monto, d.fecha_donacion, d.metodo_pago, don.nombre as donante, pro.nombre as proyecto 
                                   FROM donaciones d 
                                   LEFT JOIN donantes don ON d.donante_id = don.id 
                                   LEFT JOIN proyectos pro ON d.proyecto_id = pro.id 
                                   ORDER BY d.fecha_donacion DESC LIMIT 5");
                $ultimasDonaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                if(count($ultimasDonaciones) > 0): ?>
                    <div class="list-group">
                        <?php foreach($ultimasDonaciones as $donacion): ?>
                            <div class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1"><?php echo htmlspecialchars($donacion['donante']); ?></h6>
                                    <strong class="text-success">$<?php echo number_format($donacion['monto'], 2); ?></strong>
                                </div>
                                <p class="mb-1">📋 Proyecto: <?php echo htmlspecialchars($donacion['proyecto']); ?></p>
                                <small class="text-muted">
                                    📅 <?php echo date('d/m/Y H:i', strtotime($donacion['fecha_donacion'])); ?> 
                                    | 💳 <?php echo ucfirst($donacion['metodo_pago']); ?>
                                </small>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-muted">No hay donaciones registradas.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'layout/footer.php'; ?>