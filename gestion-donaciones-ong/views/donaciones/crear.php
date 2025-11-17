<?php include '../views/layout/header.php'; ?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card card-custom">
            <div class="card-header card-header-custom">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-plus me-3 fs-4"></i>
                    <h4 class="mb-0">Registrar Nuevo Donante</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="index.php?entity=donante&action=crear" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="nombre" class="form-label">
                                <i class="fas fa-user me-2 text-primary"></i>Nombre Completo *
                            </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required 
                                   placeholder="Ingrese el nombre completo del donante">
                            <div class="invalid-feedback">
                                Por favor ingrese el nombre del donante.
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-2 text-primary"></i>Email *
                            </label>
                            <input type="email" class="form-control" id="email" name="email" required 
                                   placeholder="ejemplo@correo.com">
                            <div class="invalid-feedback">
                                Por favor ingrese un email válido.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telefono" class="form-label">
                                <i class="fas fa-phone me-2 text-primary"></i>Teléfono
                            </label>
                            <input type="text" class="form-control" id="telefono" name="telefono" 
                                   placeholder="+1 234 567 8900">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="direccion" class="form-label">
                            <i class="fas fa-map-marker-alt me-2 text-primary"></i>Dirección
                        </label>
                        <textarea class="form-control" id="direccion" name="direccion" rows="3" 
                                  placeholder="Ingrese la dirección completa del donante"></textarea>
                    </div>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                        <a href="index.php?entity=donante&action=listar" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Volver a la lista
                        </a>
                        <button type="submit" class="btn btn-primary-custom">
                            <i class="fas fa-save me-2"></i>Registrar Donante
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../views/layout/footer.php'; ?>