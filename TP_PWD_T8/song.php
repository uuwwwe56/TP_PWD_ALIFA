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
    // ✅ TAMBAH LAGU
    public function tambahLagu($title, $artist, $duration, $cover, $youtube_url, $category_id)
    {
        $query = "INSERT INTO songs (title, artist, duration, cover, youtube_url, category_id)
              VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssi", $title, $artist, $duration, $cover, $youtube_url, $category_id);
        $stmt->execute();
    }


    // ✅ UPDATE LAGU
    public function updateLagu($id, $title, $artist, $duration, $cover, $youtube_url, $category_id)
    {
        $query = "UPDATE songs SET
        title = ?,
        artist = ?,
        duration = ?,
        cover = ?,
        youtube_url = ?,
        category_id = ?
        WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            "ssssssi",
            $title,
            $artist,
            $duration,
            $cover,
            $youtube_url,
            $category_id,
            $id
        );

        return $stmt->execute();
    }


    // ✅ HAPUS LAGU
    public function hapusLagu($id)
    {
        $query = "DELETE FROM songs WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // ✅ AMBIL SEMUA KATEGORI
    public function getAllCategories()
    {
        $result = $this->conn->query("SELECT * FROM categories");
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

    public function getSongByCategory($category_id)
    {
        $query = "SELECT * FROM songs WHERE category_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $category_id);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
