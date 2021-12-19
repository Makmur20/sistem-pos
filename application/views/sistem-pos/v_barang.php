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
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
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
                <h3 class="card-title"></h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <?php if($this->session->userdata('akses')=='1'): ?>
                  <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Barang</a></div><br><br>
              <?php endif;?>
                <table id="mydata" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Pokok</th>
                        <th>Harga Jual</th>                      
                        <th>Stok</th>
                        <th>Min Stok</th>
                        <th>Kategori</th>
                        <?php if($this->session->userdata('akses')=='1'): ?>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['id_barang'];
                        $barang_nama=$a['nama_barang'];
                        $satuan=$a['satuan_barang'];
                        $harpok=$a['harga_pokok_barang'];
                        $harjul=$a['harga_jual_barang'];
                        $stok=$a['stok_barang'];
                        $min_stok=$a['stok_min_barang'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['nama_kategori'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo $barang_nama;?></td>
                        <td style="text-align:center;"><?php echo $satuan;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                        <td style="text-align:center;"><?php echo $stok;?></td>
                        <td style="text-align:center;"><?php echo $min_stok;?></td>
                        <td><?php echo $kat_nama;?></td>
                         <?php if($this->session->userdata('akses')=='1'): ?>
                        <td style="text-align:center;">                       
                            <a class="btn btn-xs btn-warning" href="#modalEditBarang<?php echo $id?>" data-toggle="modal" title="Ubah"><span class="fa fa-edit"></span>Ubah</a>
                        
                            <a class="btn btn-xs btn-danger" href="#modalHapusBarang<?php echo $id?>" data-toggle="modal" title="Hapus"><span class="fa fa-close"></span>Hapus</a>
                             <?php endif; ?>
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
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
               
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'sistem-pos/barang/tambah_barang'?>">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="idbar" class="form-control" type="text" placeholder="Masukan Kode Barang..."  required="number">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar" class="form-control" type="text" placeholder="Masukan Nama Barang..." required>
                        </div>
                    </div>

                     <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['nama_kategori'];
                                    ?>
                                        <option value="<?php echo $id_kat;?>"><?php echo $nm_kat;?></option>
                                <?php }?>
                                    
                                </select>
                            </div>
                        </div>

                 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan</label>
                        <div class="col-xs-9">
                             <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                <option>Unit</option>
                                <option>Kotak</option>
                                <option>Botol</option>
                                <option>Butir</option>
                                <option>Buah</option>
                                <option>Biji</option>
                                <option>Sachet</option>
                                <option>Bks</option>
                                <option>Roll</option>
                                <option>PCS</option>
                                <option>Box</option>
                                <option>Meter</option>
                                <option>Centimeter</option>
                                <option>Liter</option>
                                <option>CC</option>
                                <option>Mililiter</option>
                                <option>Lusin</option>
                                <option>Gross</option>
                                <option>Kodi</option>
                                <option>Rim</option>
                                <option>Dozen</option>
                                <option>Kaleng</option>
                                <option>Lembar</option>
                                <option>Helai</option>
                                <option>Gram</option>
                                <option>Kilogram</option>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Pokok</label>
                        <div class="col-xs-9">
                            <input name="harpok" class="harpok form-control" type="text" placeholder="Masukan Harga Pokok..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga</label>
                        <div class="col-xs-9">
                            <input name="harjul" class="harjul form-control" type="text" placeholder="Masukan Harga Jual" style="width:335px;">
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="number" placeholder="Masukan Jumlah Stok" style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Minimal Stok</label>
                        <div class="col-xs-9">
                            <input name="min_stok" class="form-control" type="number" placeholder="Jumlah Minimal Stok" style="width:335px;">
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
                        $id=$a['id_barang'];
                        $barang_nama=$a['nama_barang'];
                        $satuan=$a['satuan_barang'];
                        $harpok=$a['harga_pokok_barang'];
                        $harjul=$a['harga_jual_barang'];
                        $stok=$a['stok_barang'];
                        $min_stok=$a['stok_min_barang'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['nama_kategori'];
                    ?>
                <div id="modalEditBarang<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Data Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'sistem-pos/barang/edit_barang'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Barang</label>
                            <div class="col-xs-9">
                                <input name="idbar" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Barang..." readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Barang</label>
                            <div class="col-xs-9">
                                <input name="nabar" class="form-control" type="text" value="<?php echo $barang_nama;?>" placeholder="Nama Barang..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['nama_kategori'];
                                    if($id_kat==$kat_id)
                                        echo "<option value='$id_kat' selected>$nm_kat</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kat</option>";
                                }
                                ?>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Satuan</label>
                            <div class="col-xs-9">
                                 <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                    <?php if($satuan=='Unit'):?>
                                        <option selected>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Kotak'):?>
                                        <option>Unit</option>
                                        <option selected>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Botol'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option selected>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Butir'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option selected>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Buah'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option selected>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Biji'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option selected>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Sachet'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option selected>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Bks'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option selected>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Roll'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option selected>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='PCS'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option selected>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Box'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option selected>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Meter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option selected>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Centimeter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option selected>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Liter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option selected>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='CC'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option selected>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Mililiter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option selected>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Lusin'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option selected>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Gross'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option selected>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Kodi'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option selected>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Rim'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option selected>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Dozen'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option selected>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Kaleng'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option selected>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Lembar'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option selected>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Helai'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option selected>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Gram'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option selected>Gram</option>
                                        <option>Kilogram</option>
                                    <?php else:?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option selected>Kilogram</option>
                                    <?php endif;?>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Pokok</label>
                            <div class="col-xs-9">
                                <input name="harpok" class="harga_pokok form-control" type="text" value="<?php echo $harpok;?>" placeholder="Harga Pokok..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Jual</label>
                            <div class="col-xs-9">
                                <input name="harjul" class="harjul form-control" type="text" value="<?php echo $harjul;?>" placeholder="Harga Jual..." style="width:335px;" required>
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" value="<?php echo $stok;?>" placeholder="Stok..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Minimal Stok</label>
                            <div class="col-xs-9">
                                <input name="min_stok" class="form-control" type="number" value="<?php echo $min_stok;?>" placeholder="Minimal Stok..." style="width:335px;" required>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
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
                        $id=$a['id_barang'];
                        $barang_nama=$a['nama_barang'];
                        $satuan=$a['satuan_barang'];
                        $harpok=$a['harga_pokok_barang'];
                        $harjul=$a['harga_jual_barang'];
                        $stok=$a['stok_barang'];
                        $min_stok=$a['stok_min_barang'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['nama_kategori'];
                    ?>
                <div id="modalHapusBarang<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                         <h4 class="modal-title">Hapus Barang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'sistem-pos/barang/hapus_barang'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
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

    <?php } ?>
</div>
</div>
</div>
</div>


<?php
$this->load->view('templates/footer'); 
?>

    <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
    
</body>

</html>
