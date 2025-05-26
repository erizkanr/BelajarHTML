CREATE DATABASE toko_bunga;
USE toko_bunga;

CREATE TABLE penjualan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_bunga VARCHAR(50),
    harga DECIMAL(10,2),
    jumlah INT,
    total DECIMAL(10,2)
);

INSERT INTO penjualan (nama_bunga, harga, jumlah, total) VALUES
('Mawar Merah', 15000.00, 10, 150000.00),
('Anggrek Bulan', 30000.00, 5, 150000.00),
('Tulip Kuning', 25000.00, 4, 100000.00),
('Lily Putih', 20000.00, 6, 120000.00),
('Melati', 10000.00, 12, 120000.00);

case "DELETE":
    $obj->delete_penjualan(intval($_GET["id"]));
    break;