<?php
defined('BASEPATH') or exit('No direct script access allowed');

class buku extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_buku");
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
		$data["buku"] = $this->M_buku->getAll();
		$this->load->view('buku/v_buku', $data);
	}

	public function add()
	{
		$data["max"] = $this->M_buku->maxid();
		$this->load->view('buku/v_add', $data);
	}

	public function aksi_tambah()
	{
		$product = $this->M_buku;
		$this->session->flashdata('sukses', 'berhasil');
		$product->save();
		redirect('buku');
	}

	public function aksi_edit()
	{
		$product = $this->M_buku;

		$product->update();
		$this->session->flashdata('sukses', 'berhasil');

		redirect('buku');
	}


	public function edit($id)
	{
		$data["max"] = $this->M_buku->maxid();
		$data["buku"] = $this->M_buku->getById($id);
		$this->load->view('buku/v_edit', $data);
	}

	public function hapus($id)
	{
		$this->M_buku->delete($id);
		redirect('buku');
	}
}
