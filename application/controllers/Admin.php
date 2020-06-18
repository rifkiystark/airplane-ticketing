<?php
class Admin extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('data_crud');
   $this->load->helper('url');

   if($this->session->userdata('status') != "login"){
     redirect(base_url("login"));
   }
 }

 function index(){
  $fullname = $this->session->userdata('name');
  $where = array('username' => $fullname);
  $data['user'] = $this->data_crud->cek_login('tuser',$where)->result();

  $this->load->view('v_admin',$data);
}

function rute(){
  $data['maskapai'] = $this->data_crud->tampil_datatransportation()->result();
  $data['bandara'] = $this->data_crud->tampil_databandara()->result();
  $this->load->view('v_rute',$data);
}

function datarute(){
  $query = $this->data_crud->join_rutemaskapai();
  $data['rute'] = null;
  if($query){
   $data['rute'] =  $query;
 }

 $this->load->view('v_rute_data', $data);
}

function hapus_rute($id){
  $where = array('id' => $id);
  $this->data_crud->hapus_datarute($where,'rute');
  redirect('admin/datarute');
}

function proses_tambahrute(){
  $date = $this->input->post('date');
  $depart = $this->input->post('depart');
  $rute_from = $this->input->post('rutefrom');
  $rute_to = $this->input->post('ruteto');
  $price = $this->input->post('price');
  $maskapai = $this->input->post('maskapai');

  $data = array(
    'date' => $date,
    'depart_at' => $depart,
    'rute_from' => $rute_from,
    'rute_to' => $rute_to,
    'price' => $price,
    'transportationid' => $maskapai
  );

  $this->data_crud->input_datarute($data,'rute');
  redirect('admin/rute');
}

function proses_tambahbandara(){
  $kode = $this->input->post('kode');
  $nama = $this->input->post('nama');
  $kota = $this->input->post('kota');

  $data = array(
    'kode' => $kode,
    'nama' => $nama,
    'kota' => $kota
  );

  $this->data_crud->input_databandara($data,'airport');
  redirect('admin/bandara');
}

function edit_rute($id){
  $where = array('id' => $id);
  $data['maskapai'] = $this->data_crud->tampil_datatransportation()->result();
  $data['rute'] = $this->data_crud->edit_datarute($where,'rute')->result();
  $this->load->view('v_rute_edit',$data);
}

function edit_user($id){
  $where = array('id' => $id);
  $data['user'] = $this->data_crud->edit_datarute($where,'tuser')->result();
  $this->load->view('v_user_edit',$data);
}

function update_rute(){
 $id = $this->input->post('id');
 $date = $this->input->post('date');
 $depart = $this->input->post('depart');
 $rute_from = $this->input->post('rutefrom');
 $rute_to = $this->input->post('ruteto');
 $price = $this->input->post('price');  
 $maskapai = $this->input->post('maskapai');

 $data = array(
  'date' => $date,
  'depart_at' => $depart,
  'rute_from' => $rute_from,
  'rute_to' => $rute_to,
  'price' => $price,
  'transportationid' => $maskapai
);

 $where = array(
   'id' => $id
 );

 $this->data_crud->update_datarute($where,$data,'rute');
 redirect('admin/datarute');
}

function datamaskapai(){
  $data['transportation'] = $this->data_crud->tampil_datatransportation()->result();
  $this->load->view('v_maskapai_data',$data);
}

function databandara(){
  $data['bandara'] = $this->data_crud->tampil_databandara()->result();
  $this->load->view('v_bandara_data',$data);
}

function datauser(){
  $data['user'] = $this->data_crud->tampil_datauser()->result();
  $this->load->view('v_user_data',$data);
}

function maskapai(){
  $this->load->view('v_maskapai');
}

function hapus_transport($id){
  $where = array('id' => $id);
  $this->data_crud->hapus_datatransportation($where,'transportation');
  redirect('admin/datamaskapai');
}

function hapus_user($id){
  $where = array('id' => $id);
  $this->data_crud->hapus_datatransportation($where,'tuser');
  redirect('admin/datauser');
}

function proses_tambahtransport(){
  $kode = $this->input->post('kode');
  $deskripsi = $this->input->post('deskripsi');
  $seat_qty = $this->input->post('seat_qty');


  $data = array(
   'code' => $kode,
   'description' => $deskripsi,
   'seat_qty' => $seat_qty
 );

  $this->data_crud->input_datarute($data,'transportation');
  redirect('admin/maskapai');
}

function edit_transport($id){
  $where = array('id' => $id);
  $data['transport'] = $this->data_crud->edit_datatransportation($where,'transportation')->result();
  $this->load->view('v_maskapai_edit',$data);
}

function edit_bandara($id){
  $where = array('id' => $id);
  $data['bandara'] = $this->data_crud->edit_datatransportation($where,'airport')->result();
  $this->load->view('v_bandara_edit',$data);
}

function update_transportation(){
 $id = $this->input->post('id');
 $kode = $this->input->post('kode');
 $deskripsi = $this->input->post('deskripsi');
 $seat_qty = $this->input->post('seat_qty');

 $data = array(
   'code' => $kode,
   'description' => $deskripsi,
   'seat_qty' => $seat_qty
 );

 $where = array(
   'id' => $id
 );

 $this->data_crud->update_datatransportation($where,$data,'transportation');
 redirect('admin/maskapai');
}

function bandara(){
  $this->load->view('v_bandara');
}

function update_bandara(){
  $id = $this->input->post('id');
  $kode = $this->input->post('kode');
  $nama = $this->input->post('nama');
  $kota = $this->input->post('kota');

  $data = array(
    'kode' => $kode,
    'nama' => $nama,
    'kota' => $kota
  );

  $where = array(
    'id' => $id
  );

  $this->data_crud->update_datarute($where,$data,'airport');
  redirect('admin/databandara');
}

function reservasi(){
  $data['resv'] = $this->data_crud->reservasi()->result();
  $this->load->view('v_reservasi',$data);
}

function detail($id){
  $data['resv'] = $this->data_crud->detailreservasi($id)->result();
  $data['cust'] = $this->data_crud->detailcustomer($id)->result();
  $this->load->view('v_reservasi_detail',$data);
}

function confirm(){

  $kode = $this->input->post('kode');
  $length = 5;
  $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $kd_book = '';
  for ($i = 0; $i < $length; $i++) {
    $kd_book .= $characters[rand(0, $charactersLength - 1)];
  }

  $where = array(
    'kd_resv' => $kode
  );
  $data = array(
    'status' => 'Sukses',
    'kd_book' => $kd_book
  );
  $this->data_crud->confirm($where,$data);

  redirect('admin/reservasi');
}

function user(){
  $this->load->view('v_user');
}

function tambahuser(){
  $username = $this->input->post('username');
  $password = md5($this->input->post('password'));
  $fullname = $this->input->post('fullname');
  $level = $this->input->post('level');

  $data = array(
    'username' => $username,
    'password' => $password,
    'fullname' => $fullname,
    'level' => $level
  );

  $this->data_crud->input_databandara($data,'tuser');
  redirect('admin/user');
}
}