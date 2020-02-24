<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publikasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Publikasi");
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
		$data["publikasi"] = $this->M_Publikasi->getAll();
		$this->load->view('publikasi/v_publikasi', $data);
	}

	public function add()
	{
		$data["max"] = $this->M_Publikasi->maxid();
		$this->load->view('publikasi/v_add', $data);
	}

	public function aksi_tambah()
	{
		$product = $this->M_Publikasi;
		$this->session->flashdata('sukses', 'berhasil');
		$product->save();
		redirect('publikasi');
	}

	public function edit($id)
	{
		$data["max"] = $this->M_Publikasi->maxid();
		$data["publikasi"] = $this->M_Publikasi->getById($id);
		$this->load->view('publikasi/v_edit', $data);
	}

	public function aksi_edit()
	{
		$product = $this->M_Publikasi;

		$product->update();
		$this->session->flashdata('sukses', 'berhasil');

		redirect('publikasi');
	}

	public function hapus($id)
	{

		$this->M_Publikasi->delete($id);
		redirect('publikasi');
	}
}
