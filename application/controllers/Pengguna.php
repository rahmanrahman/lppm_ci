<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller{
	
	function __construct(){ 
		parent::__construct(); 
		if(($this->session->userdata('status') != "login_dosen") || ($this->session->userdata('status') != "login_reviewer") || ($this->session->userdata('status') != "reviewer1") || ($this->session->userdata('status') != "reviewer2")) {
			redirect('Login/pengguna');
		}
	}

	public function index(){
		//method yang nanti akan digunakan di model 
		//untuk menampilkan data yang ada pada database
		$data['penelitian'] = $this->M_proposal->tampil_penelitian();
		$this->load->view('pengguna/dashboard',$data);
	}
	
	public function dosen(){
		$username = $this->session->userdata('username');
		$where = array('akun' => $username);
		$cek = $this->M_proposal->detail_data("penelitian",$where)->num_rows();
		$penelitian = $this->M_proposal->tampil_laporan($where,'penelitian');

		if(cek>0){
			$data['penelitian'] = $this->M_proposal->tampil_data_laporan();
		$this->load->view('pengguna/dashboard_penelitian',$data);
		}else{
			$this->load->view('pengguna/tambah_penelitian');
		}
		
	}

	public function reviewer(){
		$username = $this->session->userdata('username');
		$where1 = array('reviewer1' => $username);
		$where2 = array('reviewer2' => $username);
		$cek1 = $this->M_proposal->detail_data("penelitian",$where1)->num_rows();
		$cek2 = $this->M_proposal->detail_data("penelitian",$where2)->num_rows();
		$detail1 = $this->M_proposal->tampil_laporan($where1,'penelitian');
		$detail2 = $this->M_proposal->tampil_laporan($where2,'penelitian');
		if($cek1>0){
			$data_session = array( 'username' => $username, 'status' => "reviewer1" );
			$data['detail1'] = $detail1;
			$this->session->set_userdata($data_session); 
		$this->load->view('reviewer/rev1-penelitian', $data);
		}else if($cek2>0){
			$data_session = array( 'username' => $username, 'status' => "reviewer2" );
			$data['detail2'] = $detail2; 
			$this->session->set_userdata($data_session);
		$this->load->view('reviewer/rev2-penelitian', $data);
		}else{
			$this->load->view('reviewer/empty');
		}
	}

	public function dashboard_penelitian(){
		$nama =  $this->session->userdata('username');
		$where = array('akun' => $nama);
		$detail = $this->M_proposal->detail_data($where,'penelitian'); 
		$data['detail'] = $detail; 
		$this->load->view('pengguna/dashboard_penelitian', $data);
	}

	public function dashboard_pengabdian(){
		$nama =  $this->session->userdata('username');
		$where = array('akun' => $nama);
		$detail = $this->M_proposal->detail_data($where,'pengabdian'); 
		$data['detail'] = $detail; 
		$this->load->view('pengguna/dashboard_pengabdian', $data);
	}

	public function penelitian(){
		$nama =  $this->session->userdata('username');
		$where = array('akun' => $nama);
		$cek = $this->M_proposal->detail_data("penelitian",$where)->num_rows();
		if(cek>0){
		$detail = $this->M_proposal->tampil_laporan($where,'penelitian'); 
		$data['detail'] = $detail; 
		$this->load->view('pengguna/penelitian', $data);
		}else{
			redirect('Pengguna/tambah_penelitian');
		}
	}
	
	public function pengabdian(){
		$nama =  $this->session->userdata('username');
		$where = array('akun' => $nama);
		$cek = $this->M_proposal->detail_data("penelitian",$where)->num_rows();
		if(cek>0){
		$detail = $this->M_proposal->tampil_laporan($where,'pengabdian'); 
		$data['detail'] = $detail; 
		$this->load->view('pengguna/pengabdian', $data);
		}else{
			redirect('Pengguna/tambah_pengabdian');
		}
	}

	public function tambah_penelitian(){
		$akun		= $this->session->userdata('username');
		$nidn		= $this->input->post('nidn');
		$nama		= $this->input->post('nama');
		$program_studi	= $this->input->post('program_studi');
		$fakultas	= $this->input->post('fakultas');
		$skema_penelitian 	= $this->input->post('skema_penelitian'); 
		$tahun_usulan 		= $this->input->post('tahun_usulan'); 
		$tahun_pelaksanaan 		= $this->input->post('tahun_pelaksanaan');
		$dana_ajuan 		= $this->input->post('dana_ajuan');
		$file 		= $this->input->post('file');
		
		//upload foto ke folder
		$config['upload_path'] = './assets/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 5000; // max 5 MB
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){ 
			//jika upload berhasil maka isi variabel $foto = file_name
			$file=$this->upload->data('file_name'); 
		}else{
			//jika gagal upload maka isi variabel $foto = 'no_image.jpg'
			echo "Upload Gagal";
			$file='no_file.pdf';
		}
		
		//data yang dikirim harus bertipe array
		$data = array(
		'akun'=>$akun,
		'nidn'=>$nidn,
		'nama'=>$nama,
		'program_studi'=>$program_studi,
		'fakultas'=>$fakultas,
		'skema_penelitian'=>$skema_penelitian,
		'tahun_usulan'=> $tahun_usulan,
		'tahun_pelaksanaan'=>$tahun_pelaksanaan,
		'dana_ajuan'=>$dana_ajuan,
		'file'=>$file
		);

		//method yang nanti akan digunakan di model 
		//untuk memasukan data ke database
		$this->M_proposal->input_data('penelitian', $data);
		redirect('Pengguna/penelitian');
	}

	public function tambah_pengabdian(){
		$akun		= $this->session->userdata('username');
		$nidn		= $this->input->post('nidn');
		$nama		= $this->input->post('nama');
		$program_studi	= $this->input->post('program_studi');
		$fakultas	= $this->input->post('fakultas');
		$skema_pengabdian 	= $this->input->post('skema_penelitian'); 
		$tahun_usulan 		= $this->input->post('tahun_usulan'); 
		$tahun_pelaksanaan 		= $this->input->post('tahun_pelaksanaan');
		$dana_ajuan 		= $this->input->post('dana_ajuan');
		$file 		= $this->input->post('file');
		
		//upload foto ke folder
		$config['upload_path'] = './assets/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 5000; // max 5 MB
		$this->load->library('upload',$config);
		if($this->upload->do_upload('file')){ 
			//jika upload berhasil maka isi variabel $foto = file_name
			$file=$this->upload->data('file_name'); 
		}else{
			//jika gagal upload maka isi variabel $foto = 'no_image.jpg'
			echo "Upload Gagal";
			$file='no_file.pdf';
		}
		
		//data yang dikirim harus bertipe array
		$data = array(
		'akun'=>$akun,
		'nidn'=>$nidn,
		'nama'=>$nama,
		'program_studi'=>$program_studi,
		'fakultas'=>$fakultas,
		'skema_pengabdian'=>$skema_penelitian,
		'tahun_usulan'=> $tahun_usulan,
		'tahun_pelaksanaan'=>$tahun_pelaksanaan,
		'dana_ajuan'=>$dana_ajuan,
		'file'=>$file
		);

		//method yang nanti akan digunakan di model 
		//untuk memasukan data ke database
		$this->M_proposal->input_data('pengabdian', $data);
		redirect('Pengguna/pengabdian');
	}


	public function laporan_kemajuan_penelitian(){
		$nama = $this->session->userdata('username');
		$where = array('akun' => $nama);

		$laporan_kemajuan 		= $this->input->post('laporan_kemajuan');
		//upload foto ke folder
		$config['upload_path'] = './assets/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 5000; // max 5 MB
		$this->load->library('upload',$config);
		if($this->upload->do_upload('laporan_kemajuan')){ 
			//jika upload berhasil maka isi variabel $foto = file_name
			$laporan_kemajuan=$this->upload->data('file_name'); 
		}else{
			//jika gagal upload maka isi variabel $foto = 'no_image.jpg'
			echo "Upload Gagal";
			$laporan_kemajuan='no_file.pdf';
		}
		
		//data yang dikirim harus bertipe array
		$data = array(
		'laporan_kemajuan'=>$laporan_kemajuan
		);

		//method yang nanti akan digunakan di model 
		//untuk memasukan data ke database
		$this->M_proposal->input_laporan($where, 'penelitian', $data);
		redirect('Pengguna/penelitian');
	}
	
	public function laporan_akhir_penelitian(){
		$nama = $this->session->userdata('username');
		$where = array('akun' => $nama);

		$laporan_akhir 		= $this->input->post('laporan_kemajuan');
		//upload foto ke folder
		$config['upload_path'] = './assets/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 5000; // max 5 MB
		$this->load->library('upload',$config);
		if($this->upload->do_upload('laporan_akhir')){ 
			//jika upload berhasil maka isi variabel $foto = file_name
			$laporan_akhir=$this->upload->data('file_name'); 
		}else{
			//jika gagal upload maka isi variabel $foto = 'no_image.jpg'
			echo "Upload Gagal";
			$laporan_akhir='no_file.pdf';
		}
		
		//data yang dikirim harus bertipe array
		$data = array(
		'laporan_akhir'=>$laporan_akhir
		);

		//method yang nanti akan digunakan di model 
		//untuk memasukan data ke database
		$this->M_proposal->input_laporan($where, 'penelitian', $data);
		redirect('Pengguna/penelitian');
	}

	public function laporan_kemajuan_pengabdian(){
		$nama = $this->session->userdata('username');
		$where = array('akun' => $nama);

		$laporan_kemajuan 		= $this->input->post('laporan_kemajuan');
		//upload foto ke folder
		$config['upload_path'] = './assets/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 5000; // max 5 MB
		$this->load->library('upload',$config);
		if($this->upload->do_upload('laporan_kemajuan')){ 
			//jika upload berhasil maka isi variabel $foto = file_name
			$laporan_kemajuan=$this->upload->data('file_name'); 
		}else{
			//jika gagal upload maka isi variabel $foto = 'no_image.jpg'
			echo "Upload Gagal";
			$laporan_kemajuan='no_file.pdf';
		}
		
		//data yang dikirim harus bertipe array
		$data = array(
		'laporan_kemajuan'=>$laporan_kemajuan
		);

		//method yang nanti akan digunakan di model 
		//untuk memasukan data ke database
		$this->M_proposal->input_laporan($where, 'pengabdian', $data);
		redirect('Pengguna/pengabdian');
	}
	
	public function laporan_akhir_pengabdian(){
		$nama = $this->session->userdata('username');
		$where = array('akun' => $nama);

		$laporan_akhir 		= $this->input->post('laporan_kemajuan');
		//upload foto ke folder
		$config['upload_path'] = './assets/file/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 5000; // max 5 MB
		$this->load->library('upload',$config);
		if($this->upload->do_upload('laporan_akhir')){ 
			//jika upload berhasil maka isi variabel $foto = file_name
			$laporan_akhir=$this->upload->data('file_name'); 
		}else{
			//jika gagal upload maka isi variabel $foto = 'no_image.jpg'
			echo "Upload Gagal";
			$laporan_akhir='no_file.pdf';
		}
		
		//data yang dikirim harus bertipe array
		$data = array(
		'laporan_akhir'=>$laporan_akhir
		);

		//method yang nanti akan digunakan di model 
		//untuk memasukan data ke database
		$this->M_proposal->input_laporan($where, 'pengabdian', $data);
		redirect('Pengguna/pengabdian');
	}

	public function pengabdian_rev(){
		if($this->session->userdata('status') == "reviewer1") {
			$nama = $this->session->userdata('username');
		$where = array('reviewer1' => $nama);
		$cek = $this->M_proposal->detail_data("pengabdian",$where1)->num_rows();
		$detail = $this->M_proposal->tampil_laporan($where,'pengabdian');
			if($cek>0){
				$data['detail'] = $detail;
			$this->load->view('reviewer/rev1-pengabdian', $data);
			}else{
				$this->load->view('reviewer/empty');
			}
		}else{
			$nama = $this->session->userdata('username');
		$where = array('reviewer2' => $nama);
		$cek = $this->M_proposal->detail_data("pengabdian",$where1)->num_rows();
		$detail = $this->M_proposal->tampil_laporan($where,'pengabdian');
			if($cek>0){
				$data['detail'] = $detail;
			$this->load->view('reviewer/rev2-pengabdian', $data);
			}else{
				$this->load->view('reviewer/empty');
			}
		
		}

	}

	public function tambah_ulasan_penelitian(){
		if($this->session->userdata('status') == "reviewer1") {
			$nama = $this->session->userdata('username');
		$where = array('reviewer1' => $nama);
		$ulasan1		= $this->input->post('ulasan1');
		$data = array(
		'ulasan1'=>$ulasan1);
		$this->M_proposal->input_laporan($where, 'penelitian', $data);
		redirect('reviewer/penelitian');
			
		}else{
			$nama = $this->session->userdata('username');
		$where = array('reviewer2' => $nama);
		$ulasan2		= $this->input->post('ulasan2');
		$data = array(
		'ulasan2'=>$ulasan2);
		$this->M_proposal->input_laporan($where, 'penelitian', $data);
		redirect('reviewer/penelitian');
			}
	}
			
	public function tambah_ulasan_pengabdian(){
		if($this->session->userdata('status') == "reviewer1") {
			$nama = $this->session->userdata('username');
		$where = array('reviewer1' => $nama);
		$ulasan1		= $this->input->post('ulasan1');
		$data = array(
		'ulasan1'=>$ulasan1);
		$this->M_proposal->input_laporan($where, 'pengabdian', $data);
		redirect('reviewer/pengabdian');
			
		}else{
			$nama = $this->session->userdata('username');
		$where = array('reviewer2' => $nama);
		$ulasan2		= $this->input->post('ulasan2');
		$data = array(
		'ulasan2'=>$ulasan2);
		$this->M_proposal->input_laporan($where, 'pengabdian', $data);
		redirect('reviewer/pengabdian');
			}
	}

	public function detail_penelitian($id){
		//method yang nanti akan digunakan di model
		//untuk merubah data dari database
		$data['penelitian'] = $this->M_proposal->get_data($id,'penelitian');
		$this->load->view('pengguna/detail_penelitian', $data);
	}	
	
	public function detail_pengabdian($id){
		//method yang nanti akan digunakan di model
		//untuk merubah data dari database
		$data['pengabdian'] = $this->M_proposal->get_data($id,'pengabdian');
		$this->load->view('pengguna/detail_pengabdian', $data);
	}	
	 


}