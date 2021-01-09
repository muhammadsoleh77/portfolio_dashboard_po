<style media="screen">
    .main-menu {
        text-align: center;
        padding: 10px;
    }

    .menu {
        /* font-size: 16px; */
        background-color: #e0af1b;
        border: 2px solid #e0af1b;
        border-radius: 6px;
        padding: 10px;
        color: #fff;
    }

    .menu:hover {
        background-color: #fff;
        color: #e0af1b;
        cursor: pointer;
        border: 2px solid #e0af1b;
    }

    .disabled {
        border: 2px solid #ddd;
        background-color: #ddd;
        cursor: pointer;
    }
</style>

<div class="widgets" style="margin-top: 50px;">
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="<?php echo base_url('admin/dashboard') ?>"><b>Home</b></a></li>
        <li><a href="<?php echo base_url('admin/tunaiCashless') ?>"><b>Tunai / Cashless</b></a></li>
        <li class="active"><b>Tunai</b></li>
    </ul>
    <!-- END BREADCRUMB -->

    <!-- START LAPORAN -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?php echo base_url('admin/tunaiCashless/tunai') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu">
                                Tunai
                            </div>
                        </div>
                    </a>
                    <a href="<?php echo base_url('admin/tunaiCashless/cashless') ?>">
                        <div class="col-md-6 main-menu">
                            <div class="menu disabled">
                                Non Tunai (Cashless)
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- <div class="content-top clearfix">
            <h2>&nbsp;</h2>
        </div> -->
    </div>
    <!-- END LAPORAN -->

    <div class="widgets">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default bootstrap-panel">
                    <div>
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="<?php echo base_url() ?>assets/joli/img/page_construction.png" style="margin:auto; opacity:0.5; margin-top:150px;" width="200" height="200" alt="construction" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>