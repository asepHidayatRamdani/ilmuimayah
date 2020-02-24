<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Informasi extends CI_Model
{
    private $_table = "informasi";

    public $idInformasi;
    public $namaInformasi;
    public $tgldibuat;
    public $tglBerakhir;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idInformasi" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idInformasi = $post["idInformasi"];
        $this->namaInformasi = $post["namaInformasi"];
        $this->tgldibuat = $post["tgldibuat"];
        $this->tglBerakhir = $post["tglBerakhir"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idInformasi = $post["idInformasi"];
        $this->namaInformasi = $post["namaInformasi"];
        $this->tgldibuat = $post["tgldibuat"];
        $this->tglBerakhir = $post["tglBerakhir"];
        return $this->db->update($this->_table, $this, array('idInformasi' => $post['idInformasi']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idInformasi" => $id));
    }
}