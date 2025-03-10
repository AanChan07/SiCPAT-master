<?php
include "../database/koneksi.php";

$id = $_GET['id_pegawai'];

// Eksekusi query SELECT
$select_query = mysqli_query($koneksi, "SELECT nip FROM pegawai WHERE id_pegawai='$id'");

// Periksa apakah query berhasil dijalankan
if (!$select_query) {
    die("Query Error: " . mysqli_error($koneksi));
}

// Ambil data NIP
$row = mysqli_fetch_array($select_query);

// Pastikan data ditemukan sebelum melanjutkan
if ($row) {
    $nip = $row['nip'];

    // Hapus data di tabel terkait sebelum menghapus pegawai
    $deleteuser = mysqli_query($koneksi, "DELETE FROM user WHERE nip='$nip'");
    $deletecuti = mysqli_query($koneksi, "DELETE FROM cuti_pegawai WHERE id_cutipegawai='$id'");
    $deleteknp = mysqli_query($koneksi, "DELETE FROM knp_pegawai WHERE id_knppegawai='$id'");
    $deletekgb = mysqli_query($koneksi, "DELETE FROM kgb_pegawai WHERE id_kgbpegawai='$id'");
    $deletepegawai = mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id'");

    // Cek apakah semua query berhasil
    if ($deleteuser && $deletecuti && $deleteknp && $deletekgb && $deletepegawai) {
        echo "<script>alert('Berhasil Dihapus'); document.location='index.php?page=data_pegawai';</script>";
    } else {
        echo "<script>alert('Gagal Dihapus'); document.location='index.php?page=data_pegawai';</script>";
    }
} else {
    echo "<script>alert('Pegawai tidak ditemukan'); document.location='index.php?page=data_pegawai';</script>";
}
?>
