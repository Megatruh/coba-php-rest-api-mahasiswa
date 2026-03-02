<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST"); // Menggunakan method POST [cite: 129]

include_once '../config/Database.php';
include_once '../models/Mahasiswa.php';

$database = new Database();
$db = $database->getConnection();

$mahasiswa = new Mahasiswa($db);

// Ambil data yang dikirim (format JSON) [cite: 138]
$data = json_decode(file_get_contents("php://input"));

// Pastikan data tidak kosong [cite: 139]
if(!empty($data->npm) && !empty($data->nama) && !empty($data->jurusan)) {
    $mahasiswa->npm = $data->npm;
    $mahasiswa->nama = $data->nama;
    $mahasiswa->jurusan = $data->jurusan;

    if($mahasiswa->create()) {
        http_response_code(201); // 201 = Created [cite: 144]
        echo json_encode(array("message" => "Mahasiswa berhasil ditambahkan."));
    } else {
        http_response_code(503); // Service Unavailable [cite: 148]
        echo json_encode(array("message" => "Gagal menambahkan mahasiswa."));
    }
} else {
    http_response_code(400); // Bad Request [cite: 153]
    echo json_encode(array("message" => "Data tidak lengkap."));
}
?>