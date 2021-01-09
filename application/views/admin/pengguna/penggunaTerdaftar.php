<style media="screen">
  .main-menu {
    text-align:center;
    padding:10px;
  }
  .menu {
    /* font-size:16px; */
    background-color:#e0af1b;
    border:2px solid #e0af1b;
    border-radius:6px;
    padding:10px;
    color:#fff;
  }
  .menu:hover {
    background-color:#fff;
    color:#e0af1b;
    cursor:pointer;
    border:2px solid #e0af1b;
  }
</style>

<div class="widgets">

  <!-- START BREADCRUMB -->
  <ul class="breadcrumb">
      <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
      <li class="active">Pengguna Terdaftar</li>
  </ul>
  <!-- END BREADCRUMB -->

  <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default bootstrap-panel">
          <div class="panel-body">
            <div class="col-md-12">
              <button class="btn btn-warning pull-right" ng-click="add()"><i class="glyphicon glyphicon-plus"></i>
                Tambah</button>
            </div><br><br><br>
            <div class="row table-responsive" style="border:none;">
              <table class="table table-bordered table-striped">
                <col width="5%">
                <col width="30%">
                <col width="20%">
                <col width="20%">
                <col width="40%">

                <thead>
                  <tr class="sortable ">
                    <th class="text-center"><b>No</b></th>
                    <th class="text-center"><b>Nama</b></th>
                    <th class="text-center"><b>NIK</b></th>
                    <th class="text-center"><b>Posisi</b></th>
                    <th class="text-center"><b>Aksi</b></th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no=1; foreach ($dataPenggunaTerdaftar as $key => $pengguna) { ?>
                    <?php foreach ($pengguna->user->authorities as $key2 => $author) { ?>
                      <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $pengguna->nama ? $pengguna->nama : '-' ?></td>
                        <td class="text-center"><?php echo $pengguna->nik ? $pengguna->nik : '-' ?></td>
                        <td class="text-center"><?php echo $author->authority ?></td>
                        <td class="text-center">
                          <button class="btn btn-primary editable-table-button btn-sm" ng-click="edit(item)">Edit</button>
                          <button class="btn btn-danger editable-table-button btn-sm" ng-click="delete(item)">Hapus</button>
                        </td>
                      </tr>
                    <?php } ?>
                  <?php } ?>
                </tbody>
              </table>

              <div class="col-md-12">
                <span class="text-center">
                  <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
                </span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

</div>
