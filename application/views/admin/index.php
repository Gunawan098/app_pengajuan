  <?php $this->load->view('template/header_admin.php');?>

<div class="wrapper">

  <?php $this->load->view('template/menu_admin.php');?>
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>Total User Pemohon</p>
                <h3><?=$user;?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <p>User yg Belum diVerifikasi</p>
                <h3><?=$v_user;?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-person"><i class="ion ion-edit" style="font-size: 40px"></i></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <p>Total Pengajuan KK</p>
                <h3><?=$kk;?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-document"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <p>Pengajuan KK Belum diverifikasi</p>
                <h3><?=$v_kk['blm_kk'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-document"><i class="ion ion-edit" style="font-size: 40px"></i></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <p>Bukti Pengajuan KK</p>
                <h3><?=$b_kk['sdh_kk'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-code-download"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">        
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <p>Total Pengajuan E-KTP Baru</p>
                <h3><?=$ektp;?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-card"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <p>Pengajuan E-KTP Belum diverifikasi</p>
                <h3><?=$v_ektp['blm_ektp'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-card"><i class="ion ion-edit" style="font-size: 40px"></i></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->      
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <p>Bukti Pengajuan E-KTP Baru</p>
                <h3><?=$b_ektp['sdh_ektp'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-code-download"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <p>Total Pengajuan SPK</p>
                <h3><?=$spk;?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <p>Pengajuan SPK Belum diverifikasi</p>
                <h3><?=$v_spk['blm_spk'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-clipboard"><i class="ion ion-edit" style="font-size: 40px"></i></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <p>Bukti Pengajuan SPK</p>
                <h3><?=$b_spk['sdh_spk'];?></h3>

              </div>
              <div class="icon">
                <i class="ion ion-code-download"></i>
              </div>
              <a class="small-box-footer"><i class="fas fa"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <?php $this->load->view('template/footer_admin.php');?>
</div>

  <?php $this->load->view('template/js_admin.php');?>
  </body>
</html>