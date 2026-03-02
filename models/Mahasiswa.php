<?php
class Mahasiswa{
    private $conn;
    private $table_name = "mahasiswa";


    public $id;
    public $nama;
    public $npm;
    public $jurusan;


    public function __construct($db){
        $this->conn = $db;   
    }
    // 1. function read
    public function read(){
        $query = "SELECT * FROM " . $this->table_name ." ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
        
    }
    // 2. function create
    public function create(){
        $query = "INSERT INTO " . $this->table_name . " (npm, nama, jurusan) VALUES (?,?,?)";
        $stmt=$this->conn->prepare($query);
        if($stmt->execute([$this->npm, $this->nama, $this->jurusan])){
            return true;
        }
        return false;
    }
    // 3. function update
    public function update(){
        $query = "UPDATE ". $this->table_name . " SET npm = ?, nama= ?, jurusan = ? WHERE id = ?";
        $stmt=$this->conn->prepare($query);
        if($stmt->execute([$this->npm, $this->nama, $this->jurusan, $this->id])){
            return true;
        }
        return false;
    }
    // 4. function delete
    public function delete(){
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        if($stmt->execute([$this->id])){
            return true;
        }
        return false;
    }

}