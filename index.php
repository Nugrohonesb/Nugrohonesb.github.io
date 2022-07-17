<?php
    session_start();

    if (!isset($_SESSION["username"])) {
        header("Location: login.php ");
        exit;
    }
    include "asset/inc/config.php";

    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

    $uri_path = "//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $uri_segments = explode('/', $uri_path);
    $uri_segments[4];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UAS Kelompok 1 - Core Stage</title>

    <!-- Custom fonts-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/css/ekko-lightbox.css">
    <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="asset/img/bg_title.png" type="image/x-icon">
</head>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: #253542;" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="asset/img/bg_index.png" width="70%" alt="">
                </div>
                <div class="sidebar-brand-text mx-4">Core Stage</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php if ($uri_segments[4] == "index.php") {echo 'active';} ?>">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Data</div>

            <!-- Nav Item - Perencanaan Collapse Menu -->
            <li class="nav-item
                <?php
                    if ($uri_segments[4] == "index.php?page=grades") {echo 'active';}
                    elseif ($uri_segments[4] == "index.php?page=teachers") {echo 'active';}
                    elseif ($uri_segments[4] == "index.php?page=students") {echo 'active';}
                    elseif ($uri_segments[4] == "index.php?page=courses") {echo 'active';}
                ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapserencana" aria-expanded="true" aria-controls="collapserencana">
                    <i class="fas fa-fw fa-edit"></i><span>Data - data</span>
                </a>
                <div id="collapserencana" class="collapse" aria-labelledby="headingrencana" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis Data :</h6>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=grades") {echo 'active';} ?>" href="?page=grades">Grades</a>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=teachers") {echo 'active';} ?>" href="?page=teachers">Teachers</a>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=students") {echo 'active';} ?>" href="?page=students">Students</a>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=courses") {echo 'active';} ?>" href="?page=courses">Courses</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pelaporan Collapse Menu -->
            <li class="nav-item
                <?php
                    if ($uri_segments[4] == "index.php?page=final_data_reports") {echo 'active';}
                ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapselaporan" aria-expanded="true" aria-controls="collapselaporan">
                    <i class="fas fa-fw fa-chart-line"></i><span>Laporan</span>
                </a>
                <div id="collapselaporan" class="collapse" aria-labelledby="headinglaporan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Jenis laporan :</h6>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=final_data_reports") {echo 'active';} ?>" href="?page=final_data_reports">Final Data Reports</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Setting</div>

            <!-- Nav Item - Setting Collapse Menu -->
            <li class="nav-item
                <?php
                    if ($uri_segments[4] == "index.php?page=profile") {echo 'active';}
                    elseif ($uri_segments[4] == "index.php?page=ganti_pass") {echo 'active';}
                    elseif ($uri_segments[4] == "index.php?page=backup") {echo 'active';}
                    elseif ($uri_segments[4] == "index.php?page=user") {echo 'active';}
                ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesetting" aria-expanded="true" aria-controls="collapsesetting">
                    <i class="fas fa-fw fa-cogs"></i><span>Settings</span>
                </a>
                <div id="collapsesetting" class="collapse" aria-labelledby="headingsetting" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Pengaturan:</h6>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=profile") {echo 'active';} ?>" href="?page=profile">Profile</a>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=ganti_pass") {echo 'active';} ?>" href="?page=ganti_pass">Ganti Password</a>
                        <?php 
                            if ($_SESSION['level']=="admin") {
                                echo ''?>
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=backup") {echo 'active';} ?>" href="?page=backup">Backup & Restore</a>

                        <!-- Tombol users tampil jika login akun admin -->
                        <a class="collapse-item <?php if ($uri_segments[4] == "index.php?page=user") {echo 'active';} ?>" href="?page=user">Users</a>
                        <?php  ;
                            }else{
                                echo '';
                            }
                        ?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php
                                        $nama = $_SESSION['nama_user'] == "Admin";
                                        if ($nama == "Admin") {
                                            echo $_SESSION['nama_user'];
                                        } else {
                                            echo $_SESSION['nama_user'];
                                        }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle" src="asset/img/bg_profil.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item <?php if ($uri_segments[4] == "index.php?page=profile") {echo 'active';} ?>" href="?page=profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile
                                </a>
                                <a class="dropdown-item <?php if ($uri_segments[4] == "index.php?page=ganti_pass") {echo 'active';} ?>" href="?page=ganti_pass">
                                    <i class="fas fa-unlock fa-sm fa-fw mr-2 text-gray-400"></i>Ganti Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php include('asset/inc/content.php'); ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Kelompok 1</a> - <?= date("Y"); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik "Logout" jika yakin untuk mengakhiri sesi ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>  
    <script src="asset/js/ekko-lightbox.js"></script>
    <script src="asset/js/ekko-lightbox.min.js"></script>

    <!-- Page level plugins -->
    <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="asset/js/demo/datatables-demo.js"></script>

    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>

</body>
</html>
