<?php
require_once 'config/Database.php';

class Ticket {
    private $conn;
    private $table = 'ticket';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua ticket dengan info event dan venue
    public function getAll() {
        $query = "SELECT t.*, e.event_name, v.venue_name, v.location
                  FROM " . $this->table . " t
                  JOIN event e ON t.event_id = e.id
                  JOIN venue v ON t.venue_id = v.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil ticket berdasarkan id lengkap dengan event dan venue
    public function getById($id) {
        $query = "SELECT t.*, e.event_name, v.venue_name, v.location
                  FROM " . $this->table . " t
                  JOIN event e ON t.event_id = e.id
                  JOIN venue v ON t.venue_id = v.id
                  WHERE t.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah ticket baru
    public function create($event_id, $venue_id, $price) {
        $query = "INSERT INTO " . $this->table . " (event_id, venue_id, price) 
                  VALUES (:event_id, :venue_id, :price)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':venue_id', $venue_id);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }

    // Update data ticket
    public function update($id, $event_id, $venue_id, $price) {
        $query = "UPDATE " . $this->table . " 
                  SET event_id = :event_id, venue_id = :venue_id, price = :price 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':event_id', $event_id);
        $stmt->bindParam(':venue_id', $venue_id);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Hapus ticket berdasarkan id
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
