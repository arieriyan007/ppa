<?php 
include "koneksi.php";

if (!isset($_SESSION['log'])) {
  # code...
} else {
  header("location:pages/index.php?pesan=sudahlogin");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Klinik PT.PPA</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="assets/img/ppa.png">
    <script
      src="https://use.fontawesome.com/releases/v6.1.0/js/all.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body class="bg-primary">
    <div id="layoutAuthentication">
      <div id="layoutAuthentication_content">
        <main>
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                  <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">LOGIN KLINIK PPA</h3>
                  </div>
                  <div class="card-body">
                    <?php 
                    if (isset($_GET['status'])) {
                      if ($_GET['status']=='logout') {
                        echo "<div class='alert alert-success text-center' role='alert'><strong>Anda Telah logout !</strong> </div>";
                      } elseif ($_GET['status']=='gagallogin') {
                        echo "<div class='alert alert-danger text-center' role='alert'><strong>Username dan Password Salah !</strong></div>";
                      }
                    }
                    ?>
                    <form action="loginAksi.php" method="POST">
                      <div class="form-floating mb-3">
                        <input
                          class="form-control"
                          id="inputUsername"
                          type="text"
                          name="username"
                          placeholder="Username"
                          autofocus
                        />
                        <label for="inputEmail">Username</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input
                          class="form-control"
                          id="inputPassword"
                          name="password"
                          type="password"
                          placeholder="Password"
                        />
                        <label for="inputPassword">Password</label>
                      </div>
        
                      <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                       
                        <button name="submit" class="btn btn-primary"> Login</button>
                      </div>
                    </form>
                  </div>
                  <div class="card-footer text-center py-3">
                    <div class="small">
                      <a href="https://arieriyan007.github.io">Support By Dayat</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>
      <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">Copyright &copy; Dayat</div>
              <div>
                <a href="#">PT. PPA</a>
                &middot;
                <a href="#">Dayat &amp; Team</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>
    <script src="js/scripts.js"></script>
  </body>
</html>
