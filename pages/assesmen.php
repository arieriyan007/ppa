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
                                                    <h5 class="card-header"><i class="fas fa-file-medical"></i> Keadaan Fisik</h5>
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
                                                                    <input class="form-control" id="inputNadi" name="nadi" type="number" placeholder="Nadi" required/>
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
                                                <div class="card my-2">
                                                    <h5 class="card-header"><i class="fas fa-microscope"></i> Hasil LAB</h5>
                                                        <div class="card-body">
                                                            <div class="row mb-3">
                                                                <div class="col-md-4">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputCol" name="col" type="number" placeholder="Kolesterol" required/>
                                                                    <label for="inputCol">Kolesterol (<250) </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputTrig" name="trig" type="number" placeholder="Trigliserida" required/>
                                                                    <label for="inputTrig">Trigliserida (<230) </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputGds" name="gds" type="number" placeholder="GDS" required/>
                                                                    <label for="inputGds">Gula Darah Sewaktu (GDS <200) </label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2">
                                                                    <div class="form-floating mb-1 mb-md-0">
                                                                    <input class="form-control" id="inputGdp" name="gdp" type="text" placeholder="GDP" required/>
                                                                    <label for="inputGdp">GDP 70 - 115</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputAu" name="au" type="text" placeholder="AU" required/>
                                                                    <label for="inputAu">AU 2.1 - 8.5</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputUr" name="ur" type="text" placeholder="Ur" required/>
                                                                    <label for="inputUr">Ur (10 - 40)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputCre" name="cre" type="text" placeholder="Cre" required/>
                                                                    <label for="inputCre">Cre (0.6 - 1.3)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputSgot" name="sgot" type="text" placeholder="SGOT" required/>
                                                                    <label for="inputSgot">SGOT (<40)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputSgpt" name="sgpt" type="text" placeholder="SGPT" required/>
                                                                    <label for="inputSgpt">SGPT (<50)</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputHbs" name="hbs" type="text" placeholder="HbsAg" required/>
                                                                    <label for="inputHbs">HbsAg</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputAnthbs" name="anthbs" type="text" placeholder="AntiHbs" required/>
                                                                    <label for="inputAnthbs">AntiHbs</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputUrin" name="urin" type="text" placeholder="Urin" required/>
                                                                    <label for="inputUrin">Urin</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 my-1">
                                                                    <div class="form-floating">
                                                                    <input class="form-control" id="inputNar" name="narkoba" type="text" placeholder="Narkoba" required/>
                                                                    <label for="inputNar">Narkoba</label>
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

