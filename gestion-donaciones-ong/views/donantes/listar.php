<?php include '../views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>👥 Lista de Donantes</h2>
    <a href="index.php?entity=donante&action=crear" class="btn btn-primary">➕ Nuevo Donante</a>
</div>

<div class="card">
    <div class="card-header bg-light">
        <h5 class="mb-0">Donantes Registrados en el Sistema</h5>
    </div>
    <div class="card-body">
        <?php if($donantes->rowCount() > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Fecha Registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $donantes->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo $row['telefono'] ? htmlspecialchars($row['telefono']) : '<span class="text-muted">N/A</span>'; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['fecha_registro'])); ?></td>
                        <td>
                            <a href="index.php?entity=donante&action=eliminar&id=<?php echo $row['id']; ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('¿Está seguro de eliminar este donante? Esta acción no se puede deshacer.')">
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
                No hay donantes registrados en el sistema. 
                <a href="index.php?entity=donante&action=crear" class="alert-link">Registrar el primer donante</a>.
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '../views/layout/footer.php'; ?>