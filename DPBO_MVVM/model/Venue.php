<?php
require_once 'config/Database.php';

class Venue {
    private $conn;
    private $table = 'venue';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($venue_name, $location) {
        $query = "INSERT INTO " . $this->table . " (venue_name, location) VALUES (:venue_name, :location)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':venue_name', $venue_name);
        $stmt->bindParam(':location', $location);
        return $stmt->execute();
    }

    public function update($id, $venue_name, $location) {
        $query = "UPDATE " . $this->table . " SET venue_name = :venue_name, location = :location WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':venue_name', $venue_name);
        $stmt->bindParam(':location', $location);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
