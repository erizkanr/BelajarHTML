<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Rute Penerbangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        h2 {
            text-align: center;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Pendaftaran Rute Penerbangan</h2>
        <form method="post" action="hasil_penerbangan.php">
            Nama Maskapai:
            <input type="text" name="nama_maskapai" required>

            Bandara Asal:
            <select name="bandara_asal" required>
                <?php
                $bandara_asal = ["Soekarno Hatta", "Husein Sastranegara", "Abdul Rachman Saleh", "Juanda"];
                sort($bandara_asal);
                foreach ($bandara_asal as $asal) {
                    echo "<option value='$asal'>$asal</option>";
                }
                ?>
            </select>

            Bandara Tujuan:
            <select name="bandara_tujuan" required>
                <?php
                $bandara_tujuan = ["Ngurah Rai", "Hasanuddin", "Inanwatan", "Sultan Iskandar Muda"];
                sort($bandara_tujuan);
                foreach ($bandara_tujuan as $tujuan) {
                    echo "<option value='$tujuan'>$tujuan</option>";
                }
                ?>
            </select>

            Harga Tiket:
            <input type="number" name="harga_tiket" required>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
