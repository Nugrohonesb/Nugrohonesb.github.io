<?php
    // memanggil file koneksi.php untuk melakukan koneksi database
    include '../../../asset/inc/config.php';
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Export Final Data Reports</title>

    <!-- custom style -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="shortcut icon" href="asset/img/bg_title.png" type="image/x-icon">
</head>
<body>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="export_final_data" width="100%" cellspacing="0">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th width="3%" class="text-center">No</th>
                            <th class="text-center">Student ID</th>
                            <th class="text-center">Nama Siswa</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Course ID</th>
                            <th class="text-center">Nama Pelajaran</th>
                            <th class="text-center">Teacher ID</th>
                            <th class="text-center">Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            $query = "SELECT tb_grades.student_id, tb_students.nama_siswa, tb_students.email, tb_grades.course_id, tb_courses.nama_pelajaran, tb_courses.teacher_id, tb_teachers.nama_guru, tb_grades.grade FROM tb_grades LEFT JOIN tb_students ON tb_students.id=tb_grades.student_id LEFT JOIN tb_courses ON tb_courses.id=tb_grades.course_id LEFT JOIN tb_teachers ON tb_teachers.id=tb_courses.teacher_id";
                            $result = mysqli_query($koneksi, $query);
     
                            //mengecek apakah ada error ketika menjalankan query
                            if(!$result){
                                die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                            }

                            //buat perulangan untuk element tabel dari data final data report
                            $no = 1;
                            while($data = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td class="text-center"><?php echo "$no"; ?></td>
                                <td><?php echo $data['student_id']; ?></td>
                                <td><?php echo $data['nama_siswa']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['course_id']; ?></td>
                                <td><?php echo $data['nama_pelajaran']; ?></td>
                                <td><?php echo $data['teacher_id']; ?></td>
                                <td><?php echo $data['grade']; ?></td>
                            </tr>
                        <?php
                            $no++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
    $(document).ready(function() {
        $('#export_final_data').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy','csv','excel', 'pdf', 'print'
            ]
        } );
    } );
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

</body>
</html>