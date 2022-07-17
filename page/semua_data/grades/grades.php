<h1 class="h3 mb-4 text-gray-800">Halaman Grades</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_gradesModal">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th width="3%" class="text-center">No</th>
                        <th class="text-center">Student ID</th>
                        <th class="text-center">Course ID</th>
                        <th class="text-center">Grade</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        include "asset/inc/config.php";
                        $query = "SELECT * FROM tb_grades ORDER BY urutan ASC";
                        $result = mysqli_query($koneksi, $query);
 
                        //mengecek apakah ada error ketika menjalankan query
                        if(!$result){
                            die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                        }

                        //buat perulangan untuk element tabel dari data teachers
                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo "$no"; ?></td>
                            <td><?php echo $data['student_id']; ?></td>
                            <td><?php echo $data['course_id']; ?></td>
                            <td><?php echo $data['grade']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit_gradesModal"
                                data-urutan="<?php echo $data['urutan'];?>"
                                data-student_id="<?php echo $data['student_id'];?>"
                                data-course_id="<?php echo $data['course_id'];?>"
                                data-grade="<?php echo $data['grade'];?>"><i class="fas fa-edit"></i> edit</a>

                                <a href="page/semua_data/grades/hapus.php?urutan=<?php echo $data['urutan'];?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> delete</a>
                            </td>
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


<!-- Modal add grades -->
<div class="modal fade" id="add_gradesModal" tabindex="-1" aria-labelledby="gradesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradesModalLabel">Form Add grades</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="page/semua_data/grades/tambah.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="student_id" name="student_id" autocomplete="off" placeholder="Student ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="course_id" name="course_id" autocomplete="off" placeholder="Course ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="grade" name="grade" autocomplete="off" placeholder="Grade">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" name="submit">Save changes</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</div>


<!-- Modal edit courses -->
<div class="modal fade" id="edit_gradesModal" tabindex="-1" aria-labelledby="gradesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradesModalLabel">Form Edit courses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form action="page/semua_data/grades/edit.php" method="post">
                    <input type="hidden" name="urutan" id="urutan">
                    <div class="form-group">
                        <input type="text" class="form-control" id="student_id" name="student_id" autocomplete="off" placeholder="Student ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="course_id" name="course_id" autocomplete="off" placeholder="Course ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="grade" name="grade" autocomplete="off" placeholder="Grade">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" name="update">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="asset/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $('.edit').click(function(){
        $('#edit_gradesModal').modal();
        var urutan = $(this).attr('data-urutan')
        var student_id = $(this).attr('data-student_id')
        var course_id = $(this).attr('data-course_id')
        var grade = $(this).attr('data-grade')

        $('#urutan').val(urutan)
        $('#student_id').val(student_id)
        $('#course_id').val(course_id)
        $('#grade').val(grade)
    })
</script>
