<?php
require_once "Database.php";

class Auth
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function login($username, $password)
    {
        $u = $this->db->conn->real_escape_string($username);
        $p = $this->db->conn->real_escape_string($password);

        $query = "SELECT * FROM users WHERE username='$u' AND password='$p' LIMIT 1";
        $result = $this->db->conn->query($query);

        if ($result && $result->num_rows == 1) {
            return $result->fetch_assoc();
        }
        return false;
    }
}
