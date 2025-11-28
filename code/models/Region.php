<?php
require_once "config/Database.php";

class Region
{
    private $conn;
    private $table = "regions";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY region_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE region_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // --- PERHATIKAN BAGIAN INI (Create) ---
    public function create($data)
    {
        // Pastikan ada :region_name DAN :professor
        $query = "INSERT INTO " . $this->table . " (region_name, professor) VALUES (:region_name, :professor)";
        
        $stmt = $this->conn->prepare($query);

        // Pastikan Binding-nya ada DUA juga
        $stmt->bindParam(':region_name', $data['region_name']);
        $stmt->bindParam(':professor', $data['professor']); // <-- Jangan lupa baris ini!

        return $stmt->execute();
    }

    // --- PERHATIKAN BAGIAN INI (Update) ---
    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET region_name = :region_name, professor = :professor WHERE region_id = :id";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':region_name', $data['region_name']);
        $stmt->bindParam(':professor', $data['professor']); // <-- Baris ini juga wajib ada

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE region_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
