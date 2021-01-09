<?php
defined('BASEPATH') or exit('No direct script access allowed');

// require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();

    $this->user_model->cek_login();
    $this->load->model('laporan_model');

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

  // Halaman Dashboard
  public function index()
  {
    $data = array(
      'title'     => 'Halaman Administrator',
      'isi'       => 'admin/laporan/laporanTemplate',
      'dataUser'  => $this->session->dataUser,
      'dataPo'    => $this->session->dataPo
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }

  // START LAPORAN TRANSAKSI
  public function laporanTransaksi()
  {
    $dataUser = $this->session->dataUser;
    $dataPo = $this->session->dataPo;
    $this->laporan_model->dataListLoket($dataUser, $dataPo);

    $data = array(
      'title'     => 'Halaman Administrator',
      'isi'       => 'admin/laporan/laporanTransaksis/laporanTransaksiTemplate',
      'dataUser'  => $this->session->dataUser,
      'dataPo'    => $this->session->dataPo,
      'dataLoket' => $this->session->dataLoket
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END LAPORAN TRANSAKSI

  // START TAMPIL LAPORAN TRANSAKSI
  public function tampilLaporanTransaksi()
  {
    $tanggalAwal = $this->input->post('tanggalAwal');
    $tanggalAkhir = $this->input->post('tanggalAkhir');
    $pilihLoketBus = $this->input->post('pilihLoketBus');

    // Validasi input
    $valid = $this->form_validation;

    $valid->set_rules('tanggalAwal', 'Tanggal Awal', 'required', array('required' => '%s harus diisi'));
    $valid->set_rules('tanggalAkhir', 'Tanggal Akhir', 'required', array('required' => '%s harus diisi'));
    $valid->set_rules('pilihLoketBus', 'Pilih', 'required', array('required' => '%s Loket / Bus'));
    // $valid->set_rules('pilihLoket', 'Pilih', 'required', array('required' => '%s Loket'));
    // $valid->set_rules('pilihBus', 'Pilih', 'required', array('required' => '%s Bus'));

    if ($valid->run() === FALSE) {
      // End Validasi
      $data = array(
        'title' => 'Tampil',
        'isi'   => 'admin/laporan/laporanTransaksis/laporanTransaksiTemplate',
        'dataUser'  => $this->session->dataUser,
        'dataPo'    => $this->session->dataPo,
        'dataLoket' => $this->session->dataLoket
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk Service Endpoint
    } else {

      // $submit = $this->input->post('submit');

      // $pilihLoketBus = $this->input->post('pilihLoketBus');

      if ($pilihLoketBus == 'loket') {

        $valid->set_rules('pilihLoket', 'Pilih', 'required', array('required' => '%s Loket'));

        if ($valid->run() === FALSE) {
          // End Validasi
          $data = array(
            'title' => 'Tampil',
            'isi'   => 'admin/laporan/laporanTransaksis/laporanTransaksiTemplate',
            'dataUser'  => $this->session->dataUser,
            'dataPo'    => $this->session->dataPo,
            'dataLoket' => $this->session->dataLoket
          );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
    
          // Masuk Service Endpoint
        } else {
          $dataUser = $this->session->dataUser;
          $tanggalAwal = $this->input->post('tanggalAwal');
          $tanggalAkhir = $this->input->post('tanggalAkhir');
          $pilihLoket = $this->input->post('pilihLoket');
  
          $this->laporan_model->getLaporanTransaksiLoket($dataUser, $tanggalAwal, $tanggalAkhir, $pilihLoket);
  
          $data = array(
            'title'                   => 'Tampil',
            'isi'                     => 'admin/laporan/laporanTransaksis/tableLaporanTransaksiLoket',
            'dataUser'                => $this->session->dataUser,
            'dataPo'                  => $this->session->dataPo,
            'dataLoket'               => $this->session->dataLoket,
            'tanggalAwal'             => $tanggalAwal,
            'tanggalAkhir'            => $tanggalAkhir,
            'pilihLoketBus'           => $pilihLoketBus,
            'pilihLoket'              => $pilihLoket,
            'listTampilLapTransaksiLoket'  => $this->session->listTampilLapTransaksiLoket
          );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        }


      } else if ($pilihLoketBus == 'bus') {

        $valid->set_rules('pilihBus', 'Pilih', 'required', array('required' => '%s Bus'));

        if ($valid->run() === FALSE) {
          // End Validasi
          $data = array(
            'title' => 'Tampil',
            'isi'   => 'admin/laporan/laporanTransaksis/laporanTransaksiTemplate',
            'dataUser'  => $this->session->dataUser,
            'dataPo'    => $this->session->dataPo,
            'dataLoket' => $this->session->dataLoket
          );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
    
          // Masuk Service Endpoint
        } else {
          $dataUser = $this->session->dataUser;
          $dataPo = $this->session->dataPo;
          $tanggalAwal = $this->input->post('tanggalAwal');
          $tanggalAkhir = $this->input->post('tanggalAkhir');
          $pilihBus = $this->input->post('pilihBus');
  
          $this->laporan_model->getLaporanTransaksiBus($dataUser, $dataPo, $tanggalAwal, $tanggalAkhir, $pilihBus);
  
          $data = array(
            'title'                   => 'Tampil',
            'isi'                     => 'admin/laporan/laporanTransaksis/tableLaporanTransaksiBus',
            'dataUser'                => $this->session->dataUser,
            'dataPo'                  => $this->session->dataPo,
            'dataLoket'               => $this->session->dataLoket,
            'tanggalAwal'             => $tanggalAwal,
            'tanggalAkhir'            => $tanggalAkhir,
            'pilihLoketBus'           => $pilihLoketBus,
            'pilihBus'                => $pilihBus,
            'listTampilLapTransaksiBus' => $this->session->listTampilLapTransaksiBus
          );
          $this->load->view('admin/layout/wrapper', $data, FALSE);
        }
      }
    }
  }
  // END TAMPIL LAPORAN TRANSAKSI

  // // START DETAIL LAPORAN TRANSAKSI
  // public function detailTransaksi($key)
  // {
  //   $dataLaporanTransaksi = $this->session->dataLaporanTransaksi;
  //   $this->laporan_model->detailTransaksi($key, $dataLaporanTransaksi);

  //   $data = array(
  //     'title'             => 'Tampil',
  //     'isi'               => 'admin/laporan/laporanTransaksi/detailTransaksi',
  //     'dataUser'          => $this->session->dataUser,
  //     'detailTransaksi'   => $this->session->detailTransaksi
  //   );
  //   $this->load->view('admin/layout/wrapper', $data, FALSE);
  // }
  // // END DETAIL LAPORAN TRANSAKSI

  // START LAPORAN SETORAN
  public function laporanSetoran()
  {
    $data = array(
      'title'   => 'Halaman Administrator',
      'isi'     => 'admin/laporan/laporanSetorans/laporanSetoranTemplate',
      'dataUser' => $this->session->dataUser,
      'dataPo'    => $this->session->dataPo
    );

    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END LAPORAN SETORAN

  // START TAMPIL LAPORAN SETORAN
  public function tampilLaporanSetoran()
  {
    // Validasi input
    $valid = $this->form_validation;

    $valid->set_rules('tanggal', 'Tanggal', 'required', array('required' => '%s harus diisi'));

    if ($valid->run() === FALSE) {
      // End Validasi
      $data = array(
        'title'     => 'Tampil',
        'isi'       => 'admin/laporan/laporanSetorans/laporanSetoranTemplate',
        'dataUser'  => $this->session->dataUser,
        'dataPo'    => $this->session->dataPo
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);

      // Masuk Service Endpoint
    } else {
      $dataUser = $this->session->dataUser;

      $tanggal = $this->input->post('tanggal');

      $this->laporan_model->getLaporanSetoran($dataUser, $tanggal);

      $data = array(
        'title'                 => 'Tampil',
        'isi'                   => 'admin/laporan/laporanSetorans/tableLaporanSetoran',
        'dataUser'              => $this->session->dataUser,
        'dataPo'                => $this->session->dataPo,
        'listTampilLapSetoran'  => $this->session->listTampilLapSetoran,
        'tanggal'               => $tanggal
      );
      $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
  }
  // END TAMPIL LAPORAN SETORAN

  // START DETAIL LAPORAN SETORAN
  public function detailLaporanSetoran($idSap)
  {
    // $dataLaporanSetoran = $this->session->dataLaporanSetoran;
    $dataUser = $this->session->dataUser;
    $this->laporan_model->detailSetoran($dataUser, $idSap);

    $data = array(
      'title'                 => 'Tampil',
      'isi'                   => 'admin/laporan/laporanSetorans/rincianLaporanSetoran',
      'dataUser'              => $this->session->dataUser,
      'dataPo'                => $this->session->dataPo,
      'rincianLapSetoran'     => $this->session->rincianLapSetoran

    );
    $this->load->view('admin/layout/wrapper', $data, FALSE);
  }
  // END DETAIL LAPORAN SETORAN

  // START EXPORT EXCEL
  public function cetakExcel()
  {
    $data = array(
      'dataUser'            => $this->session->dataUser,
      'dataLaporanSetoran'  => $this->session->dataLaporanSetoran,
      'detailSetoran'         => $this->session->detailSetoran,
      'dataOscar'             => $this->session->dataOscar
    );
    var_dump($data);
    $this->load->view('admin/laporan/laporanSetoran/reportExcelLaporanSetoran', $data, FALSE);

    // $dataLaporanSetoran = $this->session->dataLaporanSetoran;
    //
    // $spreadsheet = new Spreadsheet();
    // // $sheet = $spreadsheet->getActiveSheet();
    // $spreadsheet->setActiveSheetIndex(0)
    //                   ->setCellValue('A1', 'Tgl Transaksi')
    //                   ->mergeCells('A1:A2')
    //                   ->setCellValue('B1', 'Tgl Setor')
    //                   ->mergeCells('B1:B2')
    //                   ->setCellValue('C1', 'Produk (Bus)')
    //                   ->mergeCells('C1:C2')
    //                   ->setCellValue('D1', 'Unit Price')
    //                   ->mergeCells('D1:D2')
    //                   ->setCellValue('E1', 'Trayek')
    //                   ->mergeCells('E1:E2')
    //                   ->setCellValue('F1', 'Tunai')
    //                   ->mergeCells('F1:G1')
    //                   ->setCellValue('F2', 'Pnp')
    //                   ->setCellValue('G2', 'Rp')
    //                   ->setCellValue('H1', 'Non Tunai')
    //                   ->mergeCells('H1:I1')
    //                   ->setCellValue('H2', 'Pnp')
    //                   ->setCellValue('I2', 'Rp');
    //
    //       $kolom = 3;
    //       // $nomor = 1;
    //       foreach($dataLaporanSetoran->data as $datas) {
    //         foreach ($datas->detail as $dataDetail) {
    //           foreach ($dataDetail->detail2 as $dataDetail2) {
    //             $spreadsheet->setActiveSheetIndex(0)
    //                         ->setCellValue('A' . $kolom, date('j F Y', strtotime($datas->tglTransaksi)))
    //                         ->setCellValue('B' . $kolom, date('j F Y', strtotime($dataDetail->waktuSetor)))
    //                         ->setCellValue('C' . $kolom, $dataDetail->kodeBus)
    //                         ->setCellValue('D' . $kolom, $dataDetail2->unitPrice)
    //                         ->setCellValue('E' . $kolom, $dataDetail2->namaTrayek)
    //                         ->setCellValue('F' . $kolom, $dataDetail2->jmlPnpTunai)
    //                         ->setCellValue('G' . $kolom, $dataDetail2->jmlBayarTunai)
    //                         ->setCellValue('H' . $kolom, $dataDetail2->jmlPnpNonTunai)
    //                         ->setCellValue('I' . $kolom, $dataDetail2->jmlBayarNonTunai);
    //
    //             $kolom++;
    //             // $nomor++;
    //           }
    //         }
    //       }
    //
    // $writer = new Xlsx($spreadsheet);
    // $filename = 'hello world.xlsx';
    // $writer->save($filename);
    //
    // // Set the content-type:
    // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    // header('Content-Length: ' . filesize($filename));
    // readfile($filename); // send file
    // unlink($filename); // delete file
    // exit;
  }
  // END EXPORT EXCEL

  // START DETAIL EXCEL
  public function cetakDetailExcel()
  {
    $data = array(
      'dataUser'              => $this->session->dataUser,
      'dataLaporanSetoran'    => $this->session->dataLaporanSetoran,
      'detailSetoran'         => $this->session->detailSetoran,
      'dataOscar'             => $this->session->dataOscar
    );
    $this->load->view('admin/laporan/laporanSetoran/reportExcelDetailLaporanSetoran', $data, FALSE);
  }
  // END DETAIL EXCEL

  // // Start membuat design Tabel Excel
  // $z=1;
  // $excelData='';
  //
  // $excelData='<tr><td colspan="10" style="text-align:center; vertical-align: middle;" valign="middle">'+ $dataUser->namaperusahaan +'</td></tr>';
  // $excelData+='\n';
  //
  // $excelData+='<tr><td colspan="10" style="text-align:center; vertical-align: middle;" valign="middle">'+ $dataUser->alamat +'</td></tr>';
  // $excelData+='\n';
  //
  // $excelData+='<tr><th rowspan="2">No</th><th rowspan="2">Tgl Transaksi</th><th rowspan="2">Tgl Setor</th><th rowspan="2">Produk(Bus)</th><th rowspan="2">Unit Price</th><th rowspan="2">Loket</th><th colspan="2">Tunai</th><th colspan="2">Non Tunai</th></tr>\n';
  // $excelData+='<tr><th>pnp</th><th>rp</th><th>pnp</th><th>rp</th></tr>\n';
  // // data.data.forEach(function(x){
  // //   x.detail.forEach(function(v){
  // //     v.detail2.forEach(function(w){
  // //       $excelData+='<tr><td style="text-align:center; vertical-align: middle;" valign="middle" >'+z+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">'+x.tglTransaksi+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=v.waktuSetor+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=v.kodeBus+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=w.unitPrice+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=w.namaLoket+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=w.jmlPnpTunai+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=w.jmlBayarTunai+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=w.jmlPnpNonTunai+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+=w.jmlBayarNonTunai+'</td><td style="text-align:center; vertical-align: middle;" valign="middle">';
  // //       $excelData+='\n';
  // //       $z++;
  // //     });
  // //   });
  // // });
  // // console.log($scope.excelData);
  //
  // // $exportXls = function() {
  //   $exportPage = true;
  //   $excelFile='<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http:\/\/www.w3.org\/TR\/REC-html40">';
  //   $excelFile+='<head><meta http-equiv=Content-Type content="text/html; charset=windows-1252"><meta name=ProgId content=Excel.Sheet><meta name=Generator content="Microsoft Excel 11">';
  //   $excelFile+='<!--[ifgte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/>';
  //   $excelFile+='</x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table  x:str border=0 >';
  //   $excelFile+=$excelData;
  //   $excelFile+='</table></body></html>';
  //
  //   $blob = new Blob(array($excelFile));
  //   saveAs($blob, "Report Setoran.xls");
  //   $exportPage = false;
  // // }
  // // End Excel


}
