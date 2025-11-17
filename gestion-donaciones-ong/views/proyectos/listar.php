<?php include '../views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>📋 Lista de Proyectos</h2>
    <a href="index.php?entity=proyecto&action=crear" class="btn btn-success">🆕 Nuevo Proyecto</a>
</div>

<div class="card">
    <div class="card-header bg-light">
        <h5 class="mb-0">Proyectos Registrados en el Sistema</h5>
    </div>
    <div class="card-body">
        <?php if($proyectos->rowCount() > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Presupuesto Objetivo</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $proyectos->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td>$<?php echo number_format($row['presupuesto_objetivo'], 2); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['fecha_inicio'])); ?></td>
                        <td><?php echo $row['fecha_fin'] ? date('d/m/Y', strtotime($row['fecha_fin'])) : '<span class="text-muted">N/A</span>'; ?></td>
                        <td>
                            <span class="badge bg-<?php 
                                echo $row['estado'] == 'activo' ? 'success' : 
                                     ($row['estado'] == 'completado' ? 'primary' : 'danger'); 
                            ?>">
                                <?php 
                                echo $row['estado'] == 'activo' ? '🟢 Activo' : 
                                     ($row['estado'] == 'completado' ? '🔵 Completado' : '🔴 Cancelado'); 
                                ?>
                            </span>
                        </td>
                        <td>
                            <a href="index.php?entity=proyecto&action=eliminar&id=<?php echo $row['id']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Está seguro de eliminar este proyecto? Esta acción no se puede deshacer.')">
                                🗑️ Eliminar
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <div class="alert alert-info">
                No hay proyectos registrados en el sistema. 
                <a href="index.php?entity=proyecto&action=crear" class="alert-link">Crear el primer proyecto</a>.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../views/layout/footer.php'; ?>