<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

//fungsi-fungsi untuk user admin============================================
	public function log_cek(){
		$this->session->sess_destroy();
		$this->load->view('landing/index');
	}	

	public function validasi_admin(){ //validasi login
		$username = $this->input->post('username'); 
		$password = $this->input->post('password'); 
		$select='id';
		$where = array( 'username' => $username, 'password' => md5($password) ); 
		$cek = $this->M_login->cek_login($select,"admin",$where)->num_rows(); 
		if($cek > 0){
			$data_session = array( 'username' => $username, 'status' => "login_admin" );
			$this->session->set_userdata($data_session);
			//echo "sukses";
			redirect(base_url("Admin/index"));
		}else{ 
			//echo "Username dan password salah !"; 
			redirect(base_url("Login/admin"));
			
		}
	}

//fungsi-fungsi untuk user mahasiswa ============================================
	public function pengguna(){
		$this->session->sess_destroy();
		$this->load->view('pengguna/login_user');
	}

	public function admin(){
		$this->session->sess_destroy();
		$this->load->view('admin/login_admin');
	}

	public function validasi_pengguna(){ //validasi login
		$username = $this->input->post('username'); 
		$password = $this->input->post('password'); 
		$select='id';
		$where = array( 'username' => $username, 'password' => md5($password) ); 
		$cek = $this->M_login->cek_login($select,"akun",$where)->num_rows(); 
		if($cek > 0){
			$tipe = array('tipe' => 'dosen');
        	$cek1 = $this->M_proposal->akun_where($tipe)->num_rows();

			if($cek1>0){
			$data_session = array('username' => $username, 'status' => "login_dosen" );
			$this->session->set_userdata($data_session);
			echo "login sukses"; 
			redirect(base_url("Pengguna/index"));

			}else{
			$data_session = array( 'username' => $username, 'status' => "login_reviewer" );
			$this->session->set_userdata($data_session);
			echo "login sukses"; 
			redirect(base_url("Pengguna/index"));
			}

		}else{ 
			echo "username dan password salah !"; 
			redirect(base_url("Login/pengguna"));
		}


	}
	

}

//end of file Login.php
//location : application\controllers\