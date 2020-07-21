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
						<li><a href="#">Pemberitahuan</a><i class="icon-angle-right"></i></li>
						<li class="active">#</li>
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
				<?php if ($this->session->flashdata('info')): ?>
					<div class="alert alert-info" role="alert">
						<?php echo $this->session->flashdata('info'); ?>
					</div>
				<?php endif; ?>
					<div class="clear"></div>
					<div class="clear"></div><br>
				</div>
			</div>
		</div>
	</section>

	<?php $this->load->view('template/footer.php');?>
</div>

<?php $this->load->view('template/js.php');?>