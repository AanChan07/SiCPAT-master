<?php
include '../database/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_pegawai = mysqli_real_escape_string($koneksi, $_POST['id_pegawai']);
    $sisa_cuti_n2 = mysqli_real_escape_string($koneksi, $_POST['sisa_cuti_n2']);
    $sisa_cuti_n1 = mysqli_real_escape_string($koneksi, $_POST['sisa_cuti_n1']);
    $sisa_cuti_n = mysqli_real_escape_string($koneksi, $_POST['sisa_cuti_n']);
    $total_cuti = mysqli_real_escape_string($koneksi, $_POST['total_cuti']);
    
    // Pastikan pegawai dengan id tersebut ada dalam tabel
    $cek_pegawai = mysqli_query($koneksi, "SELECT * FROM tb_cuti_tahunan WHERE id_pegawai = '$id_pegawai'");
    
    if (mysqli_num_rows($cek_pegawai) > 0) {
        // Query untuk mengupdate data cuti tahunan
        $query = "UPDATE tb_cuti_tahunan SET 
                  sisa_cuti_n2 = '$sisa_cuti_n2', 
                  sisa_cuti_n1 = '$sisa_cuti_n1', 
                  sisa_cuti_n = '$sisa_cuti_n', 
                  total_cuti = '$total_cuti' 
                  WHERE id_pegawai = '$id_pegawai'";
        
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil diperbarui'); window.location.href='index.php?page=data_cuti_tahunan';</script>";
        } else {
            echo "<script>alert('Data gagal diperbarui!'); window.location.href='index.php?page=data_cuti_tahunan';</script>";
        }
    } else {
        echo "<script>alert('Gagal! Pegawai tidak ditemukan.'); window.location.href='index.php?page=data_cuti_tahunan';</script>";
    }
}
?>
