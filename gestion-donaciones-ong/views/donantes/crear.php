<?php include '../views/layout/header.php'; ?>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>👥 Registrar Nuevo Donante</h4>
            </div>
            <div class="card-body">
                <form action="index.php?entity=donante&action=crear" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre Completo *</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required 
                               placeholder="Ingrese el nombre completo del donante">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" class="form-control" id="email" name="email" required 
                               placeholder="ejemplo@correo.com">
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" 
                               placeholder="+1 234 567 8900">
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="3" 
                                  placeholder="Ingrese la dirección completa"></textarea>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="index.php?entity=donante&action=listar" class="btn btn-secondary me-md-2">↩️ Cancelar</a>
                        <button type="submit" class="btn btn-primary">💾 Registrar Donante</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../views/layout/footer.php'; ?>