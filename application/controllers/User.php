<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_user");
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
		$data["user"] = $this->M_user->getAll();
		$this->load->view('user/v_User', $data);
	}

	public function add()
	{
		$data["max"] = $this->M_user->maxid();
		$this->load->view('user/v_add', $data);
	}

	public function aksi_tambah()
	{
		$product = $this->M_user;
		$this->session->flashdata('sukses', 'berhasil');
		$product->save();
		redirect('user');
	}

	public function aksi_edit()
	{
		$product = $this->M_user;

		$product->update();
		$this->session->flashdata('sukses', 'berhasil');

		redirect('user');
	}


	public function edit($id)
	{
		$data["max"] = $this->M_user->maxid();
		$data["user"] = $this->M_user->getById($id);
		$this->load->view('user/v_edit', $data);
	}

	public function hapus($id)
	{
		$this->M_user->delete($id);
		redirect('user');
	}
}
