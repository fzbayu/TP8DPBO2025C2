<?php
include_once "model/dosen.php";
include_once "connection.php";

class ControllerDosen {
    private $DosenModel;
    
    public function __construct() {
        global $conn;
        $this->DosenModel = new Dosen($conn);
    }
    
    // READ DOSEN
    public function index() {
        $data = $this->DosenModel->getAll();
        include "view/create_dosen.php";
    }
    
    // FORM DATA
    public function create() {
        include "view/create_dosen.php";
    }
    
    // CREATE
    public function store() {
        if (isset($_POST['submit'])) {
            $data = [
                'nama' => $_POST['nama'],
                'nip' => $_POST['nip'],
                'email' => $_POST['email']
            ];
            
            $result = $this->DosenModel->create($data);
            
            if ($result) {
                header("Location: index.php?page=create_dosen");
            } else {
                header("Location: index.php?page=create_dosen&error=1");
            }
            exit;
        }
    }
    
    // FORM EDIT
    public function edit($id) {
        $dosen = $this->DosenModel->getById($id);
        include "view/edit_dosen.php";
    }
    
    // UPDATE
    public function update($id) {
        if (isset($_POST['submit'])) {
            $data = [
                'nama' => $_POST['nama'],
                'nip' => $_POST['nip'],
                'email' => $_POST['email']
            ];
            
            $result = $this->DosenModel->update($id, $data);
            
            if ($result) {
                header("Location: index.php?page=create_dosen");
            } else {
                header("Location: index.php?page=edit_dosen&id=$id&error=1");
            }
            exit;
        }
    }
    
    // DELETE
    public function delete($id) {
        $result = $this->DosenModel->delete($id);
        header("Location: index.php?page=create_dosen");
        exit;
    }
    
}
?>