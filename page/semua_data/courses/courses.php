<h1 class="h3 mb-4 text-gray-800">Halaman Courses</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_coursesModal">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th width="3%" class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama Pelajaran</th>
                        <th class="text-center">Teacher ID</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "../../../asset/inc/config.php";
                        $query = "SELECT * FROM tb_courses ORDER BY urutan ASC";
                        $result = mysqli_query($koneksi, $query);
 
                        //mengecek apakah ada error ketika menjalankan query
                        if(!$result){
                            die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                        }

                        //buat perulangan untuk element tabel dari data courses
                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo "$no"; ?></td>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['nama_pelajaran']; ?></td>
                            <td><?php echo $data['teacher_id']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit_coursesModal"
                                data-urutan="<?php echo $data['urutan'];?>"
                                data-id="<?php echo $data['id'];?>"
                                data-nama_pelajaran="<?php echo $data['nama_pelajaran'];?>"
                                data-teacher_id="<?php echo $data['teacher_id'];?>"><i class="fas fa-edit"></i> edit</a>

                                <a href="page/semua_data/courses/hapus.php?urutan=<?php echo $data['urutan'];?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> delete</a>
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

<!-- Modal add courses -->
<div class="modal fade" id="add_coursesModal" tabindex="-1" aria-labelledby="coursesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coursesModalLabel">Form Add Courses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="page/semua_data/courses/tambah.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id" name="id" autocomplete="off" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" autocomplete="off" placeholder="Nama Pelajaran">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="teacher_id" name="teacher_id" autocomplete="off" placeholder="Teacher ID">
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
<div class="modal fade" id="edit_coursesModal" tabindex="-1" aria-labelledby="coursesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coursesModalLabel">Form Edit Courses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form method="post" action="page/semua_data/courses/edit.php">
                    <input type="hidden" name="urutan" id="urutan">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="id" autocomplete="off" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama_pelajaran" id="nama_pelajaran" autocomplete="off" placeholder="Nama Pelajaran">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="teacher_id" id="teacher_id" autocomplete="off" placeholder="Teacher ID">
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
    $('.edit').click(function() {
        $('#edit_coursesModal').modal();
        var urutan = $(this).attr('data-urutan')
        var id = $(this).attr('data-id')
        var nama_pelajaran = $(this).attr('data-nama_pelajaran')
        var teacher_id = $(this).attr('data-teacher_id')

        $('#urutan').val(urutan)
        $('#id').val(id)
        $('#nama_pelajaran').val(nama_pelajaran)
        $('#teacher_id').val(teacher_id)
    })
</script>
