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
              <li class="breadcrumb-item active">User</li>
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
                <h3 class="card-title">Data Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  	<thead>
                      <tr>
                        <th>No</th>
                        <th>No. NIK</th>
                        <th>Nama</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach($user as $row) : ?>
                      <tr>
                      	<td><?=$i++;?></td>
                      	<td><?=$row->no_nik;?></td>
                      	<td><?=$row->nama;?></td>
                      	<td><?=$row->no_tlp;?></td>
                      	<td><?=$row->email;?></td>
                      	<td><?=$row->alamat;?></td>
                      	<td>
                          <?php if($row->verifikasi=='sudah verifikasi') {?>
                            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_verifikasi<?=$row->id_user;?>" style="color: white;"><i class="fa fa-check"></i> <?=$row->verifikasi;?></a>
                          <?php }else{ ?>
                            <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal_verifikasi<?=$row->id_user;?>"><i class="fa fa-times"></i> <?=$row->verifikasi;?></a>
                          <?php } ?>

                        </td>
                      	<td class="actions-row"><a class="btn btn-outline-info btn-sm item-detail" href="javascript:void(0)" title="Detail" data="<?=$row->id_user?>"><i class="fa fa-eye"></i> Detail</a>

                        <a class="btn btn-outline-warning btn-sm" href="<?=base_url('master/edit_view_user/'.$row->id_user);?>">
                            <i class="fa fa-edit"></i> Edit</a>

                        <a class="btn btn-outline-danger btn-sm" href="javascript:void(0)" data-toggle="modal" data-target="#modal_delete<?=$row->id_user;?>"><i class="fa fa-times"></i> Delete</a></td>
                      </tr>
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
      var iduser = $(this).attr('data');
      $.ajax({
          url: "<?php echo base_url() ?>master/detail_status_user",
          method: "POST",
          data: {iduser:iduser},
          success: function(data){
              $('#data_row').html(data);
              $('#modal_form2').modal('show');
          }

      });
  });


</script>
<!-- Bootstrap modal detail -->
<div class="modal fade" id="modal_form2" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Data User</h3>
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

<!-- Bootstrap modal verifikasi -->
<?php foreach($user as $row) :?>
    <div class="modal fade" id="modal_verifikasi<?=$row->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Verifikasi User</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'master/persetujuan_user'?>">
            <div class="modal-body">
                <input name="id_user" value="<?=$row->id_user;?>" class="form-control" type="hidden">
                <input name="verifikasi" value="<?=$row->verifikasi;?>" class="form-control" type="hidden">
                <input name="redirectt" value="<?=$redirectt;?>" class="form-control" type="hidden">

                <p>Ubah Status Verifikasi User ?</p>

            </div>

            <div class="modal-footer">
                <button class="btn btn-info">Ya</button>
                <button class="btn btn-light" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </form>
        </div>
        </div>
    </div>

<?php endforeach;?>

<!-- Bootstrap modal delete -->
<?php foreach($user as $row) :?>
    <div class="modal fade" id="modal_delete<?=$row->id_user;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel">Delete User</h3>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
        </div>
        <form class="form-horizontal" method="post" action="<?php echo base_url().'master/delete_user'?>">
            <div class="modal-body">
                <input name="id_user" value="<?=$row->id_user;?>" class="form-control" type="hidden">
                <input name="redirectt" value="<?=$redirectt;?>" class="form-control" type="hidden">

                <p>Apakah Anda Ingin Menghapus User ?</p>

            </div>

            <div class="modal-footer">
                <button class="btn btn-info">Ya</button>
                <button class="btn btn-light" data-dismiss="modal" aria-hidden="true">Tidak</button>
            </div>
        </form>
        </div>
        </div>
    </div>

<?php endforeach;?>

  </body>
</html>

