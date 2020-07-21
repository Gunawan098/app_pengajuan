<?php $this->load->view('template/css.php');?>
<div id="wrapper">
	<!-- start header -->
	<?php $this->load->view('template/header.php');?>
	<!-- end header -->
	<style>
        div.error {
        margin-bottom: 15px;
        margin-top: -6px;
        margin-left: 58px;
        color: red;
    }
    </style>

	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="<?=base_url();?>"><i class="fa fa-home"></i></a><i class="icon-angle-right"></i></li>
						<li><a href="#">Pengajuan</a><i class="icon-angle-right"></i></li>
						<li class="active">Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section id="content">
		<div class="container">
			<div class="row">
				<!-- notifikasi untuk mengupdate profile setelah register akun -->
				<!-- --------------------------------------------------------- -->
				<?php $this->load->view('template/menu_user.php');?>	
				<div class="col-lg-8">
				<?php if ($this->session->flashdata('success')): ?>
					<div class="alert alert-success" role="alert">
						<?php echo $this->session->flashdata('success'); ?>
					</div>
				<?php endif; ?>
					<div class="comment-area">								
						<!-- <div class="marginbot30"></div> -->	
						<h4>Update Profile</h4>
						<form method="post" role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" >								
							<div class="row">
								<div class="col-lg-6">
            					<aside class="left-sidebar">
									<div class="form-group"><label>Nama Pemohon</label>
									<input type="text" class="form-control" name="nama" placeholder="*Masukkan Nama Anda" value="<?=$user->nama;?>" readonly></div>
                                    <?php echo form_error('nama'); ?> 

									<div class="form-group"><label>No. HP</label>
									<input type="text" class="form-control" name="no_tlp" placeholder="nomor hp" value="<?=$user->no_tlp;?>" readonly></div>
                                    <?php echo form_error('no_tlp'); ?> 

									<div class="form-group"><label>Email</label>
									<input type="email" class="form-control" name="email"  value="<?=$user->email;?>" readonly></div>	
                                    <?php echo form_error('email'); ?> 

									<div class="form-group"><label>Jenis Kelamin</label>
									<select name="j_k" class="form-control"><option value="">--Jenis Kelamin--</option>
									<?php if($user->j_k=='laki-laki'){?>
									<option selected value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
									<?php }elseif($user->j_k=='perempuan'){ ?>
									<option value="laki-laki">Laki-laki</option>
									<option selected value="perempuan">Perempuan</option>
									<?php }else{?>
									<option value="laki-laki">Laki-laki</option>
									<option value="perempuan">Perempuan</option>
									<?php }?></select></div>
                                    <?php echo form_error('j_k'); ?> 

									<div class="form-group"><label>Tanggal Lahir</label>
									<input type="date" class="form-control" name="tgl_lahir" value="<?php echo !empty($user->tgl_lahir) ? set_value('tgl_lahir', date('Y-m-d', strtotime($user->tgl_lahir))) : set_value('tgl_lahir'); ?>">
									</div>
                                    <?php echo form_error('tgl_lahir'); ?> 

									<div class="form-group"><label>Alamat Lengkap</label>
									<textarea type="text" class="form-control" name="alamat"  rows="3"><?=$user->alamat;?></textarea></div>
                                    <?php echo form_error('alamat'); ?> 

									<div class="form-group"><label>Foto</label>
									<?php if(!empty($user->foto)) {?>
										<br><label style="font-style: italic;font-size: 13px;">foto Anda Sebelumnya&nbsp;
										<a class="btn btn-sm btn-success" href="<?=base_url('landing/get_image/user/'.$user->foto);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
									<?php } ?>	
									<input type="file" class="form-control" name="foto">
									<input type="hidden" class="form-control" name="foto_old" value="<?=$user->foto;?>"></div>

									<div class="form-group"><label>EKTP / KK</label>	
									<?php if(!empty($user->ktp_kk)) {?>
										<br><label style="font-style: italic;font-size: 13px;">ektp / kk Anda Sebelumnya&nbsp;
										<a class="btn btn-sm btn-success" href="<?=base_url('landing/get_image/user/'.$user->ktp_kk);?>" style="color: white;"><i class="fa fa-download"></i> Download</a></label>
									<?php } ?>	
									<input type="file" class="form-control" name="ktp_kk">
									<input type="hidden" class="form-control" name="ktp_kk_old" value="<?=$user->ktp_kk;?>"></div>
								</aside>
								</div>
								<div class="col-lg-6">
									<div class="form-group"><label>No. KK</label>
									<input type="text" class="form-control" name="no_kk"  value="<?=$user->no_kk;?>"></div>
                                    <?php echo form_error('no_kk'); ?> 

									<div class="form-group"><label>Nama Kepala Keluarga</label>
									<input type="text" class="form-control" name="nama_kepala"  value="<?=$user->nama_kepala;?>"></div>
                                    <?php echo form_error('nama_kepala'); ?> 

									<div class="form-group"><label>Alamat KK</label>
									<textarea type="text" class="form-control" name="alamat_kk"   rows="3"><?=$user->alamat_kk;?></textarea></div>
                                    <?php echo form_error('alamat_kk'); ?> 
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-9 col-md-9">
									 *Foto tidak boleh Selfi (ukuran 3X4) min 500kb
								</div>
								<!-- <div class="col-xs-12 col-sm-9 col-md-9">
									 *text
								</div> -->
							</div>
							<button type="submit" class="btn btn-theme btn-md">Submit</button>
							<input type="hidden" class="form-control" name="id_user" value="<?=$this->session->userdata('id_user')?>">


						</form>
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
   }, 15000);  
 });  
</script>