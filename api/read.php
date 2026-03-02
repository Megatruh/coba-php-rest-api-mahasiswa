<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

include_once '../config/Database.php';
include_once '../models/Mahasiswa.php';

// [cite_start]// 1. Buat instance Database dulu [cite: 100]
$database = new Database();

// [cite_start]// 2. Ambil koneksinya dan simpan ke variabel $db [cite: 101]
$db = $database->getConnection();

// [cite_start]// 3. BARU masukkan $db ke dalam class Mahasiswa [cite: 102]
$mahasiswa = new Mahasiswa($db);
 
$stmt = $mahasiswa->read();
$num = $stmt->rowCount();

if($num > 0){
    $mhs_arr = array();
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $mhs_item = array(
            "id" => $id,
            "nama" => $nama,
            "npm" => $npm,
            "jurusan" => $jurusan
        );
        // [cite_start]// Perbaikan typo: gunakan $mhs_arr (sesuai deklarasi di atas) [cite: 116]
        array_push($mhs_arr, $mhs_item);
    }
    http_response_code(200);
    echo json_encode($mhs_arr);
} else {
    http_response_code(404);
    echo json_encode(array("message" => "Data tidak ditemukan."));
}
?>