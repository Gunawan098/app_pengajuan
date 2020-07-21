	<header>			
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?=base_url();?>"><img src="<?=base_url();?>assets/img/logo_fix.jpeg" alt="" width="199" height="52" /></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a href="<?=base_url();?>">Home</a>
						</li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Profile <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=base_url();?>content-tentang">Tentang</a></li>
                                <li><a href="<?=base_url();?>content-visi-misi">Visi & Misi</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="<?=base_url();?>content-persyaratan">Persyaratan</a></li>
                        <li class="dropdown"><a href="<?=base_url();?>content-pengajuan">Pengajuan</a></li>
                        <li class="dropdown"><a href="<?=base_url();?>content-kontak">Kontak</a></li>
                        <?php if($this->session->userdata('status') != "login") {?>
                        <li class="dropdown"><a href="<?=base_url();?>auth/index">Login</a></li>
                        <li class="dropdown"><a href="<?=base_url();?>auth/post_register">Register</a></li>
                        <?php }else{?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">My <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?=base_url();?>auth/profile">Profile</a></li>
                                <li><a href="<?=base_url();?>pengajuan-pembuatan-KK">Menu Pengajuan</a></li>
                                <li><a href="<?=base_url();?>auth/logout">Logout</a></li>
                            </ul>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>
        </div>
	</header>