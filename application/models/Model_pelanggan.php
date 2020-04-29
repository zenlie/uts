<?php
Class Model_pelanggan extends CI_Model{

    public function show_pelanggan()
    {
        $data=$this->db->get('tbl_pelanggan');
        return $data;
    }

    public function add()
    {
        $data=[

            'nm_pelanggan' => $this->input->post('nm_pelanggan'),
            'notelp_pelanggan'        => $this->input->post('notelp_pelanggan'),
            'alamat_pelanggan'         => $this->input->post('alamat_pelanggan'),

         ];
         $this->db->insert('tbl_pelanggan',$data);
    }
    public function edit($id)
    {
        $data=$this->db->get_where('tbl_pelanggan',array('id_pelanggan'=>$id));
        return $data;
    }

    public function update()
    {
        $data=[

            'nm_pelanggan' => $this->input->post('nm_pelanggan'),
            'notelp_pelanggan'        => $this->input->post('notelp_pelanggan'),
            'alamat_pelanggan'         => $this->input->post('alamat_pelanggan'),

         ];
         $kode_pelanggan=$this->input->post('id_pelanggan');
         $this->db->where('id_pelanggan',$id_pelanggan);
         $this->db->update('tbl_pelanggan',$data);

    }

}
?>