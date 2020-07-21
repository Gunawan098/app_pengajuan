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
                <h3 class="card-title"><?=$title;?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >
                  <div class="row">
                   <?php foreach($verifikasi as $row) : ?>
                    <div class="col-lg-6">

                      <?php if(strstr($lookup->deskripsi_layanan, "kk_baru_skrng")){ ?>
                        <div class="form-group"><label>KK</label>
                        <?php if(!empty($row->kk_baru_skrng)) {?>
                          <br><label style="font-size: 13px;">Lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->kk_baru_skrng);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="kk_baru_skrng_old" value="<?=$row->kk_baru_skrng;?>">
                        <input type="file" class="custom-file-input" name="kk_baru_skrng">
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "ektp_baru_skrng")){ ?>
                        <div class="form-group"><label>Ektp</label>
                        <?php if(!empty($row->ektp_baru_skrng)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->ektp_baru_skrng);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="ektp_baru_skrng_old" value="<?=$row->ektp_baru_skrng;?>">
                        <input type="file" class="custom-file-input" name="ektp_baru_skrng">
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "nama_pemohon")){ ?>  
                        <div class="form-group"><label>Nama Pemohon</label>
                        <input type="text" class="form-control" name="nama_pemohon" placeholder="*Masukkan Nama Anda" value="<?=$row->nama_pemohon;?>" required></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "no_nik")){ ?>  
                        <div class="form-group"><label>NIK Pemohon</label>
                        <input type="text" class="form-control" name="no_nik" placeholder="*Masukkan Nama Anda" value="<?=$row->no_nik;?>" required></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "status_pemohon")){ ?> 
                        <div class="form-group">
                        <label>Status Pemohon</label>
                        <select name="status_pemohon" class="form-control" required>
                        <option value="">--pilih status--</option>
                        <?php if($row->status_pemohon=='kepala keluarga'){?>
                        <option selected value="kepala keluarga">Kepala Keluarga</option>
                        <option value="istri">Istri</option>
                        <option value="anak">Anak</option>
                        <option value="keponakan">Keponakan</option>
                        <?php }elseif($row->status_pemohon=='istri'){ ?>
                        <option value="laki-laki">Kepala Keluarga</option>
                        <option selected value="istri">Istri</option>
                        <option value="anak">Anak</option>
                        <option value="keponakan">Keponakan</option>
                        <?php }elseif($row->status_pemohon=='anak'){ ?>
                        <option value="laki-laki">Kepala Keluarga</option>
                        <option value="istri">Istri</option>
                        <option selected value="anak">Anak</option>
                        <option value="keponakan">Keponakan</option>
                        <?php }elseif($row->status_pemohon=='keponakan'){ ?>
                        <option value="laki-laki">Kepala Keluarga</option>
                        <option value="istri">Istri</option>
                        <option value="anak">Anak</option>
                        <option selected value="keponakan">Keponakan</option>
                        <?php }else{?>
                        <option value="kepala keluarga">Kepala Keluarga</option>
                        <option value="istri">Istri</option>
                        <option value="anak">Anak</option>
                        <option value="keponakan">Keponakan</option>
                        <?php }?></select>
                        </div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "kk_lama")){ ?> 
                        <div class="form-group"><label>KK Lama</label>
                        <?php if(!empty($row->kk_lama)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->kk_lama);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="kk_lama_old" value="<?=$row->kk_lama;?>">
                        <input type="file" class="custom-file-input" name="kk_lama" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "ektp_suami")){ ?>
                        <div class="form-group"><div class="row">
                          <div class="col-sm-6">
                            <label>EKTP Suami</label>
                        <?php if(!empty($row->ektp_suami)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->ektp_suami);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                            <div class="custom-file">
                            <input type="hidden" class="custom-file-input" name="ektp_suami_old" value="<?=$row->ektp_suami;?>">
                            <input type="file" class="custom-file-input" name="ektp_suami" >
                            <label class="custom-file-label">Choose file</label>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <label>EKTP Istri</label>
                        <?php if(!empty($row->ektp_istri)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->ektp_istri);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                            <div class="custom-file">
                            <input type="hidden" class="custom-file-input" name="ektp_istri_old" value="<?=$row->ektp_istri;?>">
                            <input type="file" class="custom-file-input" name="ektp_istri" >
                            <label class="custom-file-label">Choose file</label>
                            </div>
                          </div>
                        </div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "akta_nikah")){ ?>
                        <div class="form-group"><label>Buku Nikah / Akte Nikah</label>
                        <?php if(!empty($row->akta_nikah)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->akta_nikah);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="akta_nikah_old" value="<?=$row->akta_nikah;?>">
                        <input type="file" class="custom-file-input" name="akta_nikah" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "nama_ygpindah")){ ?> 
                        <div class="form-group"><label>Nama Anggota yg pindah</label>
                        <textarea type="text" class="form-control" name="nama_ygpindah" placeholder="*Masukkan Nama Anggota yg pindah" rows="3" required><?=$row->nama_ygpindah;?></textarea></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "jumlah_ygpindah")){ ?>
                        <div class="form-group"><label>Jumlah Anggota Yang Pindah</label>
                        <input type="number" value="<?=$row->jumlah_ygpindah;?>" class="form-control" name="jumlah_ygpindah" required></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "formulir_surat_pindah")){ ?>
                        <div class="form-group"><label>Formulir Surat Pindah</label>
                        <?php if(!empty($row->formulir_surat_pindah)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->formulir_surat_pindah);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="formulir_surat_pindah_old" value="<?=$row->formulir_surat_pindah;?>">
                        <input type="file" class="custom-file-input" name="formulir_surat_pindah" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                    </div>
                    <div class="col-lg-6">
                      <?php if(strstr($lookup->deskripsi_layanan, "foto")){ ?>
                        <div class="form-group"><label>Foto</label>
                        <?php if(!empty($row->foto)) {?>
                          <br><label style="font-size: 13px;">Foto Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->foto);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="foto_old" value="<?=$row->foto;?>">
                        <input type="file" class="custom-file-input" name="foto" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "skl")){ ?>
                        <div class="form-group"><label>SKL</label>
                        <?php if(!empty($row->skl)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->skl);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="skl_old" value="<?=$row->skl;?>">
                        <input type="file" class="custom-file-input" name="skl" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "surat_pindah_kk")){ ?>
                        <div class="form-group"><label>Surat Pindah</label>
                        <?php if(!empty($row->surat_pindah_kk)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->surat_pindah_kk);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="surat_pindah_kk_old" value="<?=$row->surat_pindah_kk;?>">
                        <input type="file" class="custom-file-input" name="surat_pindah_kk" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "form_kk")){ ?>
                        <div class="form-group"><label>Form KK F1.01</label>
                        <?php if(!empty($row->form_kk)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->form_kk);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="form_kk_old" value="<?=$row->form_kk;?>">
                        <input type="file" class="custom-file-input" name="form_kk" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>


                      <?php if(strstr($lookup->deskripsi_layanan, "ijazah")){ ?>
                        <div class="form-group"><label>Ijazah Terakhir</label>
                        <?php if(!empty($row->ijazah)) {?>
                          <br><label style="font-size: 13px;">lampiran Anda Sebelumnya&nbsp;
                          <a class="btn btn-sm btn-success" href="<?=base_url('master/get_image/'.$row->id_pelayanan.'/'.$row->ijazah);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
                        <?php } ?> 
                        <div class="custom-file">
                        <input type="hidden" class="custom-file-input" name="ijazah_old" value="<?=$row->ijazah;?>">
                        <input type="file" class="custom-file-input" name="ijazah" >
                        <label class="custom-file-label">Choose file</label></div></div>
                      <?php } ?>


                      <?php if(strstr($lookup->deskripsi_layanan, "alasan_pindah")){ ?>
                        <div class="form-group"><label>Alasan Pindah</label>
                        <textarea type="text" class="form-control" name="alasan_pindah" placeholder="Alasan pinndah" rows="3" required><?=$row->alasan_pindah;?></textarea></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "alamat_asal")){ ?>
                        <div class="form-group"><label>alamat Asal</label>
                        <textarea type="text" class="form-control" name="alamat_asal" placeholder="Alamat" rows="3" required><?=$row->alamat_asal;?></textarea></div>
                      <?php } ?>

                      <?php if(strstr($lookup->deskripsi_layanan, "alamat_pindah")){ ?>
                        <div class="form-group"><label>Alamat Pindah</label>
                        <textarea type="text" class="form-control" name="alamat_pindah" placeholder="Alamat pindah" rows="3" required><?=$row->alamat_pindah;?></textarea></div>
                      <?php } ?>
                    </div>
                   <?php endforeach ?>
                  </div><hr>
                  <button type="submit" class="btn btn-primary ">Update</button>
                  <button onclick="window.history.go(-1); return false;" class="btn btn-default  ml-2">Cancel</button>
                  <input type="hidden" class="form-control" name="id_pengajuan" value="<?=$row->id_pengajuan?>">
                  <input type="hidden" class="form-control" name="nama_pelayanan" value="<?=$lookup->nama_pelayanan?>">
                  <input type="hidden" class="form-control" name="id_pelayanan" value="<?=$lookup->id_pelayanan?>">
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

