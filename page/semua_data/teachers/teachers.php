<h1 class="h3 mb-4 text-gray-800">Halaman Teachers</h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#add_teachersModal">Tambah</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-dark text-white">
                    <tr>
                        <th width="3%" class="text-center">No</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Nama</th>
                        <th width="15%" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "asset/inc/config.php";
                        $query = "SELECT * FROM tb_teachers ORDER BY urutan ASC";
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
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['nama_guru']; ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit_teachersModal"
                                data-urutan="<?php echo $data['urutan'];?>"
                                data-id="<?php echo $data['id'];?>"
                                data-nama_guru="<?php echo $data['nama_guru'];?>"><i class="fas fa-edit"></i> edit</a>

                                <a href="page/semua_data/teachers/hapus.php?urutan=<?php echo $data['urutan'];?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> delete</a>
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

<!-- Modal add teachers -->
<div class="modal fade" id="add_teachersModal" tabindex="-1" aria-labelledby="teachersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teachersModalLabel">Form Add teachers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="page/semua_data/teachers/tambah.php" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id" name="id" autocomplete="off" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_guru" name="nama_guru" autocomplete="off" placeholder="Nama Guru">
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


<!-- Modal edit teachers -->
<div class="modal fade" id="edit_teachersModal" tabindex="-1" aria-labelledby="teachersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teachersModalLabel">Form Edit teachers</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> 
            <div class="modal-body">
                <form action="page/semua_data/teachers/edit.php" method="post">
                    <input type="hidden" name="urutan" id="urutan">
                    <div class="form-group">
                        <input type="text" class="form-control" name="id" id="id" autocomplete="off" placeholder="ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama_guru" id="nama_guru" autocomplete="off" placeholder="Nama Guru">
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
        $('#edit_teachersModal').modal();
        var urutan = $(this).attr('data-urutan')
        var id = $(this).attr('data-id')
        var nama_guru = $(this).attr('data-nama_guru')
    
        $('#urutan').val(urutan)
        $('#id').val(id)
        $('#nama_guru').val(nama_guru)
    })
</script>
