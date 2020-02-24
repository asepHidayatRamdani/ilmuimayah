<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_biografi extends CI_Model
{
    private $_table = "biografi";

    public $idBiografi;
    public $isiBiografi;



    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idBiografi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idBiografi = $post["idBiografi"];
        $this->isiBiografi = $post["isiBiografi"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idBiografi = $post["idBiografi"];
        $this->isiBiografi = $post["isiBiografi"];
        return $this->db->update($this->_table, $this, array('idBiografi' => $post['idBiografi']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idBiografi" => $id));
    }
}
