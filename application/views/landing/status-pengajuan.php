<?php $this->load->view('template/css.php');?>
<div id="wrapper">
	<!-- start header -->
	<?php $this->load->view('template/header.php');?>
	<!-- end header -->

	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="<?=base_url();?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li><a href="#">Status Pengajuan</a><i class="icon-angle-right"></i></li>
						<li class="active">...</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section id="content">
		<div class="container">
			<div class="row">
				<?php $this->load->view('template/menu_user.php');?>	
				<div class="col-lg-8">
					<div class="comment-area">								
						<!-- <div class="marginbot30"></div> -->
						<h4>Status <?= ucwords($title); ?></h4>	
						<table id="table_id"  class="table table-striped table-bordered">
						    <thead>
						        <tr>
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
										<th style="text-align:center">Status</th>
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
						            <th>Aksi</th>
						        </tr>
						    </thead>
						    <tbody>
						    	<?php foreach($data as $row) {?>
							        <tr>
									<?php if(strstr($lookup->deskripsi_layanan, "no_pengajuan")){ ?>
										<td style="text-align:center">
											<?php if($lookup_id==1) echo 'KK-'; if($lookup_id==2) echo 'EKTP-'; if($lookup_id==3) echo 'SPK-';?>
											<?=$row->no_pengajuan;?></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "nama_pemohon")){ ?>
										<td style="text-align:center">test<!-- <?=$row->nama;?> --></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "no_nik")){ ?>
										<td style="text-align:center"><?=$row->no_nik;?></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "status_pemohon")){ ?>
										<td style="text-align:center"><?=$row->status_pemohon;?></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "verifikasi_kk")){ ?>
										<td style="text-align:center"><?=$row->verifikasi_kk;?></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "verifikasi_ektp_baru")){ ?>
										<td style="text-align:center"><?=$row->verifikasi_ektp_baru;?></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "nama_ygpindah")){ ?>
										<td style="text-align:center"><?=$row->nama_ygpindah;?></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "jumlah_ygpindah")){ ?>
										<td style="text-align:center"><?=$row->jumlah_ygpindah;?></td>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "verifikasi_surat_pindah_keluar")){ ?>
										<td style="text-align:center"><?=$row->verifikasi_surat_pindah_keluar;?></td>
									<?php } ?>
							            <td style="text-align:center"><a class="btn btn-sm btn-primary item-detail" href="javascript:void(0)" title="Detail" data="<?=$row->id_pengajuan;?>" dataa="<?=$lookup_id?>"><i class="fa fa-eye"></i> Detail</a></td>
							        </tr>
						    	<?php } ?>
						    </tbody>
						</table>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</section>

	<?php $this->load->view('template/footer.php');?>
</div>

<?php $this->load->view('template/js.php');?>
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );

$('#table_id').on('click', '.item-detail', function(){
    var idpengajuan = $(this).attr('data');
    var idpelayanan = $(this).attr('dataa');
    $.ajax({
        url: "<?php echo base_url() ?>landing/detail_status_pengajuan",
        method: "POST",
        data: {idpengajuan:idpengajuan,idpelayanan:idpelayanan},
        success: function(data){
            $('#data_row').html(data);
            $('#modal_form').modal('show');
        }

    });
});
</script>

<!-- Bootstrap modal detail -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Data Pengajuan</h3>
            </div>
            <div class="modal-body">
                <div id="data_row">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->