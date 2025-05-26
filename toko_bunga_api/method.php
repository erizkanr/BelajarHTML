<?php
require_once "koneksi.php";

class Penjualan
{
    public function get_penjualan($id = 0)
    {
        global $koneksi;
        $query = "SELECT * FROM penjualan";
        if ($id != 0) {
            $query .= " WHERE id=$id LIMIT 1";
        }
        $result = $koneksi->query($query);
        $data = [];

        while ($row = mysqli_fetch_object($result)) {
            $row->harga = (float)$row->harga;
            $row->total = (float)$row->total;
            $data[] = $row;
        }

        echo json_encode(["status" => 1, "data" => $data]);
    }

    public function insert_penjualan()
    {
        global $koneksi;
        if (isset($_POST['nama_bunga'], $_POST['harga'], $_POST['jumlah'])) {
            $nama = $_POST['nama_bunga'];
            $harga = (float)$_POST['harga'];
            $jumlah = (int)$_POST['jumlah'];
            $total = $harga * $jumlah;

            $query = "INSERT INTO penjualan (nama_bunga, harga, jumlah, total)
                      VALUES ('$nama', $harga, $jumlah, $total)";
            $result = $koneksi->query($query);

            echo json_encode([
                "status" => $result ? 1 : 0,
                "message" => $result ? "Transaksi berhasil ditambahkan." : "Gagal menambah data."
            ]);
        } else {
            echo json_encode(["status" => 0, "message" => "Parameter tidak lengkap."]);
        }
    }

    public function update_penjualan($id)
    {
        global $koneksi;
        if (isset($_POST['nama_bunga'], $_POST['harga'], $_POST['jumlah'])) {
            $nama = $_POST['nama_bunga'];
            $harga = (float)$_POST['harga'];
            $jumlah = (int)$_POST['jumlah'];
            $total = $harga * $jumlah;

            $query = "UPDATE penjualan SET nama_bunga='$nama', harga=$harga, jumlah=$jumlah, total=$total WHERE id=$id";
            $result = $koneksi->query($query);

            echo json_encode([
                "status" => $result ? 1 : 0,
                "message" => $result ? "Data berhasil diupdate." : "Gagal update data."
            ]);
        } else {
            echo json_encode(["status" => 0, "message" => "Parameter tidak lengkap."]);
        }
    }

    public function delete_penjualan($id)
    {
        global $koneksi;
        $query = "DELETE FROM penjualan WHERE id=$id";
        $result = $koneksi->query($query);

        echo json_encode([
            "status" => $result ? 1 : 0,
            "message" => $result ? "Data berhasil dihapus." : "Gagal menghapus data."
        ]);
    }
}
?>
