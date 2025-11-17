<?php
class Proyecto {
    private $conn;
    private $table_name = "proyectos";

    public $id;
    public $nombre;
    public $descripcion;
    public $presupuesto_objetivo;
    public $fecha_inicio;
    public $fecha_fin;
    public $estado;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " 
                 SET nombre=:nombre, descripcion=:descripcion, presupuesto_objetivo=:presupuesto_objetivo, 
                     fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin, estado=:estado";
        
        $stmt = $this->conn->prepare($query);
        
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->presupuesto_objetivo = htmlspecialchars(strip_tags($this->presupuesto_objetivo));
        $this->fecha_inicio = htmlspecialchars(strip_tags($this->fecha_inicio));
        $this->fecha_fin = htmlspecialchars(strip_tags($this->fecha_fin));
        $this->estado = htmlspecialchars(strip_tags($this->estado));
        
        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":presupuesto_objetivo", $this->presupuesto_objetivo);
        $stmt->bindParam(":fecha_inicio", $this->fecha_inicio);
        $stmt->bindParam(":fecha_fin", $this->fecha_fin);
        $stmt->bindParam(":estado", $this->estado);
        
        return $stmt->execute();
    }

    public function leer() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY fecha_inicio DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}
?>