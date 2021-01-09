<style>
    #inner {
        display: table;
        margin: 0 auto;
        /* border: 1px solid black; */
    }

    #outer {
        /* border: 1px solid red; */
        width: 100%
    }
</style>
<div class="widgets" style="margin-top: 50px;">
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
        <li class="active"><b>Crew</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <!-- START LAPORAN -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open(base_url('admin/crew/tampilCrewSAP'), 'class="form-horizontal"'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal">
                                    <div class="form-group">

                                        <div class="col-lg-3">
                                            <select class="form-control select" name="pilihTypeProduk">
                                                <option value="" disabled selected>Pilih Type Produk(Bus)</option>
                                                <!-- <option value="0">Semua</option> -->
                                                <option value="JA">JAC</option>
                                                <option value="JR">JRC</option>
                                                <option value="JG">TJR</option>
                                            </select>
                                            <span style="color:red;"><?php echo form_error('pilihTypeProduk'); ?></span>
                                        </div>

                                        <div class="col-lg-1">
                                            <button class="btn btn-warning" type="submit" name="submit" value="tampilSetoran">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                                <!-- <hr> -->
                            </div>
                        </div>
                        <?php echo form_close(); ?>

                        <br/><br/><h3>DAFTAR CREW</h3>
                        <table class="table table-bordered table-striped table-responsive" id="tabel_trayek">
                            <col width="2%">
                            <col width="15%">
                            <col width="15%">

                            <thead>
                                <tr class="th-bg">
                                    <th class="text-center"><b>No</b>.</th>
                                    <th class="text-center"><b>ID Customer</b></th>
                                    <th class="text-center"><b>Nama Crew</b></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if ($dataCrewSAP) {
                                    $no = 1;
                                    foreach ($dataCrewSAP->data as $dataCrew) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++ ?></td>
                                            <td class="text-center"><?php echo $dataCrew->CUSTOMER ?></td>
                                            <td class="text-center"><?php echo $dataCrew->NAME ?></td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td class="text-center">Data tidak ditemukan</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="content-top clearfix">
                <h2>&nbsp;</h2>
            </div>
        </div>
    </div>
    <!-- END LAPORAN -->

    <script>
        $(document).ready(function() {
            $('#tabel_trayek').DataTable({
                "searching": false,
                "lengthChange": false,
                // "bPaginate": false,
                "bInfo": false
            });
        })
    </script>