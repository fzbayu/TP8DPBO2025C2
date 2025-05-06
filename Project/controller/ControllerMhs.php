<?php
include_once "model/mahasiswa.php";
include_once "connection.php";

class ControllerMhs {
    private $mahasiswaModel;
    
    public function __construct() {
        global $conn;
        $this->mahasiswaModel = new Mahasiswa($conn);
    }
    
    // READ MAHASISWA
    public function index() {
        $data = $this->mahasiswaModel->getAll();
        include "view/index.php";
    }
    
    // FORM CREATE
    public function create() {
        // Mengambil data dosen dan peminatan untuk dropdown
        $dosen = $this->mahasiswaModel->getAllDosen();
        $peminatan = $this->mahasiswaModel->getAllPeminatan();
        include "view/create_mhs.php";
    }
    
    // CREATE
    public function store() {
        if (isset($_POST['submit'])) {
            $data = [
                'nama' => $_POST['nama'],
                'nim' => $_POST['nim'],
                'no_tlp' => $_POST['no_tlp'],
                'join_date' => $_POST['join_date'],
                'email' => $_POST['email'],
                'id_dosen' => isset($_POST['id_dosen']) ? $_POST['id_dosen'] : null,
                'id_peminatan' => isset($_POST['id_peminatan']) ? $_POST['id_peminatan'] : null
            ];
            
            $result = $this->mahasiswaModel->create($data);
            
            if ($result) {
                header("Location: index.php");
            } else {
                header("Location: index.php?page=create&error=1");
            }
            exit;
        }
    }
    
    // FORM EDIT
    public function edit($id) {
        $mahasiswa = $this->mahasiswaModel->getById($id);
        // Mengambil data dosen dan peminatan untuk dropdown
        $dosen = $this->mahasiswaModel->getAllDosen();
        $peminatan = $this->mahasiswaModel->getAllPeminatan();
        include "view/edit_mhs.php";
    }
    
    // UPDATE
    public function update($id) {
        if (isset($_POST['submit'])) {
            $data = [
                'nama' => $_POST['nama'],
                'nim' => $_POST['nim'],
                'email' => $_POST['email'],
                'join_date' => $_POST['join_date'],
                'id_dosen' => isset($_POST['id_dosen']) ? $_POST['id_dosen'] : null,
                'id_peminatan' => isset($_POST['id_peminatan']) ? $_POST['id_peminatan'] : null,
                'no_tlp' => $_POST['no_tlp']
            ];
            
            $result = $this->mahasiswaModel->update($id, $data);
            
            if ($result) {
                header("Location: index.php");
            } else {
                header("Location: index.php?page=edit&id=$id&error=1");
            }
            exit;
        }
    }
    
    // DELETE
    public function delete($id) {
        $result = $this->mahasiswaModel->delete($id);
        header("Location: index.php");
        exit;
    }
    
}