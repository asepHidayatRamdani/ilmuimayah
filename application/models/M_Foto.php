<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Foto extends CI_Model
{
    private $_table = "foto";

    public $idFoto;
    public $fileFoto;
    public $tanggalFoto;



    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idFoto" => $id])->row();
    }

    public function maxid()
    {

        $this->db->select_max('idFoto');
        $query = $this->db->get('foto')->row();
        return $query->idFoto;
    }




    public function save()
    {

        $post = $this->input->post();
        $this->idFoto = $post["idFoto"];
        $this->fileFoto = $this->_uploadImage();
        $this->tanggalFoto = $post["tanggalFoto"];
        return $this->db->insert($this->_table, $this);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'jpg|png|JPEG|pdf';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fileFoto')) {
            return $this->upload->data("file_name");
        }
    }


    public function update()
    {
        $post = $this->input->post();
        $this->idFoto = $post["idFoto"];
        if (!empty($_FILES["fileFoto"]["name"])) {
            $this->fileFoto = $this->_uploadImage();
        } else {
            $this->fileFoto = $post["old_file"];
        }

        $this->tanggalFoto = $post["tanggalFoto"];



        return $this->db->update($this->_table, $this, array('idFoto' => $post['idFoto']));
    }




    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idFoto" => $id));
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
