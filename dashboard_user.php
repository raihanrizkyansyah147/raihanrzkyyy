<?php
include 'koneksi.php';
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
$query_dompet = mysqli_query($koneksi, "SELECT SUM(saldo) as total_aset FROM dompet");
$data_aset = mysqli_fetch_assoc($query_dompet);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Keuangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <div class="w-64 bg-white h-screen shadow-md p-5 flex flex-col justify-between">
        <div>
            <h1 class="text-xl font-bold text-indigo-600 mb-8">Keuangan Keluarga</h1>
            <ul>
                <li class="mb-4"><a href="dashboard_user.php" class="text-indigo-600 font-semibold">Dashboard</a></li>
                <li class="mb-4"><a href="logout.php" class="text-red-500">Logout</a></li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Dashboard Keuangan</h2>
        
        <div class="bg-indigo-600 text-white p-6 rounded-xl shadow-lg w-1/3 mb-6">
            <p class="text-sm opacity-80">Total Aset Keluarga</p>
            <h3 class="text-3xl font-bold mt-2">Rp <?= number_format($data_aset['total_aset'] ?? 0, 0, ',', '.'); ?></h3>
        </div>
    </div>
</body>
</html>