<<?php
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
            <h1>Alert</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Alert</a></li>
              <li class="breadcrumb-item active">Alert</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                    <strong>Transaksi Berhasil Silahkan Cetak Faktur Penjualan!</strong>
                    <a class="btn btn-warning" href="<?php echo base_url().'sistem-pos/penjualan'?>"><span class="fa fa-backward"></span>Kembali</a>
                    <a class="btn btn-info" href="<?php echo base_url().'sistem-pos/penjualan/cetak_faktur'?>" target="_blank"><span class="fa fa-print"></span>Cetak</a>
                    </div>
                  </div>
                </div>
            </div>
   </div>
</div>





</body>

</html>
