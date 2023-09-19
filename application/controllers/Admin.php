<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){ 
		parent::__construct(); 
		if($this->session->userdata('status') != "login_admin"){
			redirect('Login/log_cek');
		}
	}

	public function index(){
		//method yang nanti akan digunakan di model 
		//untuk menampilkan data yang ada pada database
		$data['penelitian'] = $this->M_proposal->tampil_penelitian();
		$this->load->view('admin/dashboard',$data);
	}

	public function penelitian(){
		//method yang nanti akan digunakan di model 
		//untuk menampilkan data yang ada pada database
		$data['penelitian'] = $this->M_proposal->tampil_penelitian();
		$this->load->view('admin/penelitian',$data);
	}

	public function pengabdian(){
		//method yang nanti akan digunakan di model 
		//untuk menampilkan data yang ada pada database
		$data['pengabdian'] = $this->M_proposal->tampil_pengabdian();
		$this->load->view('admin/pengabdian',$data);
	}

	public function pengguna(){
		//method yang nanti akan digunakan di model 
		//untuk menampilkan data yang ada pada database
		$data['akun'] = $this->M_proposal->tampil_akun();
		$this->load->view('admin/pengguna',$data);
	}


	public function hapus_penelitian($id){
		//ambil data nama file foto berdasarkan id
		$data = $this->M_proposal->get_file($id);
		//lokasi gambar
		if ($data->foto != 'no_file.pdf') { //jika 	foto bukan 'no_image.jpg' maka hapus
			$path='./assets/file/';
			//hapus data di folder
			@unlink($path.$data->foto);
		}
		//method yang nanti akan digunakan di model
		//untuk menghapus data dari database
		$this->M_proposal->hapus_data($id, 'penelitian');
		redirect('Admin/penelitian');
	}
	
	public function hapus_pengabdian($id){
		//ambil data nama file foto berdasarkan id
		$data = $this->M_proposal->get_file($id);
		//lokasi gambar
		if ($data->foto != 'no_file.pdf') { //jika 	foto bukan 'no_image.jpg' maka hapus
			$path='./assets/file/';
			//hapus data di folder
			@unlink($path.$data->foto);
		}
		//method yang nanti akan digunakan di model
		//untuk menghapus data dari database
		$this->M_proposal->hapus_data($id, 'pengabdian');
		redirect('Admin/pengabdian');
	}

	public function tambah_penelitian_reviewer1($id){
		$reviewer1= $this->input->post('reviewer1');
		$data = array(
		'reviewer1'=>$reviewer1);
		$this->M_proposal->input_reviewer($where, 'penelitian', $data);
		redirect('Admin/penelitian');
	}

	public function tambah_penelitian_reviewer2($id){
		$reviewer2= $this->input->post('reviewer2');
		$data = array(
		'reviewer2'=>$reviewer1);
		$this->M_proposal->input_reviewer($where, 'penelitian', $data);
		redirect('Admin/penelitian');
	}

	public function tambah_pengabdian_reviewer1($id){
		$reviewer1= $this->input->post('reviewer1');
		$data = array(
		'reviewer1'=>$reviewer1);
		$this->M_proposal->input_reviewer($where, 'pengabdian', $data);
		redirect('Admin/pengabdian');
	}

	public function tambah_pengabdian_reviewer2($id){
		$reviewer2= $this->input->post('reviewer2');
		$data = array(
		'reviewer2'=>$reviewer2);
		$this->M_proposal->input_reviewer($where, 'pengabdian', $data);
		redirect('Admin/pengabdian');
	}

	public function tambah_dana_penelitian($id){
		$dana_acc= $this->input->post('dana_acc');
		$data = array(
		'dana_acc'=>$dana_acc);
		$this->M_proposal->input_dana($where, 'penelitian', $data);
		redirect('Admin/penelitian');
	}

	public function tambah_dana_pengabdian($id){
		$dana_acc= $this->input->post('dana_acc');
		$data = array(
		'dana_acc'=>$dana_acc);
		$this->M_proposal->input_dana($where, 'pengabdian', $data);
		redirect('Admin/pengabdian');
	}

	public function detail_penelitian($id){
		//method yang nanti akan digunakan di model
		//untuk merubah data dari database
		$data['penelitian'] = $this->M_proposal->get_data($id,'penelitian');
		$this->load->view('admin/detail_penelitian', $data);
	}

	public function detail_pengabdian($id){
		//method yang nanti akan digunakan di model
		//untuk merubah data dari database
		$data['pengabdian'] = $this->M_proposal->get_data($id,'pengabdian');
		$this->load->view('admin/detail_pengabdian', $data);
	}



	
}
//end of file Admin.php
//location : application\controllers\