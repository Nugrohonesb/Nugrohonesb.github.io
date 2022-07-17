<h1 class="h3 mb-4 text-gray-800">Halaman Students</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_studentsModal">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th width="3%" class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama Siswa</th>
                        <th class="text-center">Email</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                        include "../../../asset/inc/config.php";
                        $query = "SELECT * FROM tb_students ORDER BY urutan ASC";
                        $result = mysqli_query($koneksi, $query);

                        //mengecek apakah ada error ketika menjalankan query
                        if(!$result){
                            die ("Query Error: ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                        }

                        //buat perulangan untuk element tabel dari data student
                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td class="text-center"><?php echo "$no"; ?></td>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['nama_siswa']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit_studentsModal"
                                data-urutan="<?php echo $data['urutan']; ?>"
                                data-id="<?php echo $data['id']; ?>"
                                data-nama_siswa="<?php echo $data['nama_siswa']; ?>"
                                data-email="<?php echo $data['email']; ?>"><i class="fas fa-edit"></i> edit</a>

                                <a href="page/semua_data/students/hapus.php?urutan=<?php echo $data['urutan'];?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> delete</a>
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


<!-- Modal add students -->
<div class="modal fade" id="add_studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentsModalLabel">Form Add Students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="page/semua_data/students/tambah.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id" name="id" autocomplete="off" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" autocomplete="off" placeholder="Nama Siswa">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" autocomplete="off" placeholder="Email">
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


<!-- Modal edit students -->
<div class="modal fade" id="edit_studentsModal" tabindex="-1" aria-labelledby="studentsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentsModalLabel">Form Edit students</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form action="page/semua_data/students/edit.php" method="post">
                    <input type="hidden" name="urutan" id="urutan">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="id" autocomplete="off" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" autocomplete="off" placeholder="Nama Siswa">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" autocomplete="off" placeholder="Email">
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
        $('#edit_studentsModal').modal();
        var urutan = $(this).attr('data-urutan')
        var id = $(this).attr('data-id')
        var nama_siswa = $(this).attr('data-nama_siswa')
        var email = $(this).attr('data-email')

        $('#urutan').val(urutan)
        $('#id').val(id)
        $('#nama_siswa').val(nama_siswa)
        $('#email').val(email)
    })
</script>
