<?php
class dosen {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // GET DATA DOSEN
    public function getAll() {
        $query = "SELECT * FROM dosen";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }
    
    // GET DOSEN BY ID
    public function getById($id) {
        $query = "SELECT * FROM dosen WHERE id = " . $id;
        $result = mysqli_query($this->conn, $query);
        
        return mysqli_fetch_assoc($result);
    }
    
    // CREATE DOSEN
    public function create($data) {
        $nama = mysqli_real_escape_string($this->conn, $data['nama']);
        $nip = mysqli_real_escape_string($this->conn, $data['nip']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        
        $query = "INSERT INTO dosen (nama, nip, email) VALUES ('$nama', '$nip', '$email')";
        
        return mysqli_query($this->conn, $query);
    }
    
    // UPDATE DOSEN
    public function update($id, $data) {
        $nama = mysqli_real_escape_string($this->conn, $data['nama']);
        $nip = mysqli_real_escape_string($this->conn, $data['nip']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        
        $query = "UPDATE dosen 
                 SET nama = '$nama', 
                     nip = '$nip', 
                     email = '$email'
                 WHERE id = " . $id;
        
        return mysqli_query($this->conn, $query);
    }
    
    // DELETE DOSEN
    public function delete($id) {
        $query = "DELETE FROM dosen WHERE id = " . $id;
        
        return mysqli_query($this->conn, $query);
    }
}
?>