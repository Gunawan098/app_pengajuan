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
            <h1 class="m-0 text-dark">Master</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Master</a></li>
              <li class="breadcrumb-item">User</li>
              <li class="breadcrumb-item active">Edit</li>
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
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Edit Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
                  <div class="row">
                   <?php foreach($user as $row) : ?>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nama Pemohon</label>
                        <input type="text" class="form-control" name="nama" placeholder="*Masukkan Nama Anda" value="<?=$row->nama;?>">
                      </div>

                      <div class="form-group">
                        <label>No. HP</label>
                        <input type="text" class="form-control" name="no_tlp" placeholder="nomor hp" value="<?=$row->no_tlp;?>">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                            </div>
                            <input type="email" class="form-control" name="email"  value="<?=$row->email;?>" placeholder="email">
                        </div>
                      </div>                    

                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="j_k" class="form-control">
                        <option value="<?=$row->j_k;?>">--Jenis Kelamin--</option>
                        <?php if($row->j_k=='laki-laki'){?>
                        <option selected value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                        <?php }elseif($row->j_k=='perempuan'){ ?>
                        <option value="laki-laki">Laki-laki</option>
                        <option selected value="perempuan">Perempuan</option>
                        <?php }else{?>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                        <?php }?></select>
                      </div>

                      <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" value="<?php echo !empty($row->tgl_lahir) ? set_value('tgl_lahir', date('Y-m-d', strtotime($row->tgl_lahir))) : set_value('tgl_lahir'); ?>">
                      </div>

                      <div class="form-group">
                        <label>Alamat Lengkap</label>
                        <textarea type="text" class="form-control" name="alamat" rows="3"><?=$row->alamat;?></textarea>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Foto</label>
                        <?php if(!empty($row->foto)) {?>
                          <br><label style="font-size: 13px;">foto Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('landing/get_image/user/'.$row->foto);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?>  
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="foto_old" value="<?=$row->foto;?>">
                        <input type="file" class="custom-file-input" name="foto">
                        <label class="custom-file-label">Choose file</label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>EKTP / KK</label>  
                        <?php if(!empty($row->ktp_kk)) {?>
                          <br><label style="font-size: 13px;">ektp / kk Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('landing/get_image/user/'.$row->ktp_kk);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?>  
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="ktp_kk_old" value="<?=$row->ktp_kk;?>">
                        <input type="file" class="custom-file-input" name="ktp_kk">
                        <label class="custom-file-label">Choose file</label>
                        </div>
                      </div>
                      -----------------------------------------------------------------------------------------------------
                      <div class="form-group mt-1">
                        <label>No. KK</label>
                        <input type="number" class="form-control" name="no_kk" value="<?=$row->no_kk;?>">
                      </div>

                      <div class="form-group">
                        <label>Nama Kepala Keluarga</label>
                        <input type="text" class="form-control" name="nama_kepala" value="<?=$row->nama_kepala;?>">
                      </div>

                      <div class="form-group">
                        <label>Alamat KK</label>
                        <textarea type="text" class="form-control" name="alamat_kk" rows="3"><?=$row->alamat_kk;?></textarea>
                      </div>
                    </div>
                   <?php endforeach ?>
                  </div><hr>
                  <button type="submit" class="btn btn-primary ">Update</button>
                  <button onclick="window.history.go(-1); return false;" class="btn btn-default  ml-2">Cancel</button>
                  <input type="hidden" class="form-control" name="id_user" value="<?=$row->id_user;?>">
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>


  </body>
</html>

