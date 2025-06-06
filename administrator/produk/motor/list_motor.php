<?php 
    require_once '../../dbkoneksi.php';
?>
<?php 
   $sql = "SELECT motor.*, merk.merk FROM motor INNER JOIN merk ON motor.merk_id=merk.id";
   $rs = $dbh->query($sql);
?>
<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_toko_motor");

// Eksekusi query
$result = mysqli_query($conn, $sql);

// Looping untuk menampilkan hasil
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['merk'] . ' ' . $row['motor'] . '<br>';
}

// Tutup koneksi
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrator</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="../../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../../index.html">AnnShop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="../../index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Database</div>
                            <a class="nav-link" href="../merk/list_merk.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-motorcycle"></i></div>
                                Merk
                            </a>
                            <a class="nav-link" href="list_motor.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                                Produk Motor
                            </a>
                            <a class="nav-link" href="../pesanan/list_pesanan.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                                Pesanan
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin Tampan
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Database Produk</h1>
                        <ol class="breadcrumb mb-3">
                            <li class="breadcrumb-item active">AnnShop eCommerce</li>
                        </ol>

                        <!-- konten -->                        
                        <div>
                            <a class="btn btn-success" href="form_motor.php" role="button">Create Motor</a>
                                <table class="table" width="100%" border="1" cellspacing="2" cellpadding="2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Motor</th>
                                            <th>Cc</th>
                                            <th>Harga Motor</th>
                                            <th>Merk</th>
                                            <th>Stok</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $nomor  =1 ;
                                        foreach($rs as $row){
                                        ?>
                                            <tr>
                                                <td><?=$nomor?></td>
                                                <td><?=$row['nama_motor']?></td>
                                                <td><?=$row['cc']?></td>
                                                <td><?=$row['harga']?></td>
                                                <td><?=$row['merk']?></td>
                                                <td><?=$row['stok']?></td>
                                                <td>
                                                    <a class="btn btn-primary" href="view_motor.php?id=<?=$row['id']?>">View</a>
                                                    <a class="btn btn-primary" href="edit_motor.php?idedit=<?=$row['id']?>">Edit</a>
                                                    <a class="btn btn-danger" href="delete_motor.php?iddel=<?=$row['id']?>"
                                                    onclick="if(!confirm('Anda Yakin Hapus Data motor <?=$row['nama_motor']?> ?')) 
                                                    else {return false}">Delete</a>
                                                    </td>
                                            </tr>
                                        <?php 
                                            $nomor++;   
                                            } 
                                            ?>
                                        </tbody>
                                </table>  
                        </div>
                        <!-- end konten -->
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"><p>Copyright © 2020 <a href="#" target="_blank">AnangTampan</a>  -  All Rights Reserved.</p></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
