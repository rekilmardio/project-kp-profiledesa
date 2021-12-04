<?php 
defined('BASEPATH') or exit('no direct script access allowed');
/**
 * 
 */
class Login extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	public function aksi()
	{
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run()!=false){
			//mennangkap data username dan password dari halaman login
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$where = array(
				'user_username' => $username,
				'user_password' => md5($password),
				'user_status' 	=> 1
			);


			//cek kesesuaian login pada tabel user
			$cek = $this->m_data->cek_login('user',$where)->num_rows();

			//cek jika login benar
			if($cek>0){
				//ambil data user yang melakukan login
				$data = $this->m_data->cek_login('user',$where)->row();

				//buat session untuk user yang berhasil login
				$data_session = array(
						'id' 		=> $data->user_id,
						'username' 	=> $data->user_username,
						'level'		=> $data->user_level,
						'foto'		=> $data->user_foto,
						'status'	=> 'telah_login'
				);
				$this->session->set_userdata($data_session);

				//alihkan halaman ke halaman dashboard user
				redirect(base_url().'dashboard');
			}
			else{
				redirect(base_url().'login?alert=gagal');
			}
		}
		else{
			$this->load->view('v_login');
		}
	}
}
?>