<?php
require_once "config/Database.php";

class Trainer
{
    private $conn;
    private $table = "trainers";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        // LOGIC: Kita perlu JOIN ke tabel 'regions'
        // Supaya nanti di View bisa muncul: "Ash Ketchum (Region: Kanto)"
        $query = "SELECT 
                    t.trainer_id, 
                    t.trainer_name, 
                    t.level, 
                    t.region_id,
                    r.region_name 
                  FROM " . $this->table . " t
                  LEFT JOIN regions r ON t.region_id = r.region_id
                  ORDER BY t.trainer_id ASC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE trainer_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (trainer_name, level, region_id) 
                  VALUES 
                  (:trainer_name, :level, :region_id)";

        $stmt = $this->conn->prepare($query);

        // Binding Data
        $stmt->bindParam(':trainer_name', $data['trainer_name']);
        $stmt->bindParam(':level', $data['level']);
        $stmt->bindParam(':region_id', $data['region_id']);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update($id, $data)
    {
        $query = "UPDATE " . $this->table . " SET 
                    trainer_name = :trainer_name, 
                    level = :level, 
                    region_id = :region_id 
                  WHERE trainer_id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':trainer_name', $data['trainer_name']);
        $stmt->bindParam(':level', $data['level']);
        $stmt->bindParam(':region_id', $data['region_id']);

        return $stmt->execute();
    }

    public function delete($id)
    {
        // Hati-hati: Karena ada relasi ON DELETE CASCADE di database (tabel pokemons),
        // kalau Trainer dihapus, semua Pokemon miliknya juga akan terhapus otomatis.
        $query = "DELETE FROM " . $this->table . " WHERE trainer_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
