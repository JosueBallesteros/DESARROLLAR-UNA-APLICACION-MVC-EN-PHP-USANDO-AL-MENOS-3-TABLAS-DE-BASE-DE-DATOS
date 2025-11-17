<?php include '../views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>💰 Lista de Donaciones</h2>
    <a href="index.php?entity=donacion&action=crear" class="btn btn-warning">💳 Nueva Donación</a>
</div>

<div class="card">
    <div class="card-header bg-light">
        <h5 class="mb-0">Donaciones Registradas en el Sistema</h5>
    </div>
    <div class="card-body">
        <?php if($donaciones->rowCount() > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Donante</th>
                        <th>Proyecto</th>
                        <th>Monto</th>
                        <th>Fecha Donación</th>
                        <th>Método Pago</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $donaciones->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['donante_nombre']); ?><br>
                            <small class="text-muted"><?php echo htmlspecialchars($row['donante_email']); ?></small>
                        </td>
                        <td><?php echo htmlspecialchars($row['proyecto_nombre']); ?></td>
                        <td><strong class="text-success">$<?php echo number_format($row['monto'], 2); ?></strong></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['fecha_donacion'])); ?></td>
                        <td>
                            <span class="badge bg-info">
                                <?php 
                                echo $row['metodo_pago'] == 'efectivo' ? '💵 Efectivo' : 
                                     ($row['metodo_pago'] == 'tarjeta' ? '💳 Tarjeta' : '🏦 Transferencia'); 
                                ?>
                            </span>
                        </td>
                        <td>
                            <a href="index.php?entity=donacion&action=eliminar&id=<?php echo $row['id']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Está seguro de eliminar esta donación? Esta acción no se puede deshacer.')">
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
                No hay donaciones registradas en el sistema. 
                <a href="index.php?entity=donacion&action=crear" class="alert-link">Registrar la primera donación</a>.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../views/layout/footer.php'; ?>