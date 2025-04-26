<div role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ajukan Cuti</h3>
              </div>

              <div class="title_right">
              <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Ajukan Cuti</li>
                </ol>
              </div>
            </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-3 col-sm-3"></div>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Pengajuan Cuti</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <!-- Tambahkan Tabel Sisa Cuti Tahunan -->
<?php
include '../database/koneksi.php';

// Ambil tahun saat ini
$tahunSekarang = date('Y');

$nippegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip='$nip'");
              $rowselect = mysqli_fetch_array($nippegawai);
              $idpegawai = $rowselect['id_pegawai'];
// Ambil sisa cuti dari tabel tb_cuti_tahunan berdasarkan id
$queryCuti = mysqli_query($koneksi, "SELECT sisa_cuti_n2, sisa_cuti_n1, sisa_cuti_n FROM tb_cuti_tahunan WHERE id_pegawai='$idpegawai'");

// Cek apakah query berhasil dan data ditemukan
if ($queryCuti && mysqli_num_rows($queryCuti) > 0) {
    $dataCuti = mysqli_fetch_assoc($queryCuti);
} else {
    // Jika data tidak ditemukan, set nilai default kosong
    $dataCuti = [
        'sisa_cuti_n2' => '-',
        'sisa_cuti_n1' => '-',
        'sisa_cuti_n' => '-'
    ];
}
?>
<h4>Sisa Cuti Tahunan</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Sisa Cuti Tahun <?php echo $tahunSekarang - 2; ?></th>
            <th>Sisa Cuti Tahun <?php echo $tahunSekarang - 1; ?></th>
            <th>Sisa Cuti Tahun <?php echo $tahunSekarang; ?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $dataCuti['sisa_cuti_n2']; ?></td>
            <td><?php echo $dataCuti['sisa_cuti_n1']; ?></td>
            <td><?php echo $dataCuti['sisa_cuti_n']; ?></td>
        </tr>
    </tbody>
</table>
                      <form method="POST">
                        <div class="form-group">
                            <label>Jenis cuti yang diambil</label>
                            <select class="form-control" name="jenis_cuti">
                                <option disabled selected>-- Pilih jenis cuti --</option>
                                <option value="Cuti Tahunan">Cuti Tahunan</option>
                                <option value="Cuti Besar">Cuti Besar</option>
                                <option value="Cuti Sakit">Cuti Sakit</option>
                                <option value="Cuti Melahirkan">Cuti Melahirkan</option>
                                <option value="Cuti Karena Alasan Penting">Cuti Karena Alasan Penting</option>
                                <option value="Cuti diluar Tanggungan Negara">Cuti diluar Tanggungan Negara</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Alasan Cuti</label>
                            <input type="text" required class="form-control" placeholder="Masukkan alasan cuti" name="alasan_cuti">
                        </div>
                        <div class="form-group">
                            <label for="">Lamanya cuti</label>
                            <input type="text" required class="form-control" placeholder="Masukan berapa lama" name="lama_cuti">
                            <select name="ket_lamacuti" class="form-control select2">
                                <option disabled selected>-- Pilih Hari, Bulan, Tahun --</option>
                                <option value="Hari">Hari</option>
                                <option value="Minggu">Minggu</option>
                                <option value="Bulan">Bulan</option>
                                <option value="Tahun">Tahun</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Dari tanggal</label>
                            <input type="date" required class="form-control" name="dari_tanggal">
                        </div>
                        <div class="form-group">
                            <label for="">Sampai dengan</label>
                            <input type="date" required class="form-control" name="sampai_dengan">
                        </div>
                        <div class="form-group">
                            <label for="">Atasan</label>
                            <select class="form-control" name="atasan">
                              <?php
                                include '../database/koneksi.php';

                                $queryjabatan = mysqli_query($koneksi, "SELECT * FROM pegawai pg, jabatan jb WHERE nip='$nip' and pg.id_jabatan=jb.id_jabatan");
                                $rowjabatan = mysqli_fetch_array($queryjabatan);
                                $jabatan = $rowjabatan['nama_jabatan'];

                                if ($jabatan == 'JURUSITA' || $jabatan =='JURUSITA PENGGANTI' || $jabatan == 'PANMUD HUKUM' || $jabatan == 'PANMUD GUGATAN' || $jabatan == 'PANMUD PERMOHONAN' ) {
                                  ?>
                                  <option value="panitera">PANITERA</option>
                                  <?php
                                } elseif ($jabatan == 'KASUBBAG KEPEGAWAIAN DAN ORTALA' || $jabatan == 'KASUBBAG PERENCANAAN IT DAN PELAPORAN' || $jabatan == 'KASUBBAG UMUM DAN KEUANGAN' || 
                                $jabatan == 'STAF PANITERA MUDA HUKUM' || $jabatan == 'STAF PANITERA MUDA GUGATAN' || $jabatan == 'STAF SUBBAG KEPEGAWAIAN ORTALA' || $jabatan == 'STAF SUBBAG UMUM DAN KEUANGAN' || $jabatan =='SUPIR/DRIVER' || $jabatan == 'SECURITY/SATPAM' || $jabatan == 'STAF PERENCANAAN IT DAN PELAPORAN' ) {
                                  ?>
                                  <option value="sekretaris">SEKRETARIS</option>
                                  <?php
                                } elseif ($jabatan == 'PANITERA' || $jabatan == 'SEKRETARIS' || $jabatan == 'HAKIM UTAMA MUDA' || $jabatan=='HAKIM MADYA UTAMA' || $jabatan =='WAKIL KETUA') {
                                  ?>
                                  <option value="ketua">KETUA</option>
                                  <?php
                                } elseif ($jabatan == 'PENGELOLA PENANGANAN PERKARA HUKUM'|| $jabatan == 'ANALIS PERKARA PERADILAN HUKUM' ) {
                                  ?>
                                  <option value="panmudhukum">PANMUD HUKUM</option>
                                  <?php
                                } elseif ($jabatan == ''|| $jabatan == ''  ) {
                                  ?>
                                  <option value="panmudgugatan">PANMUD GUGATAN</option>
                                  <?php
                                } elseif ($jabatan == 'PENGELOLA PENANGANAN PERKARA PERMOHONAN'|| $jabatan == 'ANALIS PERKARA PERADILAN PERMOHONAN' || $jabatan == 'PENGELOLA PENANGANAN PERKARA GUGATAN' || $jabatan == 'ANALIS PERKARA PERADILAN GUGATAN' ) {
                                  ?>
                                  <option value="panmudpermohonan">PANMUD PERMOHONAN</option>
                                  <?php
                                } elseif ($jabatan == 'STAFF PELAKSANA KEPEGAWAIAN DAN ORTALA') {
                                  ?>
                                  <option value="kasubagortala">KASUBBAG KEPEGAWAIAN DAN ORTALA</option>
                                  <?php
                                } elseif ($jabatan == 'PENELAAH TEKNIS KEBIJAKAN') {
                                  ?>
                                  <option value="kasubagit">KASUBBAG PERENCANAAN IT DAN PELAPORAN</option>
                                  <?php
                                } elseif ($jabatan == 'PRANATA KEUANGA APBN TERAMPIL' || $jabatan == 'PENGOLAH DATA DAN INFORMASI') {
                                  ?>
                                  <option value="kasubagkeuangan">KASUBBAG UMUM DAN KEUANGAN</option>
                                  <?php
                                } elseif ($jabatan == 'KETUA') {
                                  ?>
                                  <option value="ketua">-</option>
                                  <?php
                                }
                               ?>
                            </select>
                        </div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary">Ajukan Cuti</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-3"></div>
            </div>
          </div>
        </div>

        <?php
include '../database/koneksi.php';

if (isset($_POST['submit'])) {
    $jenis = $_POST['jenis_cuti'];
    $alasan = $_POST['alasan_cuti'];
    $lama = $_POST['lama_cuti'];
    $ketlama = $_POST['ket_lamacuti'];
    $dari = $_POST['dari_tanggal'];
    $sampai = $_POST['sampai_dengan'];
    $atasan = $_POST['atasan'];
    $tanggal_pengajuan = date('Y-m-d');


    $selectid = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE nip='$nip'");
    $rowid = mysqli_fetch_array($selectid);
    $id = $rowid['id_pegawai'];

    // Ambil sisa cuti dari tabel tb_cuti_tahunan
    $queryCuti = mysqli_query($koneksi, "SELECT sisa_cuti_n2, sisa_cuti_n1, sisa_cuti_n, total_cuti FROM tb_cuti_tahunan WHERE id_pegawai='$id'");
    $dataCuti = mysqli_fetch_assoc($queryCuti);

    $sisa_cuti_n2 = $dataCuti['sisa_cuti_n2'];
    $sisa_cuti_n1 = $dataCuti['sisa_cuti_n1'];
    $sisa_cuti_n = $dataCuti['sisa_cuti_n'];
    $total_cuti = $dataCuti['total_cuti'];

    // Jika jenis cuti adalah cuti tahunan, cek sisa cuti
    if ($jenis == 'Cuti Tahunan') {
        if ($lama > $total_cuti) {
            echo "<script>alert('Sisa Cuti Anda Tidak Mencukupi'); document.location='index.php?page=ajukan_cuti';</script>";
            exit();
        }

        // Kurangi sisa cuti secara berurutan
        $sisa_cuti_n2 = max(0, $sisa_cuti_n2 - $lama);
        $lama = max(0, $lama - $dataCuti['sisa_cuti_n2']);

        $sisa_cuti_n1 = max(0, $sisa_cuti_n1 - $lama);
        $lama = max(0, $lama - $dataCuti['sisa_cuti_n1']);

        $sisa_cuti_n = max(0, $sisa_cuti_n - $lama);

        // Update total_cuti
        $total_cuti = $sisa_cuti_n2 + $sisa_cuti_n1 + $sisa_cuti_n;

        // Update tabel tb_cuti_tahunan
        $updateCuti = mysqli_query($koneksi, "UPDATE tb_cuti_tahunan SET sisa_cuti_n2='$sisa_cuti_n2', sisa_cuti_n1='$sisa_cuti_n1', sisa_cuti_n='$sisa_cuti_n', total_cuti='$total_cuti' WHERE id_pegawai='$id'");
    }

    // Insert data cuti ke tabel cuti_pegawai
    if ($atasan == 'panitera') {
        $panitera = '197007302003122001';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,null, $panitera, null, 1, 0, 0, 'Diajukan', 'Menunggu Approval Panitera', '$tanggal_pengajuan')");
    } elseif ($atasan == 'sekretaris') {
        $sekretaris = '197203151999031004';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,null,'$sekretaris', null, 1, 0, 0, 'Diajukan', 'Menunggu Approval Sekretaris', '$tanggal_pengajuan')");
    } elseif ($atasan == 'ketualangsung') {
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,null,null, null, 1, 1, 1, 'Disetujui', 'Pengajuan Cuti Disetujui', '$tanggal_pengajuan')");
    } elseif ($atasan == 'ketua') {
        $ketua = '196909301994031002';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,null,null, '$ketua', 1, 1, 0, 'Diajukan', 'Menunggu Approval Ketua', '$tanggal_pengajuan')");
    } elseif ($atasan == 'panmudhukum') {
        $panmud = '197902212006041009';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,$panmud, null, null, 0, 0, 1, 'Diajukan', 'Menunggu Approval Panmud Hukum', '$tanggal_pengajuan')");
    } elseif ($atasan == 'panmudgugatan') {
        $panmud = '0';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,$panmud, null, null, 0, 0, 1, 'Diajukan', 'Menunggu Approval Panmud Gugatan', '$tanggal_pengajuan')");
    } elseif ($atasan == 'panmudpermohonan') {
        $panmud = '198402172009122004';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,$panmud, null, null, 0, 0, 1, 'Diajukan', 'Menunggu Approval Panmud Permohonan', '$tanggal_pengajuan')");
    } elseif ($atasan == 'kasubagortala') {
        $kasubag = '197412082001121001';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,$kasubag, null, null, 0, 0, 1, 'Diajukan', 'Menunggu Approval Kasubag Kepegawaian dan Ortala', '$tanggal_pengajuan')");
    } elseif ($atasan == 'kasubagit') {
        $kasubag = '199307232019031004';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,$kasubag, null, null, 0, 0, 1, 'Diajukan', 'Menunggu Approval Kasubag Perencanaan, IT dan Pelaporan', '$tanggal_pengajuan')");
    } elseif ($atasan == 'kasubagkeuangan') {
        $kasubag = '198604092006042002';
        $query = mysqli_query($koneksi, "INSERT INTO cuti_pegawai VALUES (null, '$id', '$jenis', '$alasan', '$lama', '$ketlama', '$dari', '$sampai' ,$kasubag, null, null, 0, 0, 1, 'Diajukan', 'Menunggu Approval Kasubag Umum dan Keuangan', '$tanggal_pengajuan')");
    }

    if ($query) {
        echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=daftar_approval';</script>";
    } else {
        echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=ajukan_cuti';</script>";
    }
}
?>
