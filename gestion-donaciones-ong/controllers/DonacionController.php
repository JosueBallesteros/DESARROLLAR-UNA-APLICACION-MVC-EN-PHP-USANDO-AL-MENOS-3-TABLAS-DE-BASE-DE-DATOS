<?php
// Incluir modelos - CORREGIR RUTAS
include_once __DIR__ . '/../models/Donante.php';
include_once __DIR__ . '/../models/Proyecto.php';
include_once __DIR__ . '/../models/Donacion.php';

class DonacionController {
    private $donante;
    private $proyecto;
    private $donacion;
    private $db;

    public function __construct($database) {
        $this->db = $database;
        $this->donante = new Donante($database);
        $this->proyecto = new Proyecto($database);
        $this->donacion = new Donacion($database);
    }

    public function handleRequest() {
        $action = isset($_GET['action']) ? $_GET['action'] : 'index';
        $entity = isset($_GET['entity']) ? $_GET['entity'] : 'donacion';

        switch($entity) {
            case 'donante':
                $this->handleDonanteActions($action);
                break;
            case 'proyecto':
                $this->handleProyectoActions($action);
                break;
            case 'donacion':
                $this->handleDonacionActions($action);
                break;
            default:
                $this->showDashboard();
                break;
        }
    }

    private function handleDonanteActions($action) {
        switch($action) {
            case 'crear':
                if($_POST) {
                    $this->donante->nombre = $_POST['nombre'];
                    $this->donante->email = $_POST['email'];
                    $this->donante->telefono = $_POST['telefono'];
                    $this->donante->direccion = $_POST['direccion'];
                    
                    if($this->donante->crear()) {
                        header("Location: index.php?entity=donante&action=listar&success=1");
                    } else {
                        header("Location: index.php?entity=donante&action=crear&error=1");
                    }
                } else {
                    include __DIR__ . '/../views/donantes/crear.php';
                }
                break;
            
            case 'listar':
                $donantes = $this->donante->leer();
                include __DIR__ . '/../views/donantes/listar.php';
                break;
            
            case 'eliminar':
                if(isset($_GET['id'])) {
                    $this->donante->id = $_GET['id'];
                    if($this->donante->eliminar()) {
                        header("Location: index.php?entity=donante&action=listar&deleted=1");
                    } else {
                        header("Location: index.php?entity=donante&action=listar&error=1");
                    }
                }
                break;
            
            default:
                $donantes = $this->donante->leer();
                include __DIR__ . '/../views/donantes/listar.php';
                break;
        }
    }

    private function handleProyectoActions($action) {
        switch($action) {
            case 'crear':
                if($_POST) {
                    $this->proyecto->nombre = $_POST['nombre'];
                    $this->proyecto->descripcion = $_POST['descripcion'];
                    $this->proyecto->presupuesto_objetivo = $_POST['presupuesto_objetivo'];
                    $this->proyecto->fecha_inicio = $_POST['fecha_inicio'];
                    $this->proyecto->fecha_fin = $_POST['fecha_fin'];
                    $this->proyecto->estado = $_POST['estado'];
                    
                    if($this->proyecto->crear()) {
                        header("Location: index.php?entity=proyecto&action=listar&success=1");
                    } else {
                        header("Location: index.php?entity=proyecto&action=crear&error=1");
                    }
                } else {
                    include __DIR__ . '/../views/proyectos/crear.php';
                }
                break;
            
            case 'listar':
                $proyectos = $this->proyecto->leer();
                include __DIR__ . '/../views/proyectos/listar.php';
                break;
            
            case 'eliminar':
                if(isset($_GET['id'])) {
                    $this->proyecto->id = $_GET['id'];
                    if($this->proyecto->eliminar()) {
                        header("Location: index.php?entity=proyecto&action=listar&deleted=1");
                    } else {
                        header("Location: index.php?entity=proyecto&action=listar&error=1");
                    }
                }
                break;
            
            default:
                $proyectos = $this->proyecto->leer();
                include __DIR__ . '/../views/proyectos/listar.php';
                break;
        }
    }

    private function handleDonacionActions($action) {
        switch($action) {
            case 'crear':
                if($_POST) {
                    $this->donacion->donante_id = $_POST['donante_id'];
                    $this->donacion->proyecto_id = $_POST['proyecto_id'];
                    $this->donacion->monto = $_POST['monto'];
                    $this->donacion->metodo_pago = $_POST['metodo_pago'];
                    
                    if($this->donacion->crear()) {
                        header("Location: index.php?entity=donacion&action=listar&success=1");
                    } else {
                        header("Location: index.php?entity=donacion&action=crear&error=1");
                    }
                } else {
                    $donantes = $this->donante->leer();
                    $proyectos = $this->proyecto->leer();
                    include __DIR__ . '/../views/donaciones/crear.php';
                }
                break;
            
            case 'listar':
                $donaciones = $this->donacion->leer();
                include __DIR__ . '/../views/donaciones/listar.php';
                break;
            
            case 'eliminar':
                if(isset($_GET['id'])) {
                    $this->donacion->id = $_GET['id'];
                    if($this->donacion->eliminar()) {
                        header("Location: index.php?entity=donacion&action=listar&deleted=1");
                    } else {
                        header("Location: index.php?entity=donacion&action=listar&error=1");
                    }
                }
                break;
            
            default:
                $this->showDashboard();
                break;
        }
    }

    private function showDashboard() {
        $totalDonantes = $this->db->query("SELECT COUNT(*) as total FROM donantes")->fetch(PDO::FETCH_ASSOC)['total'];
        $totalProyectos = $this->db->query("SELECT COUNT(*) as total FROM proyectos")->fetch(PDO::FETCH_ASSOC)['total'];
        $totalDonaciones = $this->db->query("SELECT COUNT(*) as total FROM donaciones")->fetch(PDO::FETCH_ASSOC)['total'];
        $montoTotal = $this->db->query("SELECT SUM(monto) as total FROM donaciones")->fetch(PDO::FETCH_ASSOC)['total'];
        
        include __DIR__ . '/../views/dashboard.php';
    }
}
?>