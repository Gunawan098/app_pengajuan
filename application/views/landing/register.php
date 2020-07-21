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
                        <li class="active"><a href="#">Daftar</a><i class="icon-angle-right"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <form role="form" class="register-form" action="<?php echo base_url('auth/post_register') ?>" method="post" accept-charset="utf-8">
                        <?php if ($this->session->flashdata('danger')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $this->session->flashdata('danger'); ?>
                            </div>
                        <?php endif; ?>
                        <h2>Please Sign Up <small>It's free and always will be.</small></h2>
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama" id="nama" class="form-control input-lg" placeholder="Nama Lengkap" tabindex="1">
                                    <?php echo form_error('nama'); ?> 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="no_kk" id="no_kk" class="form-control input-lg" placeholder="No. KK" tabindex="6">
                                    <?php echo form_error('no_kk'); ?> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="no_tlp" id="no_tlp" class="form-control input-lg" placeholder="No. HP" tabindex="2">
                                    <?php echo form_error('no_tlp'); ?> 
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama_kepala" id="nama_kepala" class="form-control input-lg" placeholder="Nama Kepala Keluarga" tabindex="7">
                                    <?php echo form_error('nama_kepala'); ?> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="3">
                                    <?php echo form_error('email'); ?> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="no_nik" id="no_nik" class="form-control input-lg" placeholder="No. NIK" tabindex="4">
                                    <?php echo form_error('no_nik'); ?> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                                    <?php echo form_error('password'); ?> 
                                </div>
                            </div>
                        </div>
                        
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-theme btn-block btn-lg" tabindex="7"></div>
                            <div class="col-xs-12 col-md-6">Already have an account? <a href="<?=base_url();?>auth/index">Sign In</a></div>
                        </div>
                    </form>
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