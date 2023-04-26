<?php 
include "header.php";
?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Halaman Utama</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        
                        <!-- notifikasi masuk -->
                        <?php 
                        if (isset($_GET['status'])) {
                            if ($_GET['status']=='berhasillogin') {
                                echo "<div class='alert alert-info' role='alert'><marquee><strong><h5> Selamat Datang di aplikasi MCU PT.PPA</h5></strong></marquee></div>";
                            } 
                        }
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan']=='sudahlogin') {
                                echo "<div class='alert alert-warning text-center'><h5><strong>Silahkan logout terlebih dahulu !</strong></h5></div>";
                         }elseif ($_GET['pesan']=='hapusdata') {
                            echo "<div class='alert alert-success text-center' role='alert'><strong>Data karyawan telah dihapus !</strong></div>";
                         }elseif ($_GET['pesan']=='gagalhapus') {
                            echo "<div class='alert alert-danger text-center' role='alert'><strong>Data karyawan gagal dihapus</strong></div>";
                         }
                        }
                        ?>
                        <!-- akhir notofikasi -->

                        <div class="card mb-4">
                            <div class="card-header">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah" title="Tambah data karyawan">
                                <i class="fas fa-plus"></i> Data Karyawan</button>

                                <!-- The Modal -->
                                <div class="modal fade" id="tambah">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Tambah data karyawan</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <form action="dataKaryawan.php" method="POST">
                                    <div class="modal-body">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="text" name="nik" class="form-control my-2" required placeholder="NIK Karyawan">
                                                <label for="inputNik">NIK Karyawan</label>
                                            </div>
                                        
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="text" name="nama" class="form-control" placeholder="Nama Karyawan" autofocus required>
                                                <label for="inputNama">Nama Karyawan</label>
                                            </div>
                                        
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="date" name="tgllahir" class="form-control my-2" placeholder="Tanggal Lahir" required>
                                                <label for="inputTgllahir">Tgl Lahir</label>
                                            </div>

                                            <div class="form-floating mb-3 mb-md-0">
                                                <select name="jk" id="jk" class="form-control my-2">
                                                    <option value="">- pilih jenis kelamin -</option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                                <label for="inputJeniskelamin">Jenis Kelamin</label>
                                            </div>

                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="date" name="tglinput" class="form-control my-2" placeholder="Tanggal Input">
                                                <label for="inputTglinput">Tgl Input</label>
                                            </div>

                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="text" name="tmptmcu" class="form-control my-2" placeholder="Tempat MCU" required>
                                                <label for="inputTmptmcu">Tempat MCU</label>
                                            </div>

                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="text" name="jabatan" class="form-control my-2" placeholder="Jabatan" required>
                                                <label for="inputJabatan">Jabatan Karyawan</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input type="text" name="dept" class="form-control my-2" placeholder="Departemen" required>
                                                <label for="inputDept">Departemen</label>
                                            </div>

                                            <button class="btn btn-primary" name="simpan" type="submit">Simpan</button>
                                    </div>
                                    
                                    </form>

                                    </div>
                                </div>
                                </div>    
                            
                            </div>
                            <div class="card-body">
  
                                <table id="datatablesSimple" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>JK</th>
                                            <th>Tgl Input</th>
                                            <th>Tempat MCU</th>
                                            <th>Jabatan</th>
                                            <th>Departemen</th>
                                            <th>Aksi</th>
                                            <th>Ceklist PDF</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php
                                    
                                    $datakaryawan = mysqli_query($koneksi, "SELECT * FROM karyawan");
                                    while ($dk = mysqli_fetch_array($datakaryawan)) {
                                        $idk        = $dk['idkaryawan'];
                                        $nik        = $dk['nik'];
                                        $nama       = $dk['nama'];
                                        $tgllahir   = $dk['tgl_lahir'];
                                        $jk         = $dk['jk'];
                                        $tglinput   = $dk['tgl_input'];
                                        $tmptmcu    = $dk['mcu'];
                                        $jabatan    = $dk['jabatan'];
                                        $dept       = $dk['dept'];
                                           
                                    ?>

                                        <tr class="text-center">
                                            <td><?= $nik; ?></td>
                                            <td><?= $nama; ?></td>
                                            <td>
                                                <?php 
                                                $lahir = new DateTime($dk['tgl_lahir']);
                                                $today = new DateTime();
                                                $umur  = $today->diff($lahir);

                                                echo $umur->y; echo " Tahun, "; echo $umur->m; echo " Bulan, "; echo $umur->d; echo " Hari ";
                                                 ?>
                                            </td>
                                            <td><?= $jk; ?></td>
                                            <td><?= $tglinput; ?></td>
                                            <td><?= $tmptmcu; ?></td>
                                            <td><?= $jabatan; ?></td>
                                            <td><?= $dept; ?></td>
                                            <td>
                                                <input type="hidden" name="idkaryawannya" value="<?= $idk; ?>">

                                               <a href="assesmen.php?id=<?= $idk; ?>" class="btn btn-info btn-sm my-2" type="submit" title="Data Rekam Medis Pasien"><i class="fas fa-file-medical-alt"></i> Assesment</a>

                                               <!-- edit modal -->
                                               <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $idk; ?>" title="Edit Data Karyawan">
                                                <i class="fas fa-edit"></i> Edit
                                                </button>

                                                <!-- The Modal -->
                                                <div class="modal fade" id="edit<?= $idk; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Data NIK <?= $dk['nik']; ?></h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <form action="updateIndex.php" method="POST">
                                                    <div class="modal-body">
                                                        
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" name="nama" class="form-control my-2" value="<?= $nama; ?>">
                                                        <label for="inputNama"><strong>Nama Karyawan</strong></label>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="date" name="tglllahir" class="form-control my-2" value="<?= $tgllahir; ?>">
                                                        <label for="inputTgllahir"><strong>Tgl Lahir</strong></label>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <select name="jk" id="jk" class="form-control my-2">
                                                            <option selected><?= $dk['jk']; ?></option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                        <label for="inputJk"><strong>Jenis Kelamin</strong></label>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="date" name="tglinput" class="form-control my-2" value="<?= $tglinput; ?>">
                                                        <label for="inputTglinput"><strong>Tgl Input</strong></label>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" name="jabatan" class="form-control my-2" value="<?= $jabatan; ?>">
                                                        <label for="inputJabatan"><strong>Jabatan</strong></label>
                                                    </div>
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="text" name="dept" class="form-control my-2" value="<?= $dept; ?>">
                                                        <label for="inputDept"><strong>Departemen</strong></label>
                                                    </div>

                                                    </div>

                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" name="updatedata"><i class="fas fa-user-edit"></i> Update</button>
                                                    </div>
                                                    </form>

                                                    </div>
                                                </div>
                                                </div>
                                                <!-- akhit edit modal -->

                                                <!-- botton hapus -->
                                                <button type="button" class="btn btn-danger btn-sm my-2" data-bs-toggle="modal" data-bs-target="#hapus<?= $idk; ?>" title="Hapus Data Karyawan">
                                                  <i class="fas fa-trash"></i>  Hapus
                                                </button>

                                                <!-- The Modal hapus -->
                                                <div class="modal fade" id="hapus<?= $idk; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                    <!-- Header hapus -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Hapus Data Karyawan</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <!-- Hapus body -->
                                                    <form action="hapusIndex.php" method="POST">
                                                    <div class="modal-body">
                                                        Apakah Yakin ingin mengahapus data karyawan <?= $dk['nama']; ?> ?
                                                        <br>
                                                        <input type="hidden" name="idk" value="<?= $idk; ?>">
                                                        <button type="submit" name="hapusdata" class="btn btn-danger btn-sm my-2" title="Hapus data karyawan" ><i class="fas fa-user-times"></i> Hapus</button>
                                                    </div>
                                                  </form>

                                                    </div>
                                                </div>
                                                </div>


                                               <!-- akhir botton hapus -->

                                            </td>
                                            <td><a href="cekllist.php<?= $idk; ?>" class="btn btn-secondary btn-sm my-2" title="Cetak Ceklist PDF"><i class="far fa-file-pdf"></i> ceklist PDF</a></td>
                                        </tr>

                                        <?php 
                                    }
                                    ?>
                                    </tbody>
                                    
                                </table>
                                
                            </div>
                        </div>
                    </div>
                </main>               
<?php 
include "footer.php";
?>