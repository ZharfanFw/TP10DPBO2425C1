<?php
require_once "config/Database.php";

class Type
{
    private $conn;
    private $table = "types";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY type_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE type_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        // Pastikan kolom dan value-nya pas (2 parameter)
        $query = "INSERT INTO " . $this->table . " (type_name, badge_color) VALUES (:type_name, :badge_color)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':type_name', $data['type_name']);
        $stmt->bindParam(':badge_color', $data['badge_color']); // <-- Jangan lupa ini

        return $stmt->execute();
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET type_name = :type_name, badge_color = :badge_color WHERE type_id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':type_name', $data['type_name']);
        $stmt->bindParam(':badge_color', $data['badge_color']); // <-- Ini juga

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE type_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
