<?php
$this->load->view('templates/header');
$this->load->view('templates/main-navigation'); 
?>

   
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div>
        </div>
        <?= $this->session->flashdata('massage');?>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with minimal features & hover style</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah User</a></div><br><br>
                <table id="mydata" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Status</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['user_id'];
                        $nm=$a['user_nama'];
                        $username=$a['user_username'];                        
                        $level=$a['user_level'];
                        $status=$a['user_status'];
                ?>
               
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $username;?></td>
                        <td><?php if ($level == 1){
                            echo "Administrator";
                             }else{
                            echo "Kasir";
                             } ?></td>
                        <td><?php if ($status == 1){
                            echo "Aktif";
                             }else{
                            echo "Nonaktif";
                             } ?></td>
                       
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEditUser<?php echo $id?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span> Ubah</a>
                            <a class="btn btn-xs btn-danger" href="#modalHapusUser<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-trash"></span> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'sistem-pos/user/tambah_user'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" autocomplete="off" type="text" placeholder="Masukan Nama..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="username" class="form-control" autocomplete="off" type="text" placeholder="Masukan Username..."required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="password" class="form-control" type="password" placeholder="Masukan Password..." required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ulangi Password</label>
                        <div class="col-xs-9">
                            <input name="password2" class="form-control" type="password" placeholder="Ulangi Password..."required>
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-9">
                            <select name="level" class="form-control" required>
                                <option value="1">Administrator</option>
                                <option value="2">Kasir</option>
                            </select>
                        </div>
                    </div>   

                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                    <button class="btn btn-success">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['user_id'];
                        $nm=$a['user_nama'];
                        $username=$a['user_username'];
                        $password=$a['user_password'];
                        $level=$a['user_level'];
                        $status=$a['user_status'];
                    ?>
                <div id="modalEditUser<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                       <h4 class="modal-title">Ubah Data User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'sistem-pos/user/edit_user'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $id;?>">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama</label>
                        <div class="col-xs-9">
                            <input name="nama" class="form-control" type="text" autocomplete="off" value="<?php echo $nm;?>" placeholder="Masukan Nama..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-9">
                            <input name="username" class="form-control" type="text" autocomplete="off" value="<?php echo $username;?>" placeholder="Masukan Username..." required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-9">
                            <input name="password" class="form-control" type="password" autocomplete="off" placeholder="Masukan Password...">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Ulangi Password</label>
                        <div class="col-xs-9">
                            <input name="password2" class="form-control" type="password" autocomplete="off" placeholder="Ulangi Password...">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-9">
                            <select name="level" class="form-control" required>
                            <?php if ($level=='1'):?>
                                <option value="1" selected>Administrator</option>
                                <option value="2">Kasir</option>
                            <?php else:?>
                                <option value="1">Administrator</option>
                                <option value="2" selected>Kasir</option>
                            <?php endif;?>
                            </select>
                        </div>
                    </div>

                </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['user_id'];
                        $nm=$a['user_nama'];
                        $username=$a['user_username'];
                        $password=$a['user_password'];
                        $level=$a['user_level'];
                        $status=$a['user_status'];
                    ?>
                <div id="modalHapusUser<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                       <h4 class="modal-title">Hapus Data User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'sistem-pos/user/hapus_user'?>">
                        <div class="modal-body">
                            <p>Yakin mau meghapus user <b><?php echo $nm;?></b>..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-success">Hapus</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>

            <?php
        }
        ?>
    </div>
</div>


      
<?php
$this->load->view('templates/footer'); 
?>
    
</body>

</html>
