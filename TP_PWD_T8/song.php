<?php
require_once "Database.php";

class Song extends Database
{

    public function getAllSongs()
    {
        $query = "SELECT * FROM songs";
        $result = $this->conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getSongById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM songs WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
