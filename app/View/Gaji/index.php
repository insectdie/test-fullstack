

<?php
    // deklarasi parameter koneksi database
    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "test_fullstack";

    // koneksi database
    $db = mysqli_connect($server, $username, $password, $database);

    // cek koneksi
    if (!$db) {
        die('Koneksi Database Gagal : ' . mysqli_connect_error());
    }
?>

  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          Data Gaji Karyawan
          
          <div class="pull-right btn-tambah">
            <form class="form-inline" method="GET" action="/gaji_add">
              <a class="btn btn-info" href="/gaji_add">
                <i class="glyphicon glyphicon-plus"></i> Tambah
              </a>
            </form>
          </div>
          
        </h4>
      </div>

  <?php  
    if (empty($_GET['alert'])) {
      echo "";
    } elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
            </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil disimpan.
            </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil diubah.
            </div>";
    } elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data siswa berhasil dihapus.
            </div>";
    }
  ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Data Gaji Karyawan</h3>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Golongan</th>
                  <th>Jumlah Kehadiran</th>
                  <th>Jumlah Cuti</th>
                  <th>Jam Lembur (1 Bulan)</th>
                  <th>Gaji (1 Bulan)</th>
                </tr>
              </thead>   

              <tbody>
              <?php
              /* Pagination */
              $batas = 5;

                $jumlah_record = mysqli_query($db, "SELECT * FROM gaji_karyawan")
                                                    or die('Ada kesalahan pada query jumlah_record: '.mysqli_error($db));
              

              $jumlah  = mysqli_num_rows($jumlah_record);
              $halaman = ceil($jumlah / $batas);
              $page    = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
              $mulai   = ($page - 1) * $batas;
              /*-------------------------------------------------------------------*/
              $no = 1;
                $query = mysqli_query($db, "SELECT * FROM gaji_karyawan
                                            ORDER BY golongan DESC LIMIT $mulai, $batas")
                                            or die('Ada kesalahan pada query siswa: '.mysqli_error($db));
              
              
              while ($data = mysqli_fetch_assoc($query)) {

                $tanggal        = $data['tanggal_lahir'];
                $tgl            = explode('-',$tanggal);
                $tanggal_lahir  = $tgl[2]."-".$tgl[1]."-".$tgl[0];

                echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[golongan]</td>
                      <td width='150'>$data[jumlah_kehadiran]</td>
                      <td width='180'>$data[jumlah_cuti]</td>
                      <td width='180'>$data[jam_lembur]</td>
                      <td width='180'>$data[gaji]</td>
                    </tr>";
                $no++;
              }
              ?>
              </tbody>           
            </table>
            <?php 
            if (empty($_GET['hal'])) {
              $halaman_aktif = '1';
            } else {
              $halaman_aktif = $_GET['hal'];
            }
            ?>

            <a>
              Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> | 
              Total <?php echo $jumlah; ?> data
            </a>

            <nav>
              <ul class="pagination pull-right">
              <!-- Button untuk halaman sebelumnya -->
              <?php 
              if ($halaman_aktif<='1') { ?>
                <li class="disabled">
                  <a href="" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page -1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>

              <!-- Link halaman 1 2 3 ... -->
              <?php 
              for($x=1; $x<=$halaman; $x++) { ?>
                <li class="">
                  <a href="?hal=<?php echo $x ?>"><?php echo $x ?></a>
                </li>
              <?php
              }
              ?>

              <!-- Button untuk halaman selanjutnya -->
              <?php 
              if ($halaman_aktif>=$halaman) { ?>
                <li class="disabled">
                  <a href="" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              } else { ?>
                <li>
                  <a href="?hal=<?php echo $page +1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              <?php
              }
              ?>
              </ul>
            </nav>
          </div>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->