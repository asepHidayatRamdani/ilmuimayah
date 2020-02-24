<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Foto extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Foto");
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->helper(array('form', 'url'));
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data["foto"] = $this->M_Foto->getAll();
		$this->load->view('foto/v_foto', $data);
	}

	public function add()
	{
		$data["max"] = $this->M_Foto->maxid();
		$this->load->view('foto/v_add', $data);
	}

	public function aksi_tambah()
	{
		$product = $this->M_Foto;
		$this->session->flashdata('sukses', 'berhasil');
		$product->save();
		redirect('foto');
	}

	public function aksi_edit()
	{
		$product = $this->M_Foto;

		$product->update();
		$this->session->flashdata('sukses', 'berhasil');

		redirect('foto');
	}


	public function edit($id)
	{
		$data["max"] = $this->M_Foto->maxid();
		$data["foto"] = $this->M_Foto->getById($id);
		$this->load->view('foto/v_edit', $data);
	}

	public function hapus($id)
	{
		$this->M_Foto->delete($id);
		$this->M_Foto->_deleteImage($id);
		redirect('video');
	}
}
