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
            <h1 class="m-0 text-dark">Bukti Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bukti Pendaftaran</a></li>
              <li class="breadcrumb-item active">Pendaftaran KK</li>
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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data <?=$title;?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  	<thead>
                    <tr>
                      <th style="text-align:center">No.</th>
                      <?php if(strstr($lookup->deskripsi_layanan, "no_pengajuan")){ ?>
                        <th style="text-align:center">Nomor Pengajuan</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "nama_pemohon")){ ?>
                        <th style="text-align:center">Nama pemohon</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "no_nik")){ ?>
                        <th style="text-align:center">Nomor NIK</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "status_pemohon")){ ?>
                        <th style="text-align:center">Status pemohon</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "verifikasi_kk")){ ?>
                        <th style="text-align:center">Verifikasi</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "kk_baru_skrng")){ ?>
                        <th style="text-align:center">KK</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "ektp_baru_skrng")){ ?>
                        <th style="text-align:center">EKTP</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "formulir_surat_pindah")){ ?>
                        <th style="text-align:center">Formulir Surat Pindah</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "ijazah")){ ?>
                        <th style="text-align:center">Ijazah Terakhir</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "verifikasi_ektp_baru")){ ?>
                        <th style="text-align:center">Status</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "nama_ygpindah")){ ?>
                        <th style="text-align:center">Nama Anggota yg pindah</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "jumlah_ygpindah")){ ?>
                        <th style="text-align:center">Jumlah Anggota yg pindah</th>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "verifikasi_surat_pindah_keluar")){ ?>
                        <th style="text-align:center">Status</th>
                      <?php } ?>
                      <th style="text-align:center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i=1;foreach($data as $row) : ?>
                    <?php if($row->verifikasi_kk=='sudah verifikasi' || $row->verifikasi_ektp_baru=='sudah verifikasi' || $row->verifikasi_surat_pindah_keluar=='sudah verifikasi') : ?>
                      <tr>
                        <td style="text-align:center"><?=$i++;?></td>
                      <?php if(strstr($lookup->deskripsi_layanan, "no_pengajuan")){ ?>
                        <td style="text-align:center">
                          <?php if($lookup_id==1) echo 'KK-'; if($lookup_id==2) echo 'EKTP-'; if($lookup_id==3) echo 'SPK-';?>
                          <?=$row->no_pengajuan;?></td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "nama_pemohon")){ ?>
                        <td style="text-align:center"><?=$row->nama_pemohon;?></td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "no_nik")){ ?>
                        <td style="text-align:center"><?=$row->no_nik;?></td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "status_pemohon")){ ?>
                        <td style="text-align:center"><?=$row->status_pemohon;?></td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "verifikasi_kk")){ ?>
                        <td style="text-align:center">
                          <a class="btn btn-success btn-sm" style="color: white;cursor: default;" ><i class="fa fa-check"></i> <?=$row->verifikasi_kk;?></a>
                        </td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "kk_baru_skrng")){ ?>
                        <td style="text-align:center">
                          <?php echo (trim($row->kk_baru_skrng) != '' ) ? anchor('master/get_image/'.$lookup_id.'/'.$row->kk_baru_skrng,'
                              <button type="button" class="btn btn-outline-info"><span class="dripicons-download">Download</span>
                              </button>',array('target'=>'_niew')) : ''; ?></td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "ektp_baru_skrng")){ ?>
                        <td style="text-align:center">
                          <?php echo (trim($row->ektp_baru_skrng) != '' ) ? anchor('master/get_image/'.$lookup_id.'/'.$row->ektp_baru_skrng,'
                              <button type="button" class="btn btn-outline-info"><span class="dripicons-download">Download</span>
                              </button>',array('target'=>'_niew')) : ''; ?>
                        </td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "formulir_surat_pindah")){ ?>
                        <td style="text-align:center;width: 135px;">
                          <?php echo (trim($row->formulir_surat_pindah) != '' ) ? anchor('master/get_image/'.$lookup_id.'/'.$row->formulir_surat_pindah,'
                              <button type="button" class="btn btn-outline-info"><span class="dripicons-download">Download</span>
                              </button>',array('target'=>'_niew')) : ''; ?>
                        </td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "ijazah")){ ?>
                        <td style="text-align:center">
                          <?php echo (trim($row->ijazah) != '' ) ? anchor('master/get_image/'.$lookup_id.'/'.$row->ijazah,'
                              <button type="button" class="btn btn-outline-info"><span class="dripicons-download">Download</span>
                              </button>',array('target'=>'_niew')) : ''; ?>
                        </td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "verifikasi_ektp_baru")){ ?>
                        <td style="text-align:center">
                            <a class="btn btn-success btn-sm" style="color: white;cursor: default;" ><i class="fa fa-check"></i> <?=$row->verifikasi_ektp_baru;?></a>
                        </td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "nama_ygpindah")){ ?>
                        <td style="text-align:center"><?=$row->nama_ygpindah;?></td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "jumlah_ygpindah")){ ?>
                        <td style="text-align:center;width: 135px;"><?=$row->jumlah_ygpindah;?></td>
                      <?php } ?>
                      <?php if(strstr($lookup->deskripsi_layanan, "verifikasi_surat_pindah_keluar")){ ?>
                        <td style="text-align:center">
                          <a class="btn btn-success btn-sm" style="color: white;cursor: default;" ><i class="fa fa-check"></i> <?=$row->verifikasi_surat_pindah_keluar;?></a>
                        </td>
                      <?php } ?>
                          <td style="text-align:center"><a class="btn btn-outline-success btn-sm" href="<?=base_url('download-bukti-pendaftaran/'.$row->id_pengajuan);?>"><i class="fa fa-download"></i> Download</a>

                            <a class="btn btn-outline-info btn-sm item-detail" href="javascript:void(0)" title="Detail" data="<?=$row->id_pengajuan;?>" dataa="<?=$lookup_id?>"><i class="fa fa-eye"></i> Detail</a>
                          </td>
                      </tr>
                    <?php endif ?>
                  <?php endforeach ?>
                </tbody>
                </table>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });

  $('#example1').on('click', '.item-detail', function(){
      var idpengajuan = $(this).attr('data');
      var idpelayanan = $(this).attr('dataa');
      $.ajax({
          url: "<?php echo base_url() ?>master/detail_verifikasi_pengajuan",
          method: "POST",
          data: {idpengajuan:idpengajuan,idpelayanan:idpelayanan},
          success: function(data){
              $('#data_row').html(data);
              $('#modal_form1').modal('show');
          }

      });
  });

</script>
<!-- Bootstrap modal detail -->
<div class="modal fade" id="modal_form1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data Pengajuan</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div id="data_row">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


  </body>
</html>

