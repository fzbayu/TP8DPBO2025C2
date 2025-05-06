<?php
class Mahasiswa {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // GET DATA MAHASISWA DAN PEMINATAN
    public function getAll() {
        $query = "SELECT m.*, d.nama as nama_dosen, p.nama_peminatan 
                 FROM mahasiswa m
                 LEFT JOIN dosen d ON m.id_dosen = d.id
                 LEFT JOIN peminatan p ON m.id_peminatan = p.id
                 ORDER BY m.id ASC";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }

    // GET DATA DOSEN
    public function getAllDosen() {
        $query = "SELECT * FROM dosen";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }

    // GET DATA PEMINATAN
    public function getAllPeminatan() {
        $query = "SELECT * FROM peminatan";
        $result = mysqli_query($this->conn, $query);
        $data = [];
        
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        
        return $data;
    }
    
    // GET MAHASISWA BY ID
    public function getById($id) {
        $id = (int) $id;
        $query = "SELECT * FROM mahasiswa WHERE id = $id";
        $result = mysqli_query($this->conn, $query);
        
        return mysqli_fetch_assoc($result);
    }
    
    // CREATE MAHASISWA
    public function create($data) {
        $nama = mysqli_real_escape_string($this->conn, $data['nama']);
        $nim = mysqli_real_escape_string($this->conn, $data['nim']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $join_date = mysqli_real_escape_string($this->conn, $data['join_date']);
        $id_peminatan = (int) $data['id_peminatan'];
        $id_dosen = (int) $data['id_dosen'];
        $no_tlp = mysqli_real_escape_string($this->conn, $data['no_tlp']);
        
        $query = "INSERT INTO mahasiswa (nama, nim, email, join_date, id_peminatan, id_dosen, no_tlp) 
                 VALUES ('$nama', '$nim', '$email', '$join_date', $id_peminatan, $id_dosen, '$no_tlp')";
                 
        return mysqli_query($this->conn, $query);
    }
    
    // UPDATE MAHASISWA
    public function update($id, $data) {
        $id = (int) $id;
        $nama = mysqli_real_escape_string($this->conn, $data['nama']);
        $nim = mysqli_real_escape_string($this->conn, $data['nim']);
        $email = mysqli_real_escape_string($this->conn, $data['email']);
        $join_date = mysqli_real_escape_string($this->conn, $data['join_date']);
        $id_dosen = (int) $data['id_dosen'];
        $id_peminatan = (int) $data['id_peminatan'];
        $no_tlp = mysqli_real_escape_string($this->conn, $data['no_tlp']);
        
        $query = "UPDATE mahasiswa 
                 SET nama = '$nama', 
                     nim = '$nim', 
                     email = '$email',
                     join_date = '$join_date',
                     id_peminatan = $id_peminatan,
                     id_dosen = $id_dosen,
                     no_tlp = '$no_tlp'
                 WHERE id = $id";
        
        return mysqli_query($this->conn, $query);
    }
    
    // DELETE MAHASISWA
    public function delete($id) {
        $id = (int) $id;
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        
        return mysqli_query($this->conn, $query);
    }

}