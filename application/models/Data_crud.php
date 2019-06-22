<?php 
class Data_crud extends CI_Model {

 function tampil_datarute(){
   return $this->db->get('rute');
 }
  function tampil_datauser(){
   return $this->db->get('tuser');
 }
 
 function input_datarute($data,$table){
   $this->db->insert($table,$data);
 } 

 function cek_login($table,$where){
   return $this->db->get_where($table, $where);
 }

 function hapus_datarute($where,$table){
  $this->db->where($where);
  $this->db->delete($table);
}

function edit_datarute($where,$table){  
  return $this->db->get_where($table,$where);
}

function update_datarute($where,$data,$table){
 $this->db->where($where);
 $this->db->update($table,$data);
}

function tampil_datatransportation(){
  return $this->db->get('transportation');
}

function reservasi(){
  return $this->db->get('reservation');
}


function detailreservasi($where){
  $this->db->select('*,from.nama as from, from.kota as kotafrom, from.kode as kodefrom, to.kode as kodeto, to.nama as to, to.kota as kotato');
  $this->db->from('transportation,rute,reservation,airport as from, airport as to');
  $this->db->where('reservation.kd_resv',$where);
  $this->db->where('reservation.rute_id = rute.id');
  $this->db->where('rute.rute_from = from.nama');
  $this->db->where('rute.rute_to = to.nama');
  $this->db->where('rute.transportationid = transportation.id');
  return $this->db->get();
}

function detailcustomer($where){
  $this->db->select('*');
  $this->db->from('customer');
  $this->db->where('customer.kd_resv',$where);
  return $this->db->get();
}

function tampil_databandara(){
  return $this->db->get('airport');
}

function tampil_rute($from,$to,$date){
 $this->db->select("rute.id,rute.depart_at,rute.rute_from,rute.rute_to,rute.price,transportation.description");
 $this->db->from('rute');
 $this->db->join('transportation', 'transportation.id = rute.transportationid');
 $this->db->where('rute.rute_from', $from);
 $this->db->where('rute.rute_to', $to);
 $this->db->where('rute.date', $date);
 $query = $this->db->get();
 return $query->result();
}

function join_rutemaskapai(){
 $this->db->select("rute.id,rute.date,rute.depart_at,rute.rute_from,rute.rute_to,rute.price,transportation.description");
 $this->db->from('rute');
 $this->db->join('transportation', 'transportation.id = rute.transportationid');
 $query = $this->db->get();
 return $query->result();
}

function join_clientreserve($where){
 $this->db->select("rute.id,rute.date,rute.depart_at,rute.rute_from,rute.rute_to,rute.price,transportation.description,transportation.code");
 $this->db->from('rute');
 $this->db->join('transportation', 'transportation.id = rute.transportationid');
 $this->db->where('rute.id', $where);
 $query = $this->db->get();
 return $query->result();
}

function input_datatransport($data,$table){
 $this->db->insert($table,$data);
}

function input_datareservation($data,$table){
 $this->db->insert($table,$data);
}

function input_databandara($data,$table){
 $this->db->insert($table,$data);
}

function hapus_datatransportation($where,$table){
  $this->db->where($where);
  $this->db->delete($table);
}

function edit_datatransportation($where,$table){  
  return $this->db->get_where($table,$where);
}

function update_datatransportation($where,$data,$table){
 $this->db->where($where);
 $this->db->update($table,$data);
}

function seat($id){
  $this->db->select('transportation.seat_qty');
  $this->db->from('rute,transportation');
  $this->db->where('rute.transportationid = transportation.id');
  $this->db->where('rute.id', $id);
  return $this->db->get();
}

function filterseat($id){
  $this->db->select('seat');
  $this->db->where('reservation.rute_id',$id);
  $this->db->where('reservation.kd_resv = customer.kd_resv');
  return $this->db->get('customer,reservation');
}

function confirmation($where){
  $this->db->select('*,from.nama as from, to.nama as to, from.kode as kodefrom, from.kota as kotafrom, to.kode as kodeto, to.kota as kotato ');
  $this->db->from('reservation,transportation,rute, airport as from, airport as to');
  $this->db->where('rute.rute_from = from.nama');
  $this->db->where('rute.rute_to = to.nama');
  $this->db->where('reservation.rute_id = rute.id');
  $this->db->where('reservation.kd_resv',$where);
  $this->db->where('transportation.id = rute.transportationid');
  return $this->db->get();
}
function datacustomer($where){
  $this->db->select('customer.nama,customer.jenkel,customer.seat');
  $this->db->from('reservation,customer');
  $this->db->where('reservation.kd_resv = customer.kd_resv');
  $this->db->where('customer.kd_resv',$where);
  return $this->db->get();
}


function insert_img($where,$data){
 $this->db->where($where);
 $this->db->update('reservation',$data);
}

function confirm($where,$data){
 $this->db->where($where);
 $this->db->update('reservation',$data);
}
} 
?>