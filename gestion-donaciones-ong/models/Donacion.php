<?php
class Donacion {
    private $conn;
    private $table_name = "donaciones";

    public $id;
    public $donante_id;
    public $proyecto_id;
    public $monto;
    public $fecha_donacion;
    public $metodo_pago;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function crear() {
        $query = "INSERT INTO " . $this->table_name . " 
                 SET donante_id=:donante_id, proyecto_id=:proyecto_id, monto=:monto, metodo_pago=:metodo_pago";
        
        $stmt = $this->conn->prepare($query);
        
        $this->donante_id = htmlspecialchars(strip_tags($this->donante_id));
        $this->proyecto_id = htmlspecialchars(strip_tags($this->proyecto_id));
        $this->monto = htmlspecialchars(strip_tags($this->monto));
        $this->metodo_pago = htmlspecialchars(strip_tags($this->metodo_pago));
        
        $stmt->bindParam(":donante_id", $this->donante_id);
        $stmt->bindParam(":proyecto_id", $this->proyecto_id);
        $stmt->bindParam(":monto", $this->monto);
        $stmt->bindParam(":metodo_pago", $this->metodo_pago);
        
        return $stmt->execute();
    }

    public function leer() {
        $query = "SELECT d.id, d.monto, d.fecha_donacion, d.metodo_pago,
                         don.nombre as donante_nombre, pro.nombre as proyecto_nombre
                  FROM " . $this->table_name . " d
                  LEFT JOIN donantes don ON d.donante_id = don.id
                  LEFT JOIN proyectos pro ON d.proyecto_id = pro.id
                  ORDER BY d.fecha_donacion DESC";
        
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