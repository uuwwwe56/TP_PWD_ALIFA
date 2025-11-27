<?php
require_once "Database.php";

class Song extends Database
{
    // ✅ AMBIL SEMUA LAGU + NAMA KATEGORI
    public function getAllSongs()
    {
        $query = "
            SELECT 
                songs.id,
                songs.title,
                songs.artist,
                songs.duration,
                songs.cover,
                songs.category_id,
                categories.category_name
            FROM songs
            LEFT JOIN categories 
            ON songs.category_id = categories.id
        ";

        $result = $this->conn->query($query);

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    // ✅ AMBIL 1 LAGU BERDASARKAN ID + KATEGORI
    public function getSongById($id)
    {
        $query = "
            SELECT 
                songs.*,
                categories.category_name
            FROM songs
            LEFT JOIN categories 
            ON songs.category_id = categories.id
            WHERE songs.id = ?
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
}
