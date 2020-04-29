<?php
Class Model_User extends CI_Model{

    public function check_secret_key($secret_key)
    {
        $data=$this->db->get_where('tbl_user',array('sk_user'=>$secret_key));
        return $data;
    }

    public function show_user()
    {
        $data=$this->db->get('tbl_user');
        return $data;
    }

    public function show_one_barang($id)
    {
        $data=$this->db->get_where('tbl_barang',array('id_barang'=>$id));
        return $data;
    }

    public function add()
    {
        $data=[
            'id_barang' => $this->input->post('id_barang'),
            'nm_barang'        => $this->input->post('nm_barang'),
            'stok_barang'  => $this->input->post('stok_barang'),
            'harga_barang'  => $this->input->post('harga_barang'),
         ];
         return $this->db->insert('tbl_barang',$data);
    }
    public function edit($id)
    {
        $data=$this->db->get_where('barang',array('kd_barang'=>$id));
        return $data;
    }

    public function update()
    {
        $data=[
            'nama_barang' => $this->input->post('nama_barang'),
            'stok'        => $this->input->post('stok'),
            'harga_beli'  => $this->input->post('harga_beli'),
            'harga_jual'  => $this->input->post('harga_jual'),
            'diskon'      => $this->input->post('diskon'),
            'keterangan'  => $this->input->post('keterangan')
         ];
         $kd_barang=$this->input->post('kd_barang');
         $this->db->where('kd_barang',$kd_barang);
         $this->db->update('barang',$data);

    }

}
?>