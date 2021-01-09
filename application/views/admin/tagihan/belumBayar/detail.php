<!-- <script src = "https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script> -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.20/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.20/vfs_fonts.js'></script>
<!-- <style media="screen">
  .main-menu {
    text-align:center;
    padding:10px;
  }
  .menu {
    font-size:16px;
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
  .disabled {
    border: 2px solid #ddd;
    background-color: #ddd;
    cursor: pointer;
  }
</style> -->

<!-- <style media="screen">
  .modal-dialog {
    width: 90vw!important;
    min-width: 90vw!important;
    max-width: 90vw!important;
  }
  .show-data:hover {
    background-color: #20c7b6;
    cursor: pointer;
    color: #fff!important;
  }
  .scrollable {
    height: 80vh!important;
    overflow-y: scroll!important;
  }
  .align-center {
    text-align: center;
  }
  .modal-table {
    padding-bottom:0px;
    padding-top:0px;
  }
  ::-webkit-scrollbar {
    width: 0px!important;
  }
  .show-data>span:hover {
    color: #fff!important;
  }
  .show-data>span {
    display: block;
  }
  .btn[disabled] {
    background-color: #b2b4b1!important;
    border: none!important;
  }
</style> -->

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard') ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/tagihan') ?>">Tagihan</a></li>
    <li class="active">Detail Tagihan</li>
</ul>
<!-- END BREADCRUMB -->

<!-- <div class="widgets"> -->
  <!-- <div class="row"> -->
    <div class="col-md-12">
      <div class="panel panel-default bootstrap-panel">
        <div>
          <div class="panel-body">
            <br><h3>
              <a class="btn btn-danger pull-right" href="<?php echo base_url('admin/tagihan/belumBayar') ?>"><i class="fa fa-arrow-left"> Kembali</i></a>
            </h3><br><br>

            <!-- <div class="col-md-12">
            <button class="btn btn-warning pull-right" ng-click="add()"><i class="glyphicon glyphicon-plus"></i>
            Tambah</button>
          </div> -->
          <div class="row">
            <div class="col-md-12">
              <div class="form-horizontal" id="pdfTagihan">
                <!-- <div class="text-center">
                <h5 style="color:red" ng-show="errorNext">{{ errorNext }}</h5>
              </div> -->

              <div class="text-center">
                <h3><u>INVOICE : <?php echo $dataDetail->noinvoice ?></u></h3><br>
              </div>

              <div class="col-md-12">
                <div class="col-md-6">
                  <p>Customer</p>
                  <table>
                    <tbody>
                      <tr>
                        <td>Name &nbsp;</td>
                        <td> : </td>
                        <td>&nbsp; <?php echo $dataDetail->namapo ?></td>
                        <!-- <td>&nbsp;{{pengemudi.Nama + ' (' + pengemudi.NIK + ')'}}</td> -->
                      </tr>
                      <tr>
                        <td>Address &nbsp;</td>
                        <td> : </td>
                        <td>&nbsp; <?php echo $dataDetail->alamatpo ?></td>
                      </tr>
                      <!-- <tr>
                      <td>Phone &nbsp;</td>
                      <td> : </td>
                      <td>&nbsp;</td>
                    </tr> -->
                    <!-- <tr>
                    <td>Attn. &nbsp;</td>
                    <td> : </td>
                    <td>&nbsp;</td>
                  </tr> -->
                </tbody>
              </table><br><br>
            </div>
            <div class="col-md-6">
              <p>Misc.</p>
              <table>
                <tbody>
                  <tr>
                    <td>Date &nbsp;</td>
                    <td> : </td>
                    <td>&nbsp; <?php echo date('j F Y', strtotime($dataDetail->tglpembuatan))  ?></td>
                    <!-- <td>&nbsp;{{pengemudi.Nama + ' (' + pengemudi.NIK + ')'}}</td> -->
                  </tr>
                  <tr>
                    <td>Period &nbsp;</td>
                    <td> : </td>
                    <td>&nbsp; <?php echo date('j F Y', strtotime($dataDetail->tglawal))  ?> - <?php echo date('j F Y', strtotime($dataDetail->tglakhir))  ?></td>
                    <!-- <td>&nbsp;{{pengemudi.Nama + ' (' + pengemudi.NIK + ')'}}</td> -->
                  </tr>
                  <tr>
                    <td>Contract No. &nbsp;</td>
                    <td> : </td>
                    <td>&nbsp; 001/ABI-LRN/PKS/XI/2019</td>
                  </tr>
                  <tr>
                    <td>Contract Date &nbsp;</td>
                    <td> : </td>
                    <td>&nbsp; 01 November 2019</td>
                  </tr>
                  <!-- <tr>
                  <td>Name &nbsp;</td>
                  <td> : </td>
                  <td>&nbsp; {{data.namapt}}</td>
                </tr> -->
                <!-- <tr>
                <td>Address &nbsp;</td>
                <td> : </td>
                <td>&nbsp; {{data.alamatpt}}</td>
              </tr> -->
            </tbody>
          </table><br><br>
        </div>
      </div>

      <div class="col-md-12 table-responsive" style="border:none;">
        <table class="table table-bordered table-striped">
          <col width="5%">
          <col width="10%">
          <col width="10%">
          <!-- <col width="2%"> -->
          <col width="10%">

          <thead>
            <tr class="th-bg">
              <th class="text-center"><b>BUS CODE</b></th>
              <th class="text-center"><b>ROUTE</b></th>
              <th class="text-center"><b>TRANSACTION</b></th>
              <!-- <th class="text-center"><b>MDR</b></th> -->
              <th class="text-center"><b>MDR (2%)</b></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($dataDetail->data as $key => $value) { ?>
              <tr>
                <td class="text-center"><?php echo $value->kodeBus ?></td>
                <td><?php echo $value->namaTrayek ?></td>
                <td class="text-right"><?php echo number_format($value->totalTunai) ?></td>
                <td class="text-right"><?php echo number_format($value->mdrTunai) ?></td>
              </tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <tr>
              <td class="text-center"><b>TOTAL</b></td>
              <td class="text-center"></td>
              <!-- <td class="text-right">{{ getTotalTransaksi() | rupiah }}</td> -->
              <td class="text-right"><?php echo number_format($dataDetail->totaltransaksi) ?></td>
              <td class="text-right"><?php echo number_format($dataDetail->totaltagihan) ?></td>
            </tr>
            <!-- <tr>
            <td colspan="6" class="text-center">
            <div st-pagination="" st-items-by-page="perPage" st-displayed-pages="pageSize"></div>
          </td>
        </tr> -->
      </tfoot>
    </table><br>
  </div>

  <table>
    <col width="5%">
    <col width="10%">
    <col width="10%">
    <!-- <col width="2%"> -->
    <col width="10%">
    <tr ng-model="data">
      <td>In words</td>
      <td><b><?php echo $dataDetail->keterangan ?></b></td>
      <td class="text-right"><b>Sub Total</b></td>
      <td class="text-right"><?php echo number_format($dataDetail->totaltagihan) ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td class="text-right"><b>PPN 10%</b></td>
      <td class="text-right"><?php echo '---' ?></td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td class="text-right"><b>PPH 23</b></td>
      <td class="text-right"><?php echo '---' ?></td>
    </tr>
    <tr ng-model="data">
      <td></td>
      <td></td>
      <td class="text-right"><b>TOTAL</b></td>
      <td class="text-right"><?php echo number_format($dataDetail->totaltagihan) ?></td>
    </tr>
  </table><br>

  <table>
    <col width="5%">
    <col width="15%">
    <col width="10%">
    <!-- <col width="2%"> -->
    <col width="10%">
    <tr>
      <td>Please remit to</td>
      <td><b><?php echo $dataDetail->rekbank1 ?></b></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>A/C Number : <b><?php echo $dataDetail->rekno1 ?></b></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td></td>
      <td>A/C Name : <b><?php echo $dataDetail->reknama1 ?></b></td>
      <td></td>
      <td></td>
    </tr>
  </table><br><br><br>

  <div class="col-md-12">
    <div class="col-md-6 pull-left">
      <!-- <a href="<?php echo base_url('admin/tagihan/cetakPdf') ?>" class="btn btn-primary">
        <i class="fa fa-file-pdf-o"> Cetak PDF</i>
      </a> -->
      <button type="button" class="btn btn-primary" onclick="myFunction()">
        <i class="fa fa-file-pdf-o"> Cetak PDF</i>
      </button>
    </div>
    <div class="col-md-6" ng-model="data">
      <h5 class="text-center"><?php echo $dataDetail->picpt ?></h5>
      <p class="text-center">( <i><?php echo $dataDetail->picposisipt ?></i> )</p>
    </div>
  </div>

  <!-- <div>
  <div class="col-lg-12 text-center">
  <button class="btn btn-primary" ng-disabled="clicked" ng-click="submit()">
  Proses
</button><br><br>
</div>
</div> -->
</div>
<!-- <hr> -->
</div>
</div>

</div>
</div>
</div>
</div>
  <!-- </div> -->
<!-- </div> -->

<script>
  function myFunction() {
    var data = <?php echo json_encode($dataDetail); ?>;
    var dataTable = data.data;

    const months = ["Januari", "Februari", "Maret","April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    // tgl pembuatan
    var tglpembuatan = new Date(data.tglpembuatan);
    var formatted_tglpembuatan = tglpembuatan.getDate() + " " + months[tglpembuatan.getMonth()] + " " + tglpembuatan.getFullYear();
    // end

    // tgl awal
    var tglawal = new Date(data.tglawal);
    var formatted_tglawal = tglawal.getDate() + " " + months[tglawal.getMonth()] + " " + tglawal.getFullYear();
    // end

    // tgl akhir
    var tglakhir = new Date(data.tglakhir);
    var formatted_tglakhir = tglakhir.getDate() + " " + months[tglakhir.getMonth()] + " " + tglakhir.getFullYear();
    // end

    // var exportPdf = function(data, dataTable){

      var docDefinition = {
        pageMargins: [ 40, 60, 40, 90 ],
        defaultStyle : {
          fontSize : 9
        },
        content : [
          {
            widths: ['*','*','*','*',],
            fontSize: 16,
            marginBottom : 30,
            bold: true,
            alignment: 'center',
            text: 'INVOICE : '+ data.noinvoice, style: 'header'
          },
          {
            alignment: 'justify',
            marginBottom : 5,
            bold: true,
            columns: [
              {
                text: 'Customer'
              },
              {
                text: 'Misc.'
              }
            ]
          },
          {
            alignment: 'justify',
            marginBottom : 5,
            columns: [
              {
                bold : true,
                text :  'Name ' + '\n' +
                        'Address ' + '\n'
              },
              {
                marginLeft : -50,
                text :  ': ' + data.namapo + '\n' +
                        ': ' + data.alamatpo + '\n'
              },
              {
                bold : true,
                text :  'Date ' + '\n' +
                        'Period ' + '\n' +
                        'Contract No. ' + '\n' +
                        'Contract Date ' + '\n'
              },
              {
                marginLeft : -50,
                text :  ': ' + (data.tglpembuatan, formatted_tglpembuatan) + '\n' +
                        ': ' + (data.tglawal, formatted_tglawal) + ' - ' + (data.tglakhir, formatted_tglakhir) + '\n' +
                        ': ' + '001/ABI-LRN/PKS/XI/2019' + '\n' +
                        ': ' + '01 November 2019' + '\n\n'
              },
            ]
          },
        ]
      };
      var table = {
        color: '#444',
        margin: [0, 5, 0, 20],
        layout: 'lightHorizontalLines',
        table: {
          widths: [80,200,'*','*'],
          headerRows: 2,
          fontSize : 8,
          body: [
            [
              {text: 'BUS CODE', style: 'tableHeader', alignment: 'center', fontSize: 10, bold : true, fillColor: '#0074c1', fontColor: 'black', rowSpan: 2},
              {text: 'ROUTE', style: 'tableHeader', alignment: 'center', fontSize: 10, bold : true, fillColor: '#0074c1', fontColor: 'black', rowSpan: 2},
              {text: 'TRANSACTION', style: 'tableHeader', alignment: 'center', fontSize: 10, bold : true, fillColor: '#0074c1', fontColor: 'black', rowSpan: 2},
              {text: 'MDR (2%)', style: 'tableHeader', alignment: 'center', fontSize: 10, bold : true, fillColor: '#0074c1', fontColor: 'black', rowSpan: 2},
            ],
            [
              {},
              {},
              {},
              {}
            ]
          ]
        },
      };

      dataTable.forEach(function (doc) {
        table.table.body.push(
          [
            // doc.namaTrayek,
            { text : doc.kodeBus},
            { text : doc.namaTrayek},
            { text : doc.totalTunai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"), alignment: 'right'},
            { text : doc.mdrTunai.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"), alignment: 'right'},
          ]
        );
      });

      table.table.body.push(
        [
          { text : 'Total', alignment : 'center', bold : true, fillColor: '#d2d2d2', fontColor: 'black' },
          { text : '', alignment : 'right', bold : true, fillColor: '#d2d2d2', fontColor: 'black' },
          { text : data.totaltransaksi.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"), alignment : 'right', bold : true, fillColor: '#d2d2d2', fontColor: 'black' },
          { text : data.totaltagihan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"), alignment : 'right', bold : true, fillColor: '#d2d2d2', fontColor: 'black' },
        ]
      );

      docDefinition.content.push(table);

      docDefinition.content.push({
        columns : [
          {
            text : 'In words : ',
          },
          {
            bold : true,
            marginLeft : -60,
            text : data.keterangan,
          },
          {
            bold : true,
            alignment : 'right',
            text :  'Sub Total : ' + '\n' +
                    'PPN 10% : ' + '\n' +
                    'PPH 23 : ' + '\n' +
                    'TOTAL : '
          },
          {
            alignment : 'right',
            text :  'Rp ' + data.totaltagihan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '\n' +
                    '---' + '\n' +
                    '---' + '\n' +
                    'Rp ' + data.totaltagihan.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")
          },
        ]
      });

      docDefinition.content.push({
        alignment: 'justify',
        marginTop: 20,
        columns : [
          {
            text : 'Please remit to ' + '\n' +
                   '' + '\n' +
                   '' + '\n'
          },
          {
            marginLeft : -100,
            bold : true,
            text :  data.rekbank1 + '\n' +
                    'A/C Number ' + '\n' +
                    'A/C Name ' + '\n'
          },
          {
            marginLeft : -210,
            bold : true,
            text :  '' + '\n' +
                    ': ' + data.rekno1 + '\n' +
                    ': ' + data.reknama1 + '\n'
          },
        ]
      });

      docDefinition.content.push(
        {
        columns : [
          {
            width : 280,
            text : ''
          },
          {
            alignment : 'center',
            width : '*',
            marginTop : 20,
            bold : true,
            text : data.picpt + '\n\n'
          },
        ]
      },
      {
        marginTop : -10,
        marginLeft : 280,
        italics : true,
        alignment: 'center',
        text: '( ' + data.picposisipt + ' )', style: 'header'
      }
    );

      pdfMake.createPdf(docDefinition).download('reportTagihan ' + data.tglawal + ' s.d ' + data.tglakhir + '.pdf');
      // pdfMake.createPdf(docDefinition).open();

      // const doc = pdfMake.createPdf(docDefinition);
      // doc.getBase64((data) => { window.location.href = 'data:application/pdf;base64,' + data; });
    // };

    // return {
    //   exportPdf : exportPdf
    // };
  };
</script>
