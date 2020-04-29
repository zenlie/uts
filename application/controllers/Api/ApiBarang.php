<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

Class ApiBarang extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->helper('authentication');
        $this->load->Model('Model_barang');
    }

     public function index()
     {
        $data = $this->Model_barang->show_barang()->result();
        if ($this->input->get('id_barang') != '') {
        	$id_barang = $this->input->get('id_barang');
	        $data = $this->Model_barang->show_one_barang($id_barang)->result();
        }
        echo json_encode($data);
     }

     public function create()
     {
        $data = $this->Model_barang->add();
        if ($data == 1) {
        	http_response_code(201);
        }
        echo json_encode($data);
     }

     public function update()
     {
        $data = $this->Model_barang->update();
        if ($data == 1) {
        	http_response_code(200);
        }
        echo json_encode($data);
     }

     public function delete()
     {
        $data = $this->Model_barang->delete();
        if ($data == 1) {
        	http_response_code(202);
        }
        echo json_encode($data);
     }
}

?>