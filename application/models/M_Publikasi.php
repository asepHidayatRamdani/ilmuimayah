<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_Publikasi extends CI_Model
{
    private $_table = "acara";

    public $idAcara;
    public $namaAcara;
    public $tanggalAcara;
    public $tempatAcara;
    public $gambarAcara;
    public $keterangan;



    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idAcara" => $id])->row();
    }

    public function maxid()
    {

        $this->db->select_max('idAcara');
        $query = $this->db->get($this->_table)->row();
        return $query->idAcara;
    }




    public function save()
    {

        $post = $this->input->post();

        $this->idAcara = $post["idAcara"];
        $this->namaAcara = $post["namaAcara"];
        $this->tanggalAcara = $post["tanggalAcara"];
        $this->tempatAcara = $post["tempatAcara"];
        $this->gambarAcara = $this->_uploadImage();
        $this->keterangan = $post["keterangan"];

        return $this->db->insert($this->_table, $this);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './img/Acara/';
        $config['allowed_types']        = 'jpg|png|JPEG|pdf';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambarAcara')) {
            return $this->upload->data("file_name");
        }
    }


    public function update()
    {
        $post = $this->input->post();
        $this->idAcara = $post["idAcara"];
        $this->namaAcara = $post["namaAcara"];
        $this->tanggalAcara = $post["tanggalAcara"];
        $this->tempatAcara = $post["tempatAcara"];

        if (!empty($_FILES["gambarAcara"]["name"])) {
            $this->gambarAcara = $this->_uploadImage();
        } else {
            $this->gambarAcara = $post["old_file"];
        }

        $this->keterangan = $post["keterangan"];



        return $this->db->update($this->_table, $this, array('idAcara' => $post['idAcara']));
    }




    public function delete($id)
    {
        $this->_deleteImage($id);
        return $this->db->delete($this->_table, array("idAcara" => $id));
    }

    private function _deleteImage($id)
    {
        $product = $this->getById($id);
        if ($product->gambarAcara != "default.jpg") {
            $filename = explode(".", $product->gambarAcara)[0];
            return array_map('unlink', glob(FCPATH . "img/Acara/$filename.*"));
        }
    }
}
