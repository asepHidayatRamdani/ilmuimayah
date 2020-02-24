<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Video extends CI_Model
{
    private $_table = "video";

    public $idVideo;
    public $fileVideo;
    public $tanggalVideo;



    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idVideo" => $id])->row();
    }

    public function maxid()
    {

        $this->db->select_max('idVideo');
        $query = $this->db->get('video')->row();
        return $query->idVideo;
    }




    public function save()
    {

        $post = $this->input->post();
        $this->idVideo = $post["idVideo"];
        $this->fileVideo = $post["fileVideo"];
        $this->tanggalVideo = $post["tanggalVideo"];
        return $this->db->insert($this->_table, $this);
    }



    public function update()
    {
        $post = $this->input->post();
        $this->idVideo = $post["idVideo"];
        $this->fileVideo = $post["fileVideo"];
        $this->tanggalVideo = $post["tanggalVideo"];



        return $this->db->update($this->_table, $this, array('idVideo' => $post['idVideo']));
    }




    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idVideo" => $id));
    }

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product->image != "default.jpg") {
            $filename = explode(".", $product->image)[0];
            return array_map('unlink', glob(FCPATH . "upload/product/$filename.*"));
        }
    }
}
