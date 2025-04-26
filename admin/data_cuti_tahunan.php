<div class="page-title">
  <div class="title_left">
    <h3>Cuti Tahunan</h3>
  </div>

  <div class="title_right">
    <div class="col-md-3 col-sm-3 col-xs-12 pull-right">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Cuti Tahunan</a></li>
        </ol>
    </div>
  </div>
</div>

<div class="clearfix"></div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <a href="#" class="btn btn-info pull-right" data-toggle="modal" data-target=".btn-tambah-cuti-tahunan"><i class="fa fa-plus-circle"></i> Tambah Cuti Tahunan</a>
    <div class="x_panel">
      <div class="x_title">
        <h2>Cuti Tahunan <small>Data Cuti Tahunan Pegawai</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th style="width:5%">No</th>
              <th>Nama Pegawai</th>
              <th>Sisa Cuti N-2</th>
              <th>Sisa Cuti N-1</th>
              <th>Sisa Cuti N</th>
              <th>Total Cuti</th>
              <th class="text-center" style="width:20%">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include '../database/koneksi.php';
              $query = mysqli_query($koneksi, "SELECT pg.id_pegawai, pg.nama_pegawai, ct.sisa_cuti_n2, ct.sisa_cuti_n1, ct.sisa_cuti_n, ct.total_cuti 
                                 FROM pegawai pg 
                                 INNER JOIN tb_cuti_tahunan ct ON pg.id_pegawai = ct.id_pegawai");
              $i = 1;
              while ($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['nama_pegawai'] ?></td>
              <td><?php echo $row['sisa_cuti_n2'] ?></td>
              <td><?php echo $row['sisa_cuti_n1'] ?></td>
              <td><?php echo $row['sisa_cuti_n'] ?></td>
              <td><?php echo $row['total_cuti'] ?></td>
              <td class="text-center">
                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modaleditcutitahunan<?php echo $row['id_pegawai'] ?>"><i class="fa fa-edit"></i> Edit</a>
              </td>
            </tr>

            <!-- Modal Edit Cuti -->
            <div class="modal fade" id="modaleditcutitahunan<?php echo $row['id_pegawai']; ?>">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Cuti Tahunan</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <form action="edit_cuti_tahunan.php" method="post">
                      <input type="hidden" name="id_pegawai" value="<?php echo $row['id_pegawai']; ?>">
                      <div class="form-group">
                        <label>Sisa Cuti N-2</label>
                        <input class="form-control" type="number" name="sisa_cuti_n2" value="<?php echo $row['sisa_cuti_n2']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Sisa Cuti N-1</label>
                        <input class="form-control" type="number" name="sisa_cuti_n1" value="<?php echo $row['sisa_cuti_n1']; ?>" required>
                      </div>
                      <div class="form-group">
                        <label>Sisa Cuti N</label>
                        <input class="form-control" type="number" name="sisa_cuti_n" value="<?php echo $row['sisa_cuti_n']; ?>" required>
                      </div>
                      <div class="form-group">
                        <button type="edit_submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal View Cuti -->
<div class="modal fade" id="modalviewcuti<?php echo $row['id_pegawai']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Cuti - <?php echo $row['nama_pegawai']; ?></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <strong>Nama Pegawai</strong>
        <p class="text-muted"> <?php echo $row['nama_pegawai']; ?> </p>
        <hr>
        <strong>Sisa Cuti N-2</strong>
        <p class="text-muted"> <?php echo $row['sisa_cuti_n2']; ?> </p>
        <hr>
        <strong>Sisa Cuti N-1</strong>
        <p class="text-muted"> <?php echo $row['sisa_cuti_n1']; ?> </p>
        <hr>
        <strong>Sisa Cuti N</strong>
        <p class="text-muted"> <?php echo $row['sisa_cuti_n']; ?> </p>
        <hr>
        <strong>Total Cuti</strong>
        <p class="text-muted"> <?php echo $row['total_cuti']; ?> </p>
      </div>
    </div>
  </div>
</div>
        <div class="modal fade btn-tambah-cuti-tahunan" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Form Tambah Cuti Tahunan</h4>
              </div>
              <div class="modal-body">
                <form method="POST">
                  <div class="form-group">
                    <label>Nama Pegawai</label>
                    <select class="form-control" name="pegawai">
                           <option selected disabled>-- Pilih Pegawai--</option>
                           <?php
                           $pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai");
                           while ($rowjab = mysqli_fetch_array($pegawai)) {
                             ?>
                             <option value="<?php echo $rowjab['id_pegawai']; ?>"><?php echo $rowjab['nama_pegawai']; ?></option>
                             <?php
                           }
                            ?>
                         </select>
                  </div>
                  <div class="form-group">
                    <label>Sisa Cuti N-2</label>
                    <input class="form-control" type="number" name="sisa_cuti_n2" required>
                  </div>
                  <div class="form-group">
                    <label>Sisa Cuti N-1</label>
                    <input class="form-control" type="number" name="sisa_cuti_n1" required>
                  </div>
                  <div class="form-group">
                    <label>Sisa Cuti N</label>
                    <input class="form-control" type="number" name="sisa_cuti_n" required>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
include '../database/koneksi.php';

if (isset($_POST['submit'])) {
    $id_pegawai = $_POST['pegawai']; 
    $sisa_cuti_n2 = $_POST['sisa_cuti_n2'];
    $sisa_cuti_n1 = $_POST['sisa_cuti_n1'];
    $sisa_cuti_n = $_POST['sisa_cuti_n'];
    $total_cuti = $_POST['total_cuti'];
    $total_cuti = $sisa_cuti_n2 + $sisa_cuti_n1 + $sisa_cuti_n;

    // Pastikan id ada di tabel pegawai sebelum insert
    $cek_pegawai = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
    if (mysqli_num_rows($cek_pegawai) > 0) {
        $query = mysqli_query($koneksi, "INSERT INTO tb_cuti_tahunan (id_pegawai, sisa_cuti_n2, sisa_cuti_n1, sisa_cuti_n, total_cuti) 
                                         VALUES ('$id_pegawai', '$sisa_cuti_n2', '$sisa_cuti_n1', '$sisa_cuti_n', '$total_cuti')");

        if ($query) {
            echo "<script>alert('Data Berhasil Ditambahkan'); document.location='index.php?page=data_cuti_tahunan';</script>";
        } else {
            echo "<script>alert('Data Gagal Ditambahkan'); document.location='index.php?page=data_cuti_tahunan';</script>";
        }
    } else {
        echo "<script>alert('Gagal! Pegawai tidak ditemukan.'); document.location='index.php?page=data_cuti_tahunan';</script>";
    }
}

// BAGIAN EDIT DATA
if (isset($_POST['edit_submit'])) {
    $id_pegawai = $_POST['id_pegawai'];
    $sisa_cuti_n2 = intval($_POST['sisa_cuti_n2']);
    $sisa_cuti_n1 = intval($_POST['sisa_cuti_n1']);
    $sisa_cuti_n = intval($_POST['sisa_cuti_n']);
    $total_cuti = $sisa_cuti_n2 + $sisa_cuti_n1 + $sisa_cuti_n;

    // Gunakan prepared statement untuk update
    $stmt = $koneksi->prepare("UPDATE tb_cuti_tahunan 
        SET sisa_cuti_n2 = ?, 
            sisa_cuti_n1 = ?, 
            sisa_cuti_n = ?, 
            total_cuti = ? 
        WHERE id_pegawai = ?");
    
    $stmt->bind_param("iiiii", $sisa_cuti_n2, $sisa_cuti_n1, $sisa_cuti_n, $total_cuti, $id_pegawai);
    
    if ($stmt->execute()) {
        echo "<script>
            alert('Update Berhasil!');
            window.location = 'index.php?page=data_cuti_tahunan';
        </script>";
    } else {
        echo "<script>
            alert('Gagal Update: ".$stmt->error."');
            window.history.back();
        </script>";
    }
    $stmt->close();
}
?>

?>

      </div>
    </div>
  </div>
</div>
