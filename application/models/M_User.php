<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    private $_table = "user";

    public $idUser;
    public $namaUser;
    public $username;
    public $password;
    public $level;



    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["idUser" => $id])->row();
    }

    public function maxid()
    {

        $this->db->select_max('idUser');
        $query = $this->db->get($this->_table)->row();
        return $query->idUser;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->idUser = uniqid();
        $this->namaUser = $post["namaUser"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->level = $post["level"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->idUser = $post["idUser"];
        $this->namaUser = $post["namaUser"];
        $this->username = $post["username"];
        $this->password = $post["password"];
        $this->level = $post["level"];
        return $this->db->update($this->_table, $this, array('idUser' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("idUser" => $id));
    }
}
