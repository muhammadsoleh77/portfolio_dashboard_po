<!-- <link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.common.min.css" />
<link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.default.min.css" />
<link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.dataviz.min.css" />
<link rel="stylesheet" href="http://cdn.kendostatic.com/2014.3.1119/styles/kendo.dataviz.default.min.css" />
<script src="http://cdn.kendostatic.com/2014.3.1119/js/kendo.all.min.js"></script> -->

<style media="screen">
label input {
  display: none; /* Hide the default checkbox */
}

/* Style the artificial checkbox */
label span {
  height: 10px;
  width: 10px;
  border: 1px solid grey;
  display: inline-block;
  position: relative;
}

/* Style its checked state...with a ticked icon */
[type=checkbox]:checked + span:before {
  content: '\2714';
  position: absolute;
  top: -5px;
  left: 0;
}

form {
  display: grid;
  padding: 1em;
  background: #f9f9f9;
  border: 1px solid #c1c1c1;
  margin: 2rem auto 0 auto;
  max-width: 600px;
  padding: 1em;
}
form input {
  background: #fff;
  border: 1px solid #9c9c9c;
}
form button {
  background: lightgrey;
  padding: 0.7em;
  width: 100%;
  border: 0;
}
form button:hover {
  background: gold;
}

input {
  padding: 0.7em;
  margin-bottom: 0.5rem;
}
input:focus {
  outline: 3px solid gold;
}

@media (min-width: 400px) {
  form {
    grid-template-columns: 200px 1fr;
    grid-gap: 16px;
  }


  input,
  button {
    grid-column: 2 / 3;
  }
}
</style>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/spj/spjJAC') ?>">SPJ JAC</a></li>
    <li class="active">Cetak SPJ JAC</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

<div class="widget">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default bootstrap-panel">
                <div class="panel-body">

                <div class="" id="pdfExport">
                  <div class="col-md-12">
                    <div class="col-md-3">
                      <span>
                        <img src="<?php echo $dataUser->logo ?>" style="width:100%;"/>
                      </span>
                    </div>
                    <div class="col-md-9">
                      <h4 class="text-center">
                        PT EKA SARI LORENA TRANSPORT <br>
                        SPJ DAN DAFTAR KONTROL PENUMPANG <br>
                        JABODETABEK AIRPORT CONNECTION <br>
                      </h4><br><br>

                    </div>
                  </div>

                  <div class="row" style="color:black;">
                    <div class="col-md-6">
                      <table>
                        <tbody>
                          <tr>
                            <td>Pengemudi &nbsp;</td>
                            <td> : </td>
                            <td>&nbsp; <?php echo $postSimpanPenugasan->namaSupir ?></td>
                          </tr>
                          <tr>
                            <td>SPJ &nbsp;</td>
                            <td> : </td>
                            <td>&nbsp;</td>
                          </tr>
                        </tbody>
                      </table><br><br>
                    </div>

                    <div class="col-md-6">
                      <table>
                        <tbody>
                          <tr>
                            <td>No.Armada &nbsp;</td>
                            <td> : </td>
                            <td>&nbsp; <?php echo $postSimpanPenugasan->kodeBus ?></td>
                          </tr>
                          <tr>
                            <td>Tanggal &nbsp;</td>
                            <td> : </td>
                            <td>&nbsp; <?php echo $postSimpanPenugasan->tanggal ?></td>
                          </tr>
                        </tbody>
                      </table><br><br>
                    </div>
                  </div>

                 <div class="wrapper" style="color:black;">
                   <div class="col-md-6">
                     <form class="form1" action="">
                       <div class="col-md-6">
                         <p style="font-size: 11px;">RUTE/TRAYEK:</p>
                       </div>
                       <div class="col-md-6">
                         <table>
                           <tbody>
                             <tr>
                               <td style="font-size: 11px;">JAM &nbsp;</td>
                               <td> : </td>
                             </tr>
                             <tr>
                               <td style="font-size: 11px;">PARAF &nbsp;</td>
                               <td> : </td>
                             </tr>
                           </tbody>
                         </table>
                       </div>

                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Depo Bogor
                       </label>
                       <label></label>
                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Mall Ciputra Cibubur/Cibubur Junction
                       </label>

                       <label>
                         <input type='checkbox'>
                         <span></span>
                         Halim Perdanakusuma
                       </label>

                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Legenda Wisata/Kota Wisata/Cibubur Junction
                       </label>
                       <label></label>
                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Depo RA Kartini/South Quarter/Point Square
                       </label>

                       <label>
                         <input type='checkbox'>
                         <span></span>
                         Soekarno Hatta
                       </label>

                       <label>
                        <input type='checkbox'>
                        <span></span>
                        BSD City
                       </label>
                       <label></label>

                       <label>Keterangan:</label>
                       <label class="text-center">Stempel</label><br>

                      </form>
                   </div>

                   <div class="col-md-6">
                     <form class="form1" action="">
                       <div class="col-md-6">
                         <p style="font-size: 11px;">RUTE/TRAYEK:</p>
                       </div>
                       <div class="col-md-6">
                         <table>
                           <tbody>
                             <tr>
                               <td style="font-size: 11px;">JAM &nbsp;</td>
                               <td> : </td>
                             </tr>
                             <tr>
                               <td style="font-size: 11px;">PARAF &nbsp;</td>
                               <td> : </td>
                             </tr>
                           </tbody>
                         </table>
                       </div>

                       <label></label>
                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Depo Bogor
                       </label>

                       <label>
                         <input type='checkbox'>
                         <span></span>
                         Halim Perdanakusuma
                       </label>

                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Mall Ciputra Cibubur/Cibubur Junction
                       </label>
                       <label></label>
                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Legenda Wisata/Kota Wisata/Cibubur Junction
                       </label>

                       <label>
                         <input type='checkbox'>
                         <span></span>
                         Soekarno Hatta
                       </label>

                       <label>
                        <input type='checkbox'>
                        <span></span>
                        Depo RA Kartini/South Quarter/Point Square
                       </label>
                       <label></label>
                       <label>
                        <input type='checkbox'>
                        <span></span>
                        BSD City
                       </label>

                       <label>Keterangan:</label>
                       <label class="text-center">Stempel</label><br>

                      </form>
                   </div>
                  </div>

                  <div class="wrapper" style="color:black;">
                    <div class="col-md-6">
                      <form class="form1" action="">
                        <div class="col-md-6">
                          <p style="font-size: 11px;">RUTE/TRAYEK:</p>
                        </div>
                        <div class="col-md-6">
                          <table>
                            <tbody>
                              <tr>
                                <td style="font-size: 11px;">JAM &nbsp;</td>
                                <td> : </td>
                              </tr>
                              <tr>
                                <td style="font-size: 11px;">PARAF &nbsp;</td>
                                <td> : </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Depo Bogor
                        </label>
                        <label></label>
                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Mall Ciputra Cibubur/Cibubur Junction
                        </label>

                        <label>
                          <input type='checkbox'>
                          <span></span>
                          Halim Perdanakusuma
                        </label>

                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Legenda Wisata/Kota Wisata/Cibubur Junction
                        </label>
                        <label></label>
                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Depo RA Kartini/South Quarter/Point Square
                        </label>

                        <label>
                          <input type='checkbox'>
                          <span></span>
                          Soekarno Hatta
                        </label>

                        <label>
                         <input type='checkbox'>
                         <span></span>
                         BSD City
                        </label>
                        <label></label>

                        <label>Keterangan:</label>
                        <label class="text-center">Stempel</label><br>

                       </form>
                    </div>

                    <div class="col-md-6">
                      <form class="form1" action="">
                        <div class="col-md-6">
                          <p style="font-size: 11px;">RUTE/TRAYEK:</p>
                        </div>
                        <div class="col-md-6">
                          <table>
                            <tbody>
                              <tr>
                                <td style="font-size: 11px;">JAM &nbsp;</td>
                                <td> : </td>
                              </tr>
                              <tr>
                                <td style="font-size: 11px;">PARAF &nbsp;</td>
                                <td> : </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                        <label></label>
                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Depo Bogor
                        </label>

                        <label>
                          <input type='checkbox'>
                          <span></span>
                          Halim Perdanakusuma
                        </label>

                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Mall Ciputra Cibubur/Cibubur Junction
                        </label>
                        <label></label>
                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Legenda Wisata/Kota Wisata/Cibubur Junction
                        </label>

                        <label>
                          <input type='checkbox'>
                          <span></span>
                          Soekarno Hatta
                        </label>

                        <label>
                         <input type='checkbox'>
                         <span></span>
                         Depo RA Kartini/South Quarter/Point Square
                        </label>
                        <label></label>
                        <label>
                         <input type='checkbox'>
                         <span></span>
                         BSD City
                        </label>

                        <label>Keterangan:</label>
                        <label class="text-center">Stempel</label><br>

                       </form>
                    </div>
                  </div>

                   <div class="wrapper" style="color:black;">
                     <div class="col-md-6">
                       <form class="form1" action="">
                         <div class="col-md-6">
                           <p style="font-size: 11px;">RUTE/TRAYEK:</p>
                         </div>
                         <div class="col-md-6">
                           <table>
                             <tbody>
                               <tr>
                                 <td style="font-size: 11px;">JAM &nbsp;</td>
                                 <td> : </td>
                               </tr>
                               <tr>
                                 <td style="font-size: 11px;">PARAF &nbsp;</td>
                                 <td> : </td>
                               </tr>
                             </tbody>
                           </table>
                         </div>

                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Depo Bogor
                         </label>
                         <label></label>
                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Mall Ciputra Cibubur/Cibubur Junction
                         </label>

                         <label>
                           <input type='checkbox'>
                           <span></span>
                           Halim Perdanakusuma
                         </label>

                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Legenda Wisata/Kota Wisata/Cibubur Junction
                         </label>
                         <label></label>
                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Depo RA Kartini/South Quarter/Point Square
                         </label>

                         <label>
                           <input type='checkbox'>
                           <span></span>
                           Soekarno Hatta
                         </label>

                         <label>
                          <input type='checkbox'>
                          <span></span>
                          BSD City
                         </label>
                         <label></label>

                         <label>Keterangan:</label>
                         <label class="text-center">Stempel</label><br>

                        </form>
                     </div>

                     <div class="col-md-6">
                       <form class="form1" action="">
                         <div class="col-md-6">
                           <p style="font-size: 11px;">RUTE/TRAYEK:</p>
                         </div>
                         <div class="col-md-6">
                           <table>
                             <tbody>
                               <tr>
                                 <td style="font-size: 11px;">JAM &nbsp;</td>
                                 <td> : </td>
                               </tr>
                               <tr>
                                 <td style="font-size: 11px;">PARAF &nbsp;</td>
                                 <td> : </td>
                               </tr>
                             </tbody>
                           </table>
                         </div>

                         <label></label>
                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Depo Bogor
                         </label>

                         <label>
                           <input type='checkbox'>
                           <span></span>
                           Halim Perdanakusuma
                         </label>

                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Mall Ciputra Cibubur/Cibubur Junction
                         </label>
                         <label></label>
                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Legenda Wisata/Kota Wisata/Cibubur Junction
                         </label>

                         <label>
                           <input type='checkbox'>
                           <span></span>
                           Soekarno Hatta
                         </label>

                         <label>
                          <input type='checkbox'>
                          <span></span>
                          Depo RA Kartini/South Quarter/Point Square
                         </label>
                         <label></label>
                         <label>
                          <input type='checkbox'>
                          <span></span>
                          BSD City
                         </label>

                         <label>Keterangan:</label>
                         <label class="text-center">Stempel</label><br>

                        </form><br><br><br>
                     </div>
                   </div>

                <div class="row">

                  <div class="col-md-12">

                    <div class="col-md-6">
                      <span>
                        <h5 class="text-center">
                          <b>Dibuat Oleh,</b><br><br><br><br><br><br>
                          <b>(Staff Operasi)</b><br><br><br>
                        </h5>
                      </span>
                    </div>

                    <div class="col-md-6">
                      <span>
                        <h5 class="text-center">
                          <b>Pengemudi</b><br><br><br><br><br><br>
                          <b><?php echo $postSimpanPenugasan->namaSupir.' ('.$postSimpanPenugasan->nik.') ' ?></b>
                        </h5>
                      </span>
                    </div>

                  </div>

                </div><br><br>

              </div>

              <div class="col-md-12">
                <div class="row">
                  <button type="button" ng-click="exportPdf()" class="btn btn-danger" name="button">
                    <i class="fa fa-file-pdf-o"></i> Cetak PDF
                  </button>
                </div>
              </div>

            </div>
        </div>
    </div>
</div>
