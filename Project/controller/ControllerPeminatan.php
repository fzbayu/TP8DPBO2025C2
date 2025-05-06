<?php
include_once "model/peminatan.php";
include_once "connection.php";

class ControllerPeminatan {
    private $PeminatanModel;
    
    public function __construct() {
        global $conn;
        $this->PeminatanModel = new peminatan($conn);
    }
    
    // READ PEMINATAN
    public function index() {
        $data = $this->PeminatanModel->getAll();
        include "view/create_peminatan.php";
    }
    
    // FORM CREATE
    public function create() {
        include "view/create_peminatan.php";
    }
    
    // CREATE
    public function store() {
        if (isset($_POST['submit'])) {
            $data = [
                'nama_peminatan' => $_POST['nama_peminatan']
            ];
            
            $result = $this->PeminatanModel->create($data);
            
            if ($result) {
                header("Location: index.php?page=create_peminatan");
            } else {
                header("Location: index.php?page=create_peminatan&error=1");
            }
            exit;
        }
    }
    
    // FORM EDIT
    public function edit($id) {
        $peminatan = $this->PeminatanModel->getById($id);
        include "view/edit_peminatan.php";
    }
    
    // UPDATE
    public function update($id) {
        if (isset($_POST['submit'])) {
            $data = [
                'nama_peminatan' => $_POST['nama_peminatan']
            ];
            
            $result = $this->PeminatanModel->update($id, $data);
            
            if ($result) {
                header("Location: index.php?page=create_peminatan");
            } else {
                header("Location: index.php?page=edit_peminatan&id=$id&error=1");
            }
            exit;
        }
    }
    
    // DELETE
    public function delete($id) {
        $result = $this->PeminatanModel->delete($id);
        header("Location: index.php?page=create_peminatan");
        exit;
    }
    
}
?>