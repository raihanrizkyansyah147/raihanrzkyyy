CREATE DATABASE IF NOT EXISTS keuangan_keluarga;
USE keuangan_keluarga;

-- Tabel Users
TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100),
    role ENUM('admin', 'user') DEFAULT 'user',
    email VARCHAR(100),
    telepon VARCHAR(20)
);

-- Data Default Admin & User
INSERT INTO users (username, password, nama_lengkap, role) VALUES 
('admin', MD5('admin123'), 'Administrator', 'admin'),
('suami123', MD5('suami123'), 'Suami', 'user');

-- Tabel Dompet / Rekening
CREATE TABLE dompet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    nama_dompet VARCHAR(100),
    jenis ENUM('pribadi', 'bersama'),
    saldo DECIMAL(15,2) DEFAULT 0,
    emoji VARCHAR(10)
);

-- Tabel Transaksi
CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    dompet_id INT,
    jenis_transaksi ENUM('pengeluaran', 'pemasukan'),
    kategori VARCHAR(50),
    jumlah DECIMAL(15,2),
    tanggal DATE,
    keterangan TEXT,
    dibuat_oleh VARCHAR(50)
);