<style>
    .x-navigation li > ul li > .logout:hover {
        background: #00000033;
    }
    .sticky {
        position: fixed;
        /* top: 0; */
        /* width: 100%; */
    }

    /* @media only screen and (max-width: 1024px) {
        .x-navigation.x-navigation-horizontal > li:last-child > a
        {
            position: relative;
            display: block;
            width: 50px;
            right: 0px;
        }
    } */

    /* @media (min-width: 780px) {
        .stickyHeader {
            position: fixed !important;
            width: 100%;
            right: 0px;
        }
    } */

    #headers {
        position: fixed;
        width: 50px;
        right: 0px;
    }

    @media only screen and (max-width: 1024px) {
        #headers {
            position: absolute;
            width: 50px;
            right: 0px;
        }
    }

    .x-navigation.x-navigation-horizontal li a:hover {
        background: transparent !important;
    }

    .ubahPass a > i:hover {
        background-color: transparent;
        /* color: transparent; */
    }
    
</style>
<!-- PAGE CONTENT -->
            <div class="page-content header" id="myHeader">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel sticky">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent" style="color:<?php echo $dataPo->bgcolor ?>;"></span></a>
                    </li>
                    <li class="xn-icon-button">
                        <img src="<?php echo $dataPo->logo; ?>" alt="" style="width:137px; height:26px; margin-top:12px;" />
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SIGN OUT -->
                    <!-- <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout">
                            <img src="<?php echo base_url() ?>assets/joli/img/Group7.svg" style="width:30px; height:30px; margin-top:-5px;">
                        </a>
                    </li> -->
                    <li id="headers" class="dropdown xn-icon-button">
                    <h5 style="margin-left:-150px; margin-top:18px;"><b>Welcome, <?= $dataUser->name; ?></b></h5>
                    </li>
                    <li id="headers" class="dropdown xn-icon-button">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url() ?>assets/joli/img/Group7.svg" style="width:30px; height:30px; margin-top:-5px;">
                        </a>
                        <ul class="dropdown-menu" style="margin-left:-120px;">
                            <li>
                                <a href="<?php echo base_url('login/changePassword') ?>" style="color:#707070">
                                    <img src="<?php echo base_url() ?>assets/joli/img/gembok.png" style="margin-right:10px;">
                                    Ubah Password
                                </a>
                            </li>
                            <li>
                                <a class="logout" href="<?php echo base_url('login/logout') ?>" style="color:#707070">
                                    <img src="<?php echo base_url() ?>assets/joli/img/logout.svg" style="margin-right:10px;">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li style="position:fixed; width:50px;">
                            <img src="<?php echo base_url() ?>assets/joli/img/Icon-material-notifications.svg" style="margin-top:11px; margin-right:30px; margin-left:30px;">
                    </li> -->
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

<script>
    // window.onscroll = function() {myFunction()};

    // var header = document.getElementById("myHeader");
    // var sticky = header.offsetTop;

    // function myFunction() {
    //     if (window.pageYOffset > sticky) {
    //         header.classList.add("sticky");
    //     } else {
    //         header.classList.remove("sticky");
    //     }
    // }

    // jQuery(function($) {
    //     $(window).on("scroll", function () {
    //         if ($(this).scrollTop() > 100) {
    //             $("#headers").addClass("stickyHeader");
    //         }
    //         else {
    //             $("#headers").removeClass("stickyHeader");
    //         }
    //     })
    // });
</script>