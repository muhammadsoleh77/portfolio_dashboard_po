<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use GuzzleHttp\Client;

class Endpoint extends CI_Controller {

  function __construct() {
    parent::__construct();

    // $this->load->library('GuzzleHttp');

    $this->base_url = "http://bumelapi.otobus.co.id:8484";

  }

}
