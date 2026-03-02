<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT"); // Kita pakai method PUT [cite: 162]

// Proteksi agar hanya method PUT yang bisa masuk [cite: 163-165]
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405);
    echo json_encode(["message" => "Method tidak diizinkan."]);
    exit;
}

include_once '../config/Database.php';
include_once '../models/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();
$mahasiswa = new Mahasiswa($db);

// Tangkap data JSON [cite: 171]
$data = json_decode(file_get_contents("php://input"));

// Di Update, ID hukumnya WAJIB ada sebagai acuan [cite: 172-175]
if (!empty($data->id) && !empty($data->npm) && !empty($data->nama) && !empty($data->jurusan)) {
    $mahasiswa->id = $data->id;
    $mahasiswa->npm = $data->npm;
    $mahasiswa->nama = $data->nama;
    $mahasiswa->jurusan = $data->jurusan;

    if ($mahasiswa->update()) {
        http_response_code(200); // OK [cite: 177]
        echo json_encode(array("message" => "Data mahasiswa berhasil diperbarui."));
    } else {
        http_response_code(503); // Service Unavailable
        echo json_encode(array("message" => "Gagal memperbarui data."));
    }
} else {
    http_response_code(400); // Bad Request
    echo json_encode(array("message" => "Data tidak lengkap."));
}
?>