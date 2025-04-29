<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Pendaftaran Rute Penerbangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 10px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even){
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_maskapai = $_POST["nama_maskapai"];
    $bandara_asal = $_POST["bandara_asal"];
    $bandara_tujuan = $_POST["bandara_tujuan"];
    $harga_tiket = $_POST["harga_tiket"];

    $pajak_asal = 0;
    $pajak_tujuan = 0;

    $pajak_bandara_asal = [
        "Soekarno Hatta" => 65000,
        "Husein Sastranegara" => 50000,
        "Abdul Rachman Saleh" => 40000,
        "Juanda" => 30000
    ];

    $pajak_bandara_tujuan = [
        "Ngurah Rai" => 85000,
        "Hasanuddin" => 70000,
        "Inanwatan" => 90000,
        "Sultan Iskandar Muda" => 60000
    ];

    if (array_key_exists($bandara_asal, $pajak_bandara_asal)) {
        $pajak_asal = $pajak_bandara_asal[$bandara_asal];
    }

    if (array_key_exists($bandara_tujuan, $pajak_bandara_tujuan)) {
        $pajak_tujuan = $pajak_bandara_tujuan[$bandara_tujuan];
    }

    $pajak_total = $pajak_asal + $pajak_tujuan;
    $total_harga = $harga_tiket + $pajak_total;

    echo "<h2>Data Penerbangan</h2>";
    echo "<table>
            <tr><th>Item</th><th>Data</th></tr>
            <tr><td>Nomor</td><td>" . rand(1000, 9999) . "</td></tr>
            <tr><td>Tanggal</td><td>" . date("d-m-Y") . "</td></tr>
            <tr><td>Nama Maskapai</td><td>$nama_maskapai</td></tr>
            <tr><td>Asal Penerbangan</td><td>$bandara_asal</td></tr>
            <tr><td>Tujuan Penerbangan</td><td>$bandara_tujuan</td></tr>
            <tr><td>Harga Tiket</td><td>Rp " . number_format($harga_tiket, 0, ',', '.') . "</td></tr>
            <tr><td>Pajak</td><td>Rp " . number_format($pajak_total, 0, ',', '.') . "</td></tr>
            <tr><td>Total Harga Tiket</td><td>Rp " . number_format($total_harga, 0, ',', '.') . "</td></tr>
          </table>";
    echo "<div class='back-link'><a href='form_penerbangan.php'>&larr; Kembali ke Form</a></div>";
} else {
    echo "<p>Data tidak ditemukan.</p>";
}
?>
</div>
</body>
</html>
