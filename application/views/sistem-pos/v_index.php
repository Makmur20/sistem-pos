<?php
$this->load->view('templates/header');
?>
<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">

<?php
$this->load->view('templates/main-navigation'); 
?>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"></li>
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
                <h3 class="card-title">Home</h3>
              </div>

	   <!-- /.card-header -->
    <div class="card-body">
     <?php $h=$this->session->userdata('akses'); ?>
     <?php $u=$this->session->userdata('user'); ?>

        <!-- Projects Row -->

          <!-- ./col -->
        <div class="row">
         <?php if($h=='1'){ ?> 
           <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'sistem-pos/barang'?>">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Barang</p>
                      </a>
                </div> 
            </div>

             <div class="col-md-3 portfolio-item">
                <div class="menu-item color" style="height:150px;">
                     <a href="<?php echo base_url().'sistem-pos/kategori'?>">
                           <i class="fa fa-sitemap"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Kategori</p>
                      </a>
                </div> 
            </div>


            <div class="col-md-3 portfolio-item">
                <div class="menu-item blue" style="height:150px;">
                     <a href="<?php echo base_url().'sistem-pos/penjualan'?>">
                           <i class="fa fa-shopping-bag"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Penjualan</p>
                      </a>
                </div> 
            </div>
            
           
           
            <div class="col-md-3 portfolio-item">
                <div class="menu-item green" style="height:150px;">
                     <a href="<?php echo base_url().'sistem-pos/user'?>">
                           <i class="fa fa-users"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Pengguna</p>
                      </a>
                </div> 
            </div>

            <?php }?>
            <?php if($h=='2'){ ?> 

            <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'sistem-pos/barang'?>">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Barang</p>
                      </a>
                </div> 
            </div>

            <div class="col-md-3 portfolio-item">
                <div class="menu-item blue" style="height:150px;">
                     <a href="<?php echo base_url().'sistem-pos/penjualan'?>">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Penjualan</p>
                      </a>
                </div> 
            </div>
                                  
            <?php }?>
        </div>
        
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
        <?php if($h=='1'){ ?> 
           
            <div class="col-md-3 portfolio-item">
                <div class="menu-item blue" style="height:150px;">
                     <a href="<?php echo base_url().'sistem-pos/laporan'?>">
                           <i class="fa fa-file"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                      </a>
                </div> 
            </div>
            </div>

            <?php }?>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</div>
  
        <!-- /.row -->	
    <!-- /.container -->

   
<?php
$this->load->view('templates/footer'); 
?>

</html>
