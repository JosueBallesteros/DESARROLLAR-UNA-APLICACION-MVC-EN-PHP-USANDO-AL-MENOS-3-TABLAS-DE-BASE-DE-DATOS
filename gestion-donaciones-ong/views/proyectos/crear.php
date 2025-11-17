<?php include '../views/layout/header.php'; ?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-success text-white">
                <h4>📋 Crear Nuevo Proyecto</h4>
            </div>
            <div class="card-body">
                <form action="index.php?entity=proyecto&action=crear" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Proyecto *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required 
                               placeholder="Ingrese el nombre del proyecto">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción *</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required 
                                  placeholder="Describa los objetivos y actividades del proyecto"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="presupuesto_objetivo" class="form-label">Presupuesto Objetivo ($) *</label>
                        <input type="number" step="0.01" min="0" class="form-control" id="presupuesto_objetivo" 
                               name="presupuesto_objetivo" required placeholder="0.00">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha_inicio" class="form-label">Fecha de Inicio *</label>
                                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="fecha_fin" class="form-label">Fecha de Fin</label>
                                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado *</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="activo">🟢 Activo</option>
                            <option value="completado">🔵 Completado</option>
                            <option value="cancelado">🔴 Cancelado</option>
                        </select>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?entity=proyecto&action=listar" class="btn btn-secondary me-md-2">↩️ Cancelar</a>
                        <button type="submit" class="btn btn-success">💾 Crear Proyecto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../views/layout/footer.php'; ?>