<?php 
include "header.php";
?>

<div id="layoutSidenav_content">
<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Assesment Karyawan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php"> Halaman Utama</a></li>
                            <li class="breadcrumb-item active">Assesment</li>
                        </ol>
                        <?php 
                        $id = $_GET['id'];
                        $karyawan = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE idkaryawan='$id'");
                        while ($k = mysqli_fetch_array($karyawan)) {
                        
                        ?>
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Assesment Kesehatan Karyawan <?= $k['nama']; ?> </h3></div>
                                    <div class="card-body">
                                        
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <div class="form-floating mb-1 mb-md-0">
                                                        <input class="form-control" id="inputNik" name="nik" type="text" value="<?= $k['nik']; ?>" disabled />
                                                        <label for="inputNik">NIK Karyawan</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-floating my-1">
                                                        <input class="form-control" id="inputUmur" type="text" value="<?php 
                                                $lahir = new DateTime($k['tgl_lahir']);
                                                $today = new DateTime();
                                                $umur  = $today->diff($lahir);

                                                echo $umur->y; echo " Tahun, "; echo $umur->m; echo " Bulan, "; echo $umur->d; echo " Hari ";
                                                 ?>" disabled/>
                                                        <label for="inputUmur">Umur Karyawan</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-floating my-1">
                                                        <input class="form-control" id="inputJk" name="jk" type="text" value="<?= $k['jk']; ?>" disabled />
                                                        <label for="inputJk">Jenis Kelamin</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating my-1">
                                                        <input class="form-control" id="inputJb" name="jb" type="text" value="<?= $k['jabatan']; ?>" disabled />
                                                        <label for="inputJb">Jabatan</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="form-floating my-1">
                                                        <input class="form-control" id="inputDept" name="dept" type="text" value="<?= $k['dept']; ?>" disabled />
                                                        <label for="inputDept">Departemen</label>
                                                    </div>
                                                </div>
        
                                            </div>
                                            
                                            <?php 
                                            }
                                            ?>
                                            <form action="" method="POSt">
                                                <div class="card">
                                                    <h5 class="card-header">Keadaan Fisik</h5>
                                                        <div class="card-body">
                                                            <div class="row mb-3">
                                                                <div class="col-md-4">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputTekdar" name="tekdar" type="text" placeholder="Tekanan Darah" required autofocus/>
                                                                    <label for="inputTekdar">D 90-119 / 60-79 mmH</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputNadi" name="nadi" type="text" placeholder="Nadi" required/>
                                                                    <label for="inputNadi">Nadi</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputBb" name="bb" type="text" placeholder="Berat Badan" required/>
                                                                    <label for="inputBb">Berat Badan</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputBmi" name="bmi" type="text" placeholder="BMI" required/>
                                                                    <label for="inputBmi">BMI</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>      
                                                </div>

                                            <div class="mt-4 mb-0">
                                                <div><button type="submit" name="simpanass" class="btn btn-primary btn-sm" title="Simpan Hasil MCU" ><i class="fas fa-save"></i> Simpan</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                    </div>
</main>
<?php 
include "footer.php";
?>
</div>

