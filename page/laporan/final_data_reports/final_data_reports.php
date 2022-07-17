<h1 class="h3 mb-4 text-gray-800">Halaman Final Data Reports</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="page/laporan/final_data_reports/export.php" target="_blank" class="btn btn-sm btn-success">Export Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        include "../../../asset/inc/config.php";
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
