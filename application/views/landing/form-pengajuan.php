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
						<li><a href="#">Pengajuan</a><i class="icon-angle-right"></i></li>
						<li class="active"><?= ucwords($title); ?></li>
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
				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>	
					<div class="comment-area">								
						<!-- <div class="marginbot30"></div> -->
						<?php if(empty($pelayanan->id_pelayanan)){?>	
						<h4><?= ucwords($title); ?></h4>
						<form method="post" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >								
							<div class="row">
								<div class="col-lg-6">
									<?php if(strstr($lookup->deskripsi_layanan, "kk_baru_skrng")){ ?>
										<div class="form-group"><label>KK</label>
										<input type="file" class="form-control" name="kk_baru_skrng" required></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "ektp_baru_skrng")){ ?>
										<div class="form-group"><label>Ektp</label>
										<input type="file" class="form-control" name="ektp_baru_skrng" required></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "nama_pemohon")){ ?>	
										<div class="form-group"><label>Nama Pemohon</label>
										<input type="text" class="form-control" name="nama_pemohon" placeholder="*Masukkan Nama Anda" value="<?=$this->session->userdata('nama')?>" required></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "no_nik")){ ?>	
										<div class="form-group"><label>NIK Pemohon</label>
										<input type="text" class="form-control" name="no_nik" placeholder="*Masukkan Nama Anda" value="<?=$this->session->userdata('no_nik')?>" required></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "status_pemohon")){ ?>	
										<div class="form-group"><label>Status Pemohon</label>
										<select name="status_pemohon" class="form-control" required>
											<option value="">--pilih status--</option>
											<option value="kepala keluarga">Kepala Keluarga</option>
											<option value="istri">Istri</option>
											<option value="anak">Anak</option>
											<option value="keponakan">Keponakan</option>
										</select></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "kk_lama")){ ?>	
										<div class="form-group"><label>KK Lama</label>
										<input type="file" class="form-control" name="kk_lama" required></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "ektp_suami")){ ?>
										<div class="form-group"><div class="row">
											<div class="col-sm-6">
												<label>EKTP Suami</label>
												<input type="file" class="form-control" name="ektp_suami">
											</div>
											<div class="col-sm-6">
												<label>EKTP Istri</label>
												<input type="file" class="form-control" name="ektp_istri">
											</div></div></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "akta_nikah")){ ?>
										<div class="form-group"><label>Buku Nikah / Akte Nikah</label>
										<input type="file" class="form-control" name="akta_nikah"></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "nama_ygpindah")){ ?>	
										<div class="form-group"><label>Nama Anggota yg pindah</label>
										<textarea type="text" class="form-control" name="nama_ygpindah" placeholder="*Masukkan Nama Anggota yg pindah" rows="3" required></textarea></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "jumlah_ygpindah")){ ?>
										<div class="form-group"><label>Jumlah Anggota Yang Pindah</label>
										<input type="number" class="form-control" name="jumlah_ygpindah" required></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "formulir_surat_pindah")){ ?>
										<div class="form-group"><label>Formulir Surat Pindah</label>
										<input type="file" class="form-control" name="formulir_surat_pindah" required></div>
									<?php } ?>
								</div>
								<div class="col-lg-6">
									<?php if(strstr($lookup->deskripsi_layanan, "foto")){ ?>
										<div class="form-group"><label>Foto</label>
										<input type="file" class="form-control" name="foto" required></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "skl")){ ?>
										<div class="form-group"><label>SKL</label>
										<input type="file" class="form-control" name="skl"></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "surat_pindah_kk")){ ?>
										<div class="form-group"><label>Surat Pindah</label>
										<input type="file" class="form-control" name="surat_pindah_kk"></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "form_kk")){ ?>
										<div class="form-group"><label>Form KK F1.01</label>
										<input type="file" class="form-control" name="form_kk" required></div>
									<?php } ?>



									<?php if(strstr($lookup->deskripsi_layanan, "ijazah")){ ?>
										<div class="form-group"><label>Ijazah Terakhir</label>
										<input type="file" class="form-control" name="ijazah" required></div>
									<?php } ?>


									<?php if(strstr($lookup->deskripsi_layanan, "alasan_pindah")){ ?>
										<div class="form-group"><label>Alasan Pindah</label>
										<textarea type="text" class="form-control" name="alasan_pindah" placeholder="Alasan pinndah" rows="3" required></textarea></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "alamat_asal")){ ?>
										<div class="form-group"><label>alamat Asal</label>
										<textarea type="text" class="form-control" name="alamat_asal" placeholder="Alamat" rows="3" required></textarea></div>
									<?php } ?>
									<?php if(strstr($lookup->deskripsi_layanan, "alamat_pindah")){ ?>
										<div class="form-group"><label>Alamat Pindah</label>
										<textarea type="text" class="form-control" name="alamat_pindah" placeholder="Alamat pindah" rows="3" required></textarea></div>
									<?php } ?>
								</div>
							</div>
							<button type="submit" class="btn btn-theme btn-md">Submit</button>
							<input type="hidden" class="form-control" name="id_user" value="<?=$this->session->userdata('id_user')?>">
							<input type="hidden" class="form-control" name="lookup_id" value="<?php echo $lookup_id; ?>">
							<input type="hidden" class="form-control" name="index_uri" value="<?php echo $index_uri; ?>">
						</form>
						<?php }else{?>
							<?php if ($this->session->flashdata('successs')): ?>
								<div class="alert alert-success" role="alert">
									<?php echo $this->session->flashdata('successs'); ?>
								</div>
							<?php endif; ?>	
							<h5>Anda Sudah melakukan <?= ucwords($title); ?>, harap Menunggu Persetujuan dari Kecamatan.</h5>
							<h5>Bisa Anda lihat di menu status pengajuan disebelah kiri</h5>
						<?php }?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</section>

	<?php $this->load->view('template/footer.php');?>
</div>

<?php $this->load->view('template/js.php');?>

<script type="application/javascript">  
 /** After windod Load */  
 $(window).bind("load", function() {  
   window.setTimeout(function() {  
     $(".alert").fadeTo(500, 0).slideUp(500, function() {  
       $(this).remove();  
     });  
   }, 10000);  
 });  
</script>