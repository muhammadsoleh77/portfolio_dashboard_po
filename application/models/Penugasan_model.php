<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penugasan_model extends CI_Model {

  // Load Model
  public function __construct()
  {
    parent::__construct();

    // $this->base_url = "http://bumelapi.otobus.co.id:8484";
  }

  // START GET PENUGASAN DEFAULT
  public function default($dataUser, $dataPo)
  {
    $postData = array(
      "idPo" => $dataPo->id,
      "orderBy" => "id",
      "pageNo"  => 0,
      "pageRow" => 10
    );
    $postDatas = json_encode($postData);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/default/list");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($postDatas),
      'Authorization: Bearer '.$dataUser->token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $listDataDefault =  json_decode($output);
    // var_dump($listDataDefault);

    if($httpcode == 200) {
      $count = $listDataDefault->totalElement;
      $this->session->set_userdata('count', $count);
    } else {
      ?>
        <script type="text/javascript">
          // $(document).ready(function() {
          //   var alert = <?php echo $listDataDefault->error ?>
          //   swal({
          //     icon: 'error',
          //     title: 'Oops...',
          //     text: alert
          //   })
          // })
          alert('<?php echo $listDataDefault->message ?>')
        </script>
      <?php
    }

    // $listDataDefault =  json_decode($output);
    // var_dump($listDataDefault);
    // $count = $listDataDefault->totalElement;
    // $this->session->set_userdata('count', $count);
    // echo $output2;
    // var_dump(json_encode($listDataDefault->totalElement));

    curl_close($ch);
  }
  // END GET PENUGASAN DEFAULT

  // START PAGING PENUGASAN DEFAULT
  public function pageDefault($dataUser, $dataPo, $limit, $start)
  {
    $postData = array(
      "idPo" => $dataPo->id,
      "orderBy" => "id",
      "pageNo"  => $start,
      "pageRow" => $limit
    );
    $postDatas = json_encode($postData);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/default/list");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($postDatas),
      'Authorization: Bearer '.$dataUser->token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $listPagingDefault =  json_decode($output);
    $this->session->set_userdata('listPagingDefault', $listPagingDefault);
    // echo $output2;
    // var_dump(json_encode($listPagingDefault));

    curl_close($ch);
  }
  // END PAGING PENUGASAN DEFAULT

  // START GET DATA TRAYEK
  public function getTrayek($dataUser, $dataPo)
  {
    // var_dump($dataUser);
    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/default/trayek/".$dataPo->id);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Authorization: Bearer '.$dataUser->token
		));
		// curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);

    	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$dataTrayekDefault = json_decode($output);
    $this->session->set_userdata('dataTrayekDefault', $dataTrayekDefault);
  }
  // END GET DATA TRAYEK

  // START GET DATA USER
  public function getDataUser($dataUser, $dataPo)
  {
    $ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/default/user/".$dataPo->id);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
		'Authorization: Bearer '.$dataUser->token
		));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		$dataListUser = json_decode($output);
    $this->session->set_userdata('dataListUser', $dataListUser);
  }
  // END GET DATA USER

  // START EDIT PENUGASAN DEFAULT
  public function editDefault($dataUser, $dataPo, $id, $aktif)
  {
    
  }
  // END EDIT PENUGASAN DEFAULT

  // START TAMPIL DATA PENUGASAN HARIAN
  public function tampilHarian($dataUser, $dataPo, $tanggal)
  {
    $postData = array(
      "idPo"    => $dataPo->id,
      "orderBy" => "id",
      "pageNo"  => 0,
      "pageRow" => 100,
      "tanggal" => $tanggal
    );
    $postDatas = json_encode($postData);

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $this->config->item('endpoint')."/bumel/penugasan/list");
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
      'Content-Length: ' . strlen($postDatas),
      'Authorization: Bearer '.$dataUser->token
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postDatas);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $output = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    $listHarian =  json_decode($output);
    // var_dump($listHarian);
    $this->session->set_userdata('listHarian', $listHarian);
    // echo $output2;
    // var_dump(json_encode($listDataDefault));

    curl_close($ch);
  }
  // END TAMPIL DATA PENUGASAN HARIAN

  // // START TAMPIL DATA DRIVER
  // public function getDataDriver($dataUser, $dataPo)
  // {

  // }
  // // END TAMPIL DATA DRIVER

}
