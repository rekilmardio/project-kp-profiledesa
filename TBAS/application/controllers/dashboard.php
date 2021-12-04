<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_data');
		$this->load->library('form_validation');

		date_default_timezone_set('Asia/Jakarta');

		//cek session login,
		//jika session status tidak sama dengan session telah login, berarti user belum login
		//maka halaman akan dialihkan kembali ke halaman login
		if ($this->session->userdata('status')!="telah_login") {
			redirect(base_url().'login?alert=belum_login');
		}

		$myData = [];

		$myData["jumlah_komentar"] = $this->db->query("select count(komentar_id) as jumlah_komentar from komentar where komentar_status = '0'")->row()->jumlah_komentar;

		$this->load->vars($myData);

	}

	public function index()
	{
		// hitung jumlah artikel
		$data['jumlah_artikel'] = $this->m_data->get_data('artikel')->num_rows();
		// hitung jumlah kategori
		$data['jumlah_kategori'] = $this->m_data->get_data('kategori')->num_rows();
		// hitung jumlah pengguna
		$data['jumlah_pengguna'] = $this->m_data->get_data('user')->num_rows();
		// hitung jumlah halaman
		$data['jumlah_halaman'] = $this->m_data->get_data('halaman')->num_rows();
	
		$this->load->view('dashboard/v_index',$data);
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout');
	}

	public function kategori()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_kategori', $data);
	}

	public function kategori_tambah()
	{
		$this->load->view('dashboard/v_kategori_tambah');
	}

	public function kategori_aksi()
	{
		$this->form_validation->set_rules('kategori','kategori','required');

		if ($this->form_validation->run() != false) {
			$kategori = $this->input->post('kategori');

			$data = array(
				'kategori_nama' => $kategori,
				'kategori_slug' => strtolower(url_title($kategori))
			);

			$this->m_data->insert_data($data,'kategori');
			redirect(base_url().'dashboard/kategori');
		}else{
			$this->load->view('kategori/v_kategori_tambah');
		}
	}

	public function kategori_update()
	{
		$this->form_validation->set_rules('kategori','kategori','required');
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$kategori = $this->input->post('kategori');

			$where = array(
				'kategori_id' => $id
			);

			$data = array(
				'kategori_nama' => $kategori,
				'kategori_slug' =>strtolower(url_title($kategori))
			);

			$this->m_data->update_data($where,$data,'kategori');
			redirect(base_url().'dashboard/kategori');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'kategori_id' => $id
			);
			$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
			$this->load->view('dashboard/v_kategori_edit',$data);
		}
	}

	public function kategori_edit($id)
	{
		$where = array(
			'kategori_id' => $id
		);
		$data['kategori'] = $this->m_data->edit_data($where,'kategori')->result();
		$this->load->view('dashboard/v_kategori_edit',$data);
	}

	public function kategori_hapus($id)
	{
		$where = array(
			'kategori_id' => $id
		);

		$this->m_data->delete_data($where,'kategori');
		redirect(base_url().'dashboard/kategori');
	}

	public function ganti_password()
	{
		$this->load->view('dashboard/v_ganti_password');
	}

	public function ganti_password_aksi()
	{
		// form validasi
		$this->form_validation->set_rules('password_lama','Password Lama','required');
		$this->form_validation->set_rules('password_baru','Password Baru','required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password Baru','required|matches[password_baru]');

		// cek validasi
		if($this->form_validation->run() != false){
		// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');
			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'user_id' => $this->session->userdata('id'),
				'user_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('user', $where)->num_rows();
			// cek kesesuaikan password lama
			if($cek > 0){
			// update data password pengguna
				$w = array(
				'user_id' => $this->session->userdata('id')
				);
				$data = array(
				'user_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'user');
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			}else{
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}
		}else{
			$this->load->view('dashboard/v_ganti_password');
		}
	}

	public function artikel()
	{
		$data['artikel'] = $this->db->query("select * from artikel,kategori,user where artikel_kategori = kategori_id and artikel_author = user_id order by artikel_id desc")->result();
		$this->load->view('dashboard/v_artikel',$data);	
	}

	public function artikel_tambah()
	{
		$data['kategori'] = $this->m_data->get_data('kategori')->result();
		$this->load->view('dashboard/v_artikel_tambah', $data);
	}

	public function artikel_aksi()
	{
		//wajib isi judul,konten,dan kategori
		$this->form_validation->set_rules('judul','Judul','required|is_unique[artikel.artikel_judul]');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');

		//supaya gambar wajib diisi
		if(empty($_FILES['sampul']['name'])){
			$this->form_validation->set_rules('sampul','Gambar Sampul','required');
		}

		if($this->form_validation->run() != false){
			$config['upload_path'] = './gambar/artikel/';
			$config['allowed_types'] = 'jpeg|jpg|png';
			$this->load->library('upload', $config);
			
			if ($this->upload->do_upload('sampul')) {
				// mengambil data tentang gambar
				$gambar = $this->upload->data();
				$tanggal = date('Y-m-d H:i:s');
				$judul = $this->input->post('judul');
				$slug = strtolower(url_title($judul));
				$konten = $this->input->post('konten');
				$sampul = $gambar['file_name'];
				$author = $this->session->userdata('id');
				$kategori = $this->input->post('kategori');
				$status = $this->input->post('status');

				$data = array(
					'artikel_tanggal' => $tanggal,
					'artikel_judul' => $judul,
					'artikel_slug' => $slug,
					'artikel_konten' => $konten,
					'artikel_sampul' => $sampul,
					'artikel_author' => $author,
					'artikel_kategori' => $kategori,
					'artikel_status' => $status,
				);
				$this->m_data->insert_data($data,'artikel');
				redirect(base_url().'dashboard/artikel');
			} else {
				$this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
				$data['kategori'] = $this->m_data->get_data('kategori')->result();
				$this->load->view('dashboard/v_artikel_tambah',$data);
			}
		}else{
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_artikel_tambah',$data);
		}
	}

	public function artikel_edit($id)
	{
		$where = array(
			'artikel_id' => $id
		);
		
		$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
		$data['kategori'] = $this->m_data->get_data('kategori')->result();

		$this->load->view('dashboard/v_artikel_edit',$data);
	}

	public function artikel_update()
	{
		// Wajib isi judul,konten dan kategori
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('konten','Konten','required');
		$this->form_validation->set_rules('kategori','Kategori','required');
		
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			$kategori = $this->input->post('kategori');
			$status = $this->input->post('status');
			$foto_old = $this->input->post('foto_old');
			
			$where = array(
				'artikel_id' => $id
			);
			
			$data = array(
				'artikel_judul' => $judul,
				'artikel_slug' => $slug,
				'artikel_konten' => $konten,
				'artikel_kategori' => $kategori,
				'artikel_status' => $status,
			);

			$this->m_data->update_data($where,$data,'artikel');

			if (!empty($_FILES['sampul']['name'])){
				$config['upload_path'] = './gambar/artikel/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('sampul')) {
					// mengambil data tentang gambar
					$gambar = $this->upload->data();
					$data = array(
					'artikel_sampul' => $gambar['file_name'],
					);

					if(file_exists("gambar/artikel/".$foto_old)){
						unlink("gambar/artikel/".$foto_old);
					}

					$this->m_data->update_data($where,$data,'artikel');
					redirect(base_url().'dashboard/artikel');

				} else {
					$this->form_validation->set_message('sampul',$data['gambar_error'] = $this->upload->display_errors());
					$where = array(
						'artikel_id' => $id
					);

					$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
					$data['kategori'] = $this->m_data->get_data('kategori')->result();
					$this->load->view('dashboard/v_artikel_edit',$data);
				}

			}else{
				redirect(base_url().'dashboard/artikel');
			}

		}else{
			$id = $this->input->post('id');
			$where = array(
			'artikel_id' => $id
			);
			$data['artikel'] = $this->m_data->edit_data($where,'artikel')->result();
			$data['kategori'] = $this->m_data->get_data('kategori')->result();
			$this->load->view('dashboard/v_artikel_edit',$data);
		}
	}

	public function artikel_hapus($id)
	{
		//mengahapus data sekalian foto di folder gambar
		$where = array(
			'artikel_id' => $id
		);

		$_id = $this->db->get_where('artikel', ['artikel_id' => $id])->row();

		$query = $this->db->delete('artikel', $where);
		if ($query) {
			unlink("gambar/artikel/".$_id->artikel_sampul);
		}
		redirect(base_url().'dashboard/artikel');


		// $this->db->where('artikel_id',$id);
		// $query = $this->db->get('artikel');
		// $row = $query->row();

		// unlink("./gambar/artikel/$row->artikel_sampul");
		// $this->db->delete('artikel',$where);
		// redirect(base_url().'dashboard/artikel');
	}

	public function pages()
	{
		$data['halaman'] = $this->m_data->get_data('halaman')->result();
		$this->load->view('dashboard/v_pages',$data);
	}

	public function pages_tambah()
	{
		$this->load->view('dashboard/v_pages_tambah');
	}

	public function pages_aksi()
	{
		// Wajib isi judul,konten
		$this->form_validation->set_rules('judul','Judul','required|is_unique[halaman.halaman_judul]');
		$this->form_validation->set_rules('konten','Konten','required');
		
		if($this->form_validation->run() != false){
			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			
			$data = array(
				'halaman_judul' => $judul,
				'halaman_slug' => $slug,
				'halaman_konten' => $konten
			);
			$this->m_data->insert_data($data,'halaman');
			// alihkan kembali ke method pages
			redirect(base_url().'dashboard/pages');

		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pages_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function pages_edit($id)
	{
		$where = array(
			'halaman_id' => $id
		);

		$data['halaman'] = $this->m_data->edit_data($where,'halaman')->result();
		$this->load->view('dashboard/v_pages_edit',$data);
	}

	public function pages_update()
	{
		// Wajib isi judul,konten
		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('konten','Konten','required');
		
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$judul = $this->input->post('judul');
			$slug = strtolower(url_title($judul));
			$konten = $this->input->post('konten');
			$where = array(
				'halaman_id' => $id
			);

			$data = array(
				'halaman_judul' => $judul,
				'halaman_slug' => $slug,
				'halaman_konten' => $konten
			);

			$this->m_data->update_data($where,$data,'halaman');
			redirect(base_url().'dashboard/pages');

		}else{
			$id = $this->input->post('id');
			$where = array(
				'halaman_id' => $id
			);

			$data['halaman'] = $this->m_data->edit_data($where,'halaman')->result();
			$this->load->view('dashboard/v_pages_edit',$data);
		}
	}

	public function pages_hapus($id)
	{
		$where = array(
			'halaman_id' => $id
		);

		$this->m_data->delete_data($where,'halaman');
		redirect(base_url().'dashboard/pages');
	}

	public function profil()
	{
		//id penggguna yang sedang login
		$id_pengguna = $this->session->userdata('id');

		$where = array(
			'user_id' => $id_pengguna
		);

		$data['profil'] = $this->m_data->edit_data($where, 'user')->result();
		$this->load->view('dashboard/v_profil',$data);
	}


	public function profil_update()
	{
		//wajib isi nama dan email
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');

		if($this->form_validation->run() != false){
			$id = $this->session->userdata('id');

			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$foto_old = $this->input->post('foto_old');

			$where = array(
				'user_id' => $id
			);

			$data = array(
				'user_nama' => $nama,
				'user_email' => $email
			);

			//$this->m_data->update_data($where,$data,'user');
			//redirect(base_url().'dashboard/profil/?alert=sukses');

			$this->m_data->update_data($where,$data,'user');

			//var_dump($_FILES["user_foto"]); die;
			if (!empty($_FILES['user_foto']['name'])) {
				$config['upload_path'] = './gambar/profil/';
				$config['allowed_types'] = 'jpeg|jpg|png';
				$config['max_size']	= '1000'; //in kilobyte
				// $config['max_width']  = '2000'; //ukuran maksimum lebar image dalam pixel
				// $config['max_height']  = '1024'; //ukuran maksimum tinggi image dalam pixel


				$this->load->library('upload', $config);
				
				if ($this->upload->do_upload('user_foto')) {
					// mengambil data tentang gambar
					$gambar = $this->upload->data();
					$data = array(
						'user_foto' => $gambar['file_name'],
					);
					$this->m_data->update_data($where,$data,'user');
					//redirect(base_url().'dashboard/profil/?alert=sukses');

					//mengahapus data sekalian foto di folder gambar

					// $_id = $this->db->get_where('user', ['user_id' => $id])->row();

					// $query = $this->db->update('user_foto', $where);
					// if ($query) {
					// 	unlink("gambar/profil/".$_id->user_foto);
					// }

					if(file_exists("gambar/profil/".$foto_old)){
						unlink("gambar/profil/".$foto_old);
					}

					redirect(base_url().'dashboard/profil/?alert=sukses');

				} else {
					$this->form_validation->set_message('user_foto',$data['gambar_error'] = $this->upload->display_errors());
					$where = array(
						'user_id' => $id
					);

					$data['profil'] = $this->m_data->edit_data($where,'user')->result();
					
					$this->load->view('dashboard/v_profil',$data);
				}

			}else{
				redirect(base_url().'dashboard/profil/?alert=sukses');
			}
			
		}else{
			//id pengguna yang sedang login
			$id_pengguna = $this->session->userdata('id');

			$where = array(
				'user_id' => $id_pengguna
			);

			$data['profil'] = $this->m_data->edit_data($where,'user')->result();
			$this->load->view('dashboard/v_profil',$data);
		}
	}

	public function pengaturan()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
		$this->load->view('dashboard/v_pengaturan', $data);
	}

	public function pengaturan_update()
	{
		// Wajib isi nama dan deskripsi website
		$this->form_validation->set_rules('nama','Nama Website','required');
		$this->form_validation->set_rules('deskripsi','Deskripsi Website','required');
		
		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$deskripsi = $this->input->post('deskripsi');
			$link_facebook = $this->input->post('link_facebook');
			$link_instagram = $this->input->post('link_instagram');
			$link_twitter = $this->input->post('link_twitter');
			$email = $this->input->post('email');
			$logo_old = $this->input->post('logo_old');
			$carousel_0_old = $this->input->post('carousel_0_old');
			$carousel_1_old = $this->input->post('carousel_1_old');
			$carousel_2_old = $this->input->post('carousel_2_old');

			
			$where = array(
			
			);

			$data = array(
				'nama' => $nama,
				'deskripsi' => $deskripsi,
				'link_facebook' => $link_facebook,
				'link_twitter' => $link_twitter,
				'link_instagram' => $link_instagram,
				'email' => $email
			);

			// update pengaturan
			$this->m_data->update_data($where,$data,'pengaturan');
			
			// Periksa apakah ada gambar logo yang diupload
			if (!empty($_FILES['logo']['name'])){
				$config['upload_path'] = './gambar/website/';
				$config['allowed_types'] = 'jpg|png';
				
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('logo')) {
					// mengambil data tentang gambar logo yang diupload
					$gambar = $this->upload->data();
					$logo = $gambar['file_name'];
					$this->db->query("UPDATE pengaturan SET logo='$logo'");

					if(file_exists("gambar/website/".$logo_old)){
						unlink("gambar/website/".$logo_old);
					}
				}
			}

			// Periksa apakah ada gambar intro yang diupload
			if (!empty($_FILES['carousel_0']['name'])){
				$config['upload_path'] = './gambar/website/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_width']  = '2000'; //ukuran maksimum lebar image dalam pixel
				$config['max_height']  = '1060'; //ukuran maksimum tinggi image dalam pixel
				
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('carousel_0')) {
					// mengambil data tentang gambar logo yang diupload
					$gambar = $this->upload->data();
					$carousel_0 = $gambar['file_name'];
					$this->db->query("UPDATE pengaturan SET carousel_0='$carousel_0'");

					if(file_exists("gambar/website/".$carousel_0_old)){
						unlink("gambar/website/".$carousel_0_old);
					}
				}
			}

			if (!empty($_FILES['carousel_1']['name'])){
				$config['upload_path'] = './gambar/website/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_width']  = '2000'; //ukuran maksimum lebar image dalam pixel
				$config['max_height']  = '1060'; //ukuran maksimum tinggi image dalam pixel
				
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('carousel_1')) {
					// mengambil data tentang gambar logo yang diupload
					$gambar = $this->upload->data();
					$carousel_1 = $gambar['file_name'];
					$this->db->query("UPDATE pengaturan SET carousel_1='$carousel_1'");

					if(file_exists("gambar/website/".$carousel_1_old)){
						unlink("gambar/website/".$carousel_1_old);
					}
				}
			}

			if (!empty($_FILES['carousel_2']['name'])){
				$config['upload_path'] = './gambar/website/';
				$config['allowed_types'] = 'jpg|png';
				$config['max_width']  = '2000'; //ukuran maksimum lebar image dalam pixel
				$config['max_height']  = '1060'; //ukuran maksimum tinggi image dalam pixel
				
				$this->load->library('upload', $config);

				if ($this->upload->do_upload('carousel_2')) {
					// mengambil data tentang gambar logo yang diupload
					$gambar = $this->upload->data();
					$carousel_2 = $gambar['file_name'];
					$this->db->query("UPDATE pengaturan SET carousel_2='$carousel_2'");

					if(file_exists("gambar/website/".$carousel_2_old)){
						unlink("gambar/website/".$carousel_2_old);
					}
				}
			}

			
			redirect(base_url().'dashboard/pengaturan/?alert=sukses');
		
		}else {
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
			$this->load->view('dashboard/v_pengaturan',$data);
		}
	}

	public function pengguna()
	{
		$data['pengguna'] = $this->m_data->get_data('user')->result();
		$this->load->view('dashboard/v_pengguna',$data);
	}

	public function pengguna_tambah()
	{
		$this->load->view('dashboard/v_pengguna_tambah');
	}

	public function pengguna_aksi()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('password','Password Pengguna','required|min_length[8]');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');

		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');
			
			$data = array(
				'user_nama' => $nama,
				'user_email' => $email,
				'user_username' => $username,
				'user_password' => $password,
				'user_level' => $level,
				'user_status' => $status
			);

			$this->m_data->insert_data($data,'user');
			redirect(base_url().'dashboard/pengguna');

		}else{
			$this->load->view('dashboard/v_pengguna_tambah');
		}
	}

	public function pengguna_edit($id)
	{
		$where = array(
			'user_id' => $id
		);
		
		$data['pengguna'] = $this->m_data->edit_data($where,'user')->result();
		$this->load->view('dashboard/v_pengguna_edit',$data);
	}

	public function pengguna_update()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');
		
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');

			//cek jika form password tidak diisi, maka jangan update kolum password, dan sebaliknya
			if($this->input->post('password') == ""){
			
				$data = array(
					'user_nama' => $nama,
					'user_email' => $email,
					'user_username' => $username,
					'user_level' => $level,
					'user_status' => $status
				);

			}else{
				$data = array(
					'user_nama' => $nama,
					'user_email' => $email,
					'user_username' => $username,
					'user_password' => $password,
					'user_level' => $level,
					'user_status' => $status
				);
			}

			$where = array(
				'user_id' => $id
			);
			
			$this->m_data->update_data($where,$data,'user');
			redirect(base_url().'dashboard/pengguna');

		}else{
			$id = $this->input->post('id');
			
			$where = array(
				'user_id' => $id
			);
			
			$data['pengguna'] = $this->m_data->edit_data($where,'user')->result();
			$this->load->view('dashboard/v_pengguna_edit',$data);
		}
	}

	public function pengguna_hapus($id)
	{
		$where = array(
			'user_id' => $id
		);

		$data['user_hapus'] = $this->m_data->edit_data($where,'user')->row();
		$data['user_lain'] = $this->db->query("SELECT * FROM user WHERE
		user_id != $id")->result();
		$this->load->view('dashboard/v_pengguna_hapus',$data);
	}

	public function pengguna_hapus_aksi()
	{
		$user_hapus = $this->input->post('user_hapus');
		$user_tujuan = $this->input->post('user_tujuan');
		
		// hapus pengguna
		$where = array(
			'user_id' => $user_hapus
		);

		$this->m_data->delete_data($where,'user');

		// pindahkan semua artikel pengguna yang dihapus ke pengguna yang dipilih
		$w = array(
			'artikel_author' => $user_hapus
		);

		$d = array(
			'artikel_author' => $user_tujuan
		);
		$this->m_data->update_data($w,$d,'artikel');
		redirect(base_url().'dashboard/pengguna');
		
		// end crud pengguna
	}

	public function komentar()
	{
		$data['komentar'] = $this->m_data->get_data('komentar')->result();
		$this->load->view('dashboard/v_komentar', $data);
	}

	public function komentar_aksi()
	{
		// Wajib isi
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Alamat Email','required');
		$this->form_validation->set_rules('komentar','Tulis Komentar','required');

		if($this->form_validation->run() != false){
			$tanggal = date('Y-m-d H:i:s');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$komentar = $this->input->post('komentar');
			
			$data = array(
				'komentar_tanggal' => $tanggal,
				'komentar_nama' => $nama,
				'komentar_email' => $email,
				'komentar_isi' => $komentar
			);

			$this->m_data->insert_data($data,'komentar');
			redirect(base_url().'?alert=sukses');
		}
		else{
			redirect(base_url().'?alert=gagal');
		}
	}

	public function komentar_hapus($id)
	{
		$where = array(
			'komentar_id' => $id
		);

		$this->m_data->delete_data($where,'komentar');
		redirect(base_url().'dashboard/komentar');
	}

	public function komentar_update()
	{
		$this->form_validation->set_rules('status','Status Komentar','required');
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$status = $this->input->post('status');

			$where = array(
				'komentar_id' => $id
			);

			$data = array(
				'komentar_status' => $status
			);

			$this->m_data->update_data($where,$data,'komentar');
			redirect(base_url().'dashboard/komentar');
		}
	}

	public function notif()
	{
		// $query = $this->db->query("select count(komentar_id) as jumlah_komentar from komentar")->result();
		// if( $query->num_rows() > 0) {
		// 	$result = $query->result(); //or $query->result_array() to get an array
		// 	foreach( $result as $row )
		// 	{
		// 	  //access columns as $row->column_name
		// 	  echo $row->komentar_id;
		// 	}
		// }  
		$data["jumlah_komentar"] = $this->db->query("select count(komentar_id) as jumlah_komentar from komentar where komentar_status = 0")->row();

		$this->load->view('_templateadmin/sidebar',$data);
	}
}
?>