          <div class="col-lg-3">
            <aside class="left-sidebar">
          <?php if(!empty($this->cek->id_user)) {?>
            <?php if($this->cek->verifikasi=='sudah verifikasi') {?>
            <div class="widget">
              <h5 class="widgetheading">Menu User</h5>
              <ul class="cat">
                <li class="dropdown">
                  <i class="fa fa-angle-right"></i><a class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Pengajuan</a>
                  <ul class="dropdown-menu">
                      <li><a href="<?=site_url('pengajuan-pembuatan-KK');?>">Pengajuan pembuatan KK</a></li>
                      <li><a href="<?=site_url('pengajuan-EKTP-baru');?>">Pengajuan pembuatan EKTP</a></li>
                      <li><a href="<?=site_url('pengajuan-surat-pindah-keluar');?>">Pengajuan pembuatan Surat Pindah Keluar</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <i class="fa fa-angle-right"></i><a class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Status Pengajuan</a>
                  <ul class="dropdown-menu">
                      <li><a href="<?=site_url('status-pengajuan-KK');?>">Status Pengajuan pembuatan KK</a></li>
                      <li><a href="<?=site_url('status-pengajuan-EKTP-baru');?>">Status Pengajuan pembuatan EKTP</a></li>
                      <li><a href="<?=site_url('status-pengajuan-surat-pindah-keluar');?>">Status Pengajuan pembuatan Surat Pindah Keluar</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <i class="fa fa-angle-right"></i><a class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false" href="#">Bukti Pengajuan</a>
                  <ul class="dropdown-menu">
                      <li><a href="<?=site_url('bukti-pengajuan-KK');?>">Bukti Pendaftaran KK</a></li>
                      <li><a href="<?=site_url('bukti-pengajuan-EKTP-baru');?>">Bukti Pendaftaran E-KTP</a></li>
                      <li><a href="<?=site_url('bukti-pengajuan-surat-pindah-keluar');?>">Bukti Pendaftaran Surat Pindah Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <?php } ?>
          <?php }else{
            $this->session->sess_destroy();
            redirect(base_url('auth/post_login'));
          }?>
            </aside>
          </div>