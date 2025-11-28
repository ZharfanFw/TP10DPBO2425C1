<?php
require_once "config/Database.php";

class Pokemon
{
    private $conn;
    private $table = "pokemons";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        // LOGIC: Kita JOIN ke tabel types DUA KALI (alias ty1 dan ty2)
        $query = "SELECT 
                    p.*, 
                    t.trainer_name, 
                    ty1.type_name as type1_name, 
                    ty1.badge_color as type1_color,
                    ty2.type_name as type2_name, 
                    ty2.badge_color as type2_color
                  FROM " . $this->table . " p
                  LEFT JOIN trainers t ON p.trainer_id = t.trainer_id
                  LEFT JOIN types ty1 ON p.type_id = ty1.type_id
                  LEFT JOIN types ty2 ON p.type_id_2 = ty2.type_id
                  ORDER BY p.pokemon_id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE pokemon_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        // Tambah type_id_2
        $query = "INSERT INTO " . $this->table . " 
                  (nickname, species, photo, trainer_id, type_id, type_id_2) 
                  VALUES 
                  (:nickname, :species, :photo, :trainer_id, :type_id, :type_id_2)";

        $stmt = $this->conn->prepare($query);

        // Logic: Jika type_id_2 kosong, simpan sebagai NULL
        $type2 = empty($data['type_id_2']) ? null : $data['type_id_2'];

        $stmt->bindParam(':nickname', $data['nickname']);
        $stmt->bindParam(':species', $data['species']);
        $stmt->bindParam(':photo', $data['photo']);
        $stmt->bindParam(':trainer_id', $data['trainer_id']);
        $stmt->bindParam(':type_id', $data['type_id']);
        $stmt->bindParam(':type_id_2', $type2); // Binding tipe ke-2

        return $stmt->execute();
    }

    public function update($id, $data)
    {
        // Tambah type_id_2
        $query = "UPDATE " . $this->table . " SET 
                    nickname = :nickname, 
                    species = :species, 
                    photo = :photo,
                    trainer_id = :trainer_id, 
                    type_id = :type_id,
                    type_id_2 = :type_id_2
                  WHERE pokemon_id = :id";

        $stmt = $this->conn->prepare($query);

        $type2 = empty($data['type_id_2']) ? null : $data['type_id_2'];

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nickname', $data['nickname']);
        $stmt->bindParam(':species', $data['species']);
        $stmt->bindParam(':photo', $data['photo']);
        $stmt->bindParam(':trainer_id', $data['trainer_id']);
        $stmt->bindParam(':type_id', $data['type_id']);
        $stmt->bindParam(':type_id_2', $type2);

        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE pokemon_id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
