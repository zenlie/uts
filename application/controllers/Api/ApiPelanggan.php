<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

Class ApiPelanggan extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->Model('Model_pelanggan');
    }

     public function index()
     {
        $data = $this->Model_pelanggan->show_pelanggan()->result();
        if ($this->input->get('id_pelanggan') != '') {
        	$id_pelanggan = $this->input->get('id_pelanggan');
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