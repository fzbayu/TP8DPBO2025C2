<?php
class peminatan {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // GET DATA PEMINATAN
    public function getAll() {
        $query = "SELECT * FROM peminatan";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }
    
    // GET PEMINATAN BY ID
    public function getById($id) {
        $query = "SELECT * FROM peminatan WHERE id = " . $id;
        $result = mysqli_query($this->conn, $query);
        
        return mysqli_fetch_assoc($result);
    }
    
    // CREATE PEMINATAN
    public function create($data) {
        $nama_peminatan = mysqli_real_escape_string($this->conn, $data['nama_peminatan']);
        
        $query = "INSERT INTO peminatan (nama_peminatan) VALUES ('$nama_peminatan')";
        
        return mysqli_query($this->conn, $query);
    }
    
    // UPDATE PEMINATAN
    public function update($id, $data) {
        $nama_peminatan = mysqli_real_escape_string($this->conn, $data['nama_peminatan']);
        
        $query = "UPDATE peminatan 
                 SET nama_peminatan = '$nama_peminatan'
                 WHERE id = " . $id;
        
        return mysqli_query($this->conn, $query);
    }
    
    // DELETE PEMINATAN
    public function delete($id) {
        $query = "DELETE FROM peminatan WHERE id = " . $id;
        
        return mysqli_query($this->conn, $query);
    }
}
?>