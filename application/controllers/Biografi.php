<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biografi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("M_biografi");
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
		$data["bio"] = $this->M_biografi->getAll();
		$this->load->view('v_biografi', $data);
	}

	public function aksi_edit($id)
	{
		$product = $this->M_biografi;

		$product->update();
		$this->session->flashdata('sukses', 'berhasil');
		$data["product"] = $product->getById($id);
		if (!$data["product"]) show_404();
		redirect('biografi');
	}
}
