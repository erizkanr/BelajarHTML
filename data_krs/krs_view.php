<?php
include 'db_connect.php';

$sql = "
    SELECT 
        m.nama AS nama_mahasiswa,
        mk.nama AS nama_matakuliah,
        mk.jumlah_sks
    FROM krs k
    JOIN mahasiswa m ON k.mahasiswa_npm = m.npm
    JOIN matakuliah mk ON k.matakuliah_kodemk = mk.kodemk
";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ddd;
        }
        .keterangan {
            color: #c00;
        }
    </style>
</head>
<body>
    <h2 align="center">Data KRS Mahasiswa</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $nama = $row['nama_mahasiswa'];
                    $mk = $row['nama_matakuliah'];
                    $sks = $row['jumlah_sks'];
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>$nama</td>";
                    echo "<td>$mk</td>";
                    echo "<td class='keterangan'>$nama Mengambil Mata Kuliah $mk ($sks SKS)</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
