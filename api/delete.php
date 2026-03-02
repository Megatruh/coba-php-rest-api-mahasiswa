<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE"); // Method khusus hapus

// Proteksi Method [cite: 191-194]
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405);
    echo json_encode(["message" => "Method tidak diizinkan."]);
    exit;
}

include_once '../config/Database.php';
include_once '../models/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mahasiswa = new Mahasiswa($db);

// Ambil ID yang mau dihapus dari body request
$data = json_decode(file_get_contents("php://input"));

// Set ID yang akan dihapus [cite: 201]
if(!empty($data->id)) {
    $mahasiswa->id = $data->id;

    if($mahasiswa->delete()) {
        http_response_code(200); // OK
        echo json_encode(array("message" => "Mahasiswa berhasil dihapus."));
    } else {
        http_response_code(503); // Service Unavailable
        echo json_encode(array("message" => "Gagal menghapus mahasiswa."));
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(array("message" => "ID tidak ditemukan."));
}
?>