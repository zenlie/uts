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

         http_response_code(500);
         $arrResult = array(
            'result' => false,
            'code' => 500,
            'message' => 'Internal Server Error'
         );

         if ($data == 1) {
            http_response_code(201);
            $arrResult = array(
               'result' => true,
               'code' => 201,
               'message' => 'Data Was Created'
            );         
   
         }
         echo json_encode($arrResult);
     }

      public function update()
      {
         $data = $this->Model_barang->update();
         http_response_code(500);
         $arrResult = array(
            'result' => false,
            'code' => 500,
            'message' => 'Internal Server Error'
         );
         if ($data == 1) {
            http_response_code(200);
            $arrResult = array(
               'result' => true,
               'code' => 200,
               'message' => 'Data Was Updated'
            );
         }
         echo json_encode($data);
      }

     public function delete()
     {
         http_response_code(500);
         $arrResult = array(
            'result' => false,
            'code' => 500,
            'message' => 'Internal Server Error'
         );
         $data = $this->Model_barang->delete();
         if ($data == 1) {
            http_response_code(202);
            $arrResult = array(
               'result' => true,
               'code' => 202,
               'message' => 'Data Was Deleted'
            );

         }
         echo json_encode($data);
     }
}

?>