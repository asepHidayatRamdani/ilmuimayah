<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_Video");
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
		$data["video"] = $this->M_Video->getAll();
		$this->load->view('video/v_video', $data);
	}

	public function add()
	{
		$data["max"] = $this->M_Video->maxid();
		$this->load->view('video/v_add', $data);
	}

	public function aksi_tambah()
	{
		$product = $this->M_Video;
		$this->session->flashdata('sukses', 'berhasil');
		$product->save();
		redirect('video');
	}

	public function aksi_edit()
	{
		$product = $this->M_Video;

		$product->update();
		$this->session->flashdata('sukses', 'berhasil');

		redirect('video');
	}


	public function edit($id)
	{
		$data["max"] = $this->M_Video->maxid();
		$data["video"] = $this->M_Video->getById($id);
		$this->load->view('video/v_edit', $data);
	}

	public function hapus($id)
	{
		$this->M_Video->delete($id);
		redirect('video');
	}
}
