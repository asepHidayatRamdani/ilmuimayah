<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_buku extends CI_Model
{
    private $_table = "buku";

    public $idBuku;
    public $namaBuku;
    public $pengarang;
    public $tahunTerbit;
    public $fileBuku;
    public $gambar;


    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idBuku" => $id])->row();
    }

    public function maxid()
    {

        $this->db->select_max('idBuku');
        $query = $this->db->get('buku')->row();
        return $query->idBuku;
    }




    public function save()
    {


        $post = $this->input->post();
        $this->idBuku = $post["idBuku"];
        $this->namaBuku = $post["namaBuku"];
        $this->pengarang = $post["pengarang"];
        $this->tahunTerbit = $post["tahunTerbit"];
        $this->fileBuku = $this->_uploadImage();
        $this->gambar = $this->_uploadImage1();
        return $this->db->insert($this->_table, $this);
    }

    private function _uploadImage()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'jpg|png|JPEG|pdf';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fileBuku')) {
            return $this->upload->data("file_name");
        }
    }

    private function _uploadImage1()
    {
        $config['upload_path']          = './img/';
        $config['allowed_types']        = 'jpg|png|JPEG|pdf';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data("file_name");
        }
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idBuku = $post["idBuku"];
        $this->namaBuku = $post["namaBuku"];
        $this->pengarang = $post["pengarang"];
        $this->tahunTerbit = $post["tahunTerbit"];
        if (!empty($_FILES["fileBuku"]["name"])) {
            $this->fileBuku = $this->_uploadImage();
        } else {
            $this->fileBuku = $post["old_file"];
        }

        if (!empty($_FILES["gambar"]["name"])) {
            $this->gambar = $this->_uploadImage1();
        } else {
            $this->gambar = $post["old_image"];
        }
        return $this->db->update($this->_table, $this, array('idBuku' => $post['idBuku']));
    }




    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idBuku" => $id));
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
