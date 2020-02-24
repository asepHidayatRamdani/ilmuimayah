<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_Pengguna");
        $this->load->library('form_validation');
        $this->load->library('session');
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
		$this->load->view('v_login');
    }

    function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);
        $cek = $this->M_Pengguna->cek_login("pengguna",$where)->num_rows();
        $ceklevel=$this->M_Pengguna->cek_login("pengguna",$where)->row();
		if($cek > 0){
			$data_session = array(
                'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
            
            
            if($ceklevel->level=="admin")
            {
                redirect(site_url("admin/Admin_informasi"));
            }
            else{
                redirect(site_url("login"));
            }
 
		}else{
            echo "Username dan password salah !";
            redirect(site_url("login"));
		}
	}

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('Login'));
    }
    

	
}
