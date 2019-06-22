<?php 

class Client extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('data_crud');
		$this->load->helper(array('form','url'));
	}

	function index(){
		$data['bandara'] = $this->data_crud->tampil_databandara()->result();
		$this->load->view('v_client',$data);
	}

	public function carirute(){
		$from = $this->input->get('from');
		$to = $this->input->get('to');
		$qty = $this->input->get('qty');
		$date = $this->input->get('date');

		$query = $this->data_crud->tampil_rute($from, $to, $date);
		$data['rute'] = $query;
		$this->load->view('v_client_rutes',$data,$qty);
	}

	public function reservation($id){
		$where =  $id;
		$query = $this->data_crud->join_clientreserve($where);
		$data['seat'] = $this->data_crud->seat($where)->result();
		$data['filter'] = $this->data_crud->filterseat($where)->result();
		$data['reserve'] = null;
		if($query){
			$data['reserve'] =  $query;
		}
		$this->load->view('v_client_reserv',$data);
	}

	public function pesan(){
		$rute_id = $this->input->post('rute_id');
		$namapemesan = $this->input->post('namapemesan');
		$alamatpemesan = $this->input->post('alamatpemesan');
		$emailpemesan = $this->input->post('emailpemesan');
		$notelpemesan = $this->input->post('notelpemesan');
		$jenkelpenumpang = $this->input->post('jenkelpenumpang');
		$namapenumpang = $this->input->post('namapenumpang');


		$qty = $this->input->post('qty');


		$length = 10;
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$kd_resv = '';
		for ($i = 0; $i < $length; $i++) {
			$kd_resv .= $characters[rand(0, $charactersLength - 1)];
		}
		$value = $this->input->post('kursi');
		$no = 0;
		
		foreach ($value as $seat) {
			$namaseat[$no] = $seat;
			$no++;
		}
		for ($i=0; $i < $qty; $i++) { 
			$data= array(
				'jenkel' => $this->input->post('jenkelpenumpang['.$i.']'),
				'nama' => $this->input->post('namapenumpang['.$i.']'),
				'kd_resv' => $kd_resv,
				'seat' => $namaseat[$i]
			);

			$this->data_crud->input_datareservation($data,'customer');
		}

		$data = array(
			'rute_id' => $rute_id,
			'kd_resv' => $kd_resv,
			'namapemesan' => $namapemesan,
			'alamatpemesan' => $alamatpemesan,
			'emailpemesan' => $emailpemesan,
			'notelpemesan' => $notelpemesan,
			'status' => 'Menunggu Pembayaran'
		);
		
		$this->data_crud->input_datareservation($data,'reservation');
		
		redirect('client/confirmation/'.$kd_resv);
	}

	public function confirmation($kd_resv){
		$kode = $kd_resv;
		$where = array( 'kd_resv' => $kode );
		$data['conf'] = $this->data_crud->confirmation($kode)->result();
		$data['cust'] = $this->data_crud->datacustomer($kode)->result();
		$this->load->view('v_client_con',$data,array('error' => ''));
	}

	function upload($kd_resv){
		$nama = $kd_resv;
		$config['upload_path']	= './r/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '4048';
		$config['max_height'] = '4048';
		$config['file_name'] = $nama;
		$this->load->library('upload',$config);

		if(! $this->upload->do_upload('berkas')){
			
			echo "error";
		}else{
			$gbr = $this->upload->data();
			$format = str_replace('image', '',$gbr['file_type']);
			$where = array('kd_resv' => $nama);
			$data = array(
				'img' => $gbr['file_name'],
				'status' => "Menunggu Konfirmasi");
			$this->data_crud->insert_img($where,$data);
			redirect('client/cariresv2/'.$nama);
		}
	}
	function email(){
		$config	= array(
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.googlemail.com',
			'smtp_port' => '25',
			'smtp_user' => 'ananda.rifkiy32',
			'smtp_pass' => 'ananda100%ganteng',
			'mailtype' => 'text',
			'charset' => 'utf-8',
			'smtp_timeout' => '7',
			'newline' => "\r\n"
		);

		$this->load->library('email',$config);
		$this->email->from('ananda.rifkiy32@gmail.com','Ananda Rifkiya');
		$this->email->to('ananda.rifkiy32@gmail.com');
		$this->email->subject('tes');
		$this->email->message('wkawaw');
		
		if(!$this->email->send()){
			show_error($this->email->print_debugger());
		}else{
			echo "dadi";
		}

	}

	function status(){
		$this->load->view('v_client_status');
	}

	function cariresv(){
		$id = $this->input->post('kdreservasi');
		$data['resv'] = $this->data_crud->detailreservasi($id)->result();
		$data['cust'] = $this->data_crud->detailcustomer($id)->result();
		$this->load->view('v_client_detail',$data);
	}

	function upload2(){
		$nama = $this->input->post('kode');
		$config['upload_path']	= './r/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = '2048';
		$config['max_width'] = '4048';
		$config['max_height'] = '4048';
		$config['file_name'] = $nama;
		$this->load->library('upload',$config);

		if(! $this->upload->do_upload('berkas')){
			
			echo "error";
		}else{
			$gbr = $this->upload->data();
			$format = str_replace('image', '',$gbr['file_type']);
			$where = array('kd_resv' => $nama);
			$data = array(
				'img' => $gbr['file_name'],
				'status' => "Menunggu Konfirmasi");
			$this->data_crud->insert_img($where,$data);
			redirect('client/cariresv2/'.$nama);
		}
	}


	function cariresv2($kode){
		$id = $kode;
		$data['resv'] = $this->data_crud->detailreservasi($id)->result();
		$data['cust'] = $this->data_crud->detailcustomer($id)->result();
		$this->load->view('v_client_detail',$data);
	}
} 
?>