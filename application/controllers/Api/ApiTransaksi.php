<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

Class ApiTransaksi extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_transaksi');
    }

     public function index()
     {
        $data = $this->Model_transaksi->show_transaksi()->result();
        if ($this->input->get('id_transaksi') != '') {
        	$id_transaksi = $this->input->get('id_transaksi');
        }
        echo json_encode($data);
     }

     public function create()
     {
        $data = $this->Model_pelanggan->add();
        if ($data == 1) {
        	http_response_code(201);
        }
        echo json_encode($data);
     }

     public function update()
     {
        $data = $this->Model_pelanggan->update();
        if ($data == 1) {
        	http_response_code(200);
        }
        echo json_encode($data);
     }

     public function delete()
     {
        $data = $this->Model_pelanggan->delete();
        if ($data == 1) {
        	http_response_code(202);
        }
        echo json_encode($data);
     }
}

?>