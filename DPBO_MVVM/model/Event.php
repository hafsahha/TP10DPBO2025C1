<?php
require_once 'config/Database.php';

class Event {
    private $conn;
    private $table = 'event';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Ambil semua data event
    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil event berdasarkan id
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Tambah event baru
    public function create($event_name, $event_date) {
        $query = "INSERT INTO " . $this->table . " (event_name, event_date) VALUES (:event_name, :event_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':event_date', $event_date);
        return $stmt->execute();
    }

    // Update data event
    public function update($id, $event_name, $event_date) {
        $query = "UPDATE " . $this->table . " SET event_name = :event_name, event_date = :event_date WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':event_name', $event_name);
        $stmt->bindParam(':event_date', $event_date);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // Hapus event berdasarkan id
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
