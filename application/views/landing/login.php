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
                        <li class="active"><a href="#">Login</a><i class="icon-angle-right"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                    <?php if ($this->session->flashdata('danger')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $this->session->flashdata('danger'); ?>
                        </div>
                    <?php endif; ?> 
                    <form role="form" class="register-form" action="<?php echo base_url('auth/post_login') ?>" method="post" accept-charset="utf-8">
                        <h2>Sign in <small>manage your account</small></h2>
                        <hr class="colorgraph">

                        <div class="form-group">
                            <input type="text" name="no_nik" id="no_nik" class="form-control input-lg" placeholder="No. NIK" tabindex="1">
                            <?php echo form_error('no_nik'); ?> 
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control input-lg" id="exampleInputPassword1" placeholder="Password" tabindex="2">
                            <?php echo form_error('password'); ?> 
                        </div>
                        
                        <hr class="colorgraph">
                        <div class="row">
                            <div class="col-xs-12 col-md-6"><input type="submit" value="Sign in" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>
                            <div class="col-xs-12 col-md-6">Don't have an account? <a href="<?=base_url();?>auth/post_register">Register</a></div>
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
   }, 10000);  
 });  
</script>