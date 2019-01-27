<?php 
class M_admin extends CI_Model{
	// ambil barang
	function tampil_barang(){
		return $this->db->get('barang');
	}
	function tampil_anggota(){
		return $this->db->get('anggota');
	}
	function tampil_pinjam(){
		return $this->db->get('pinjam_barang');
	}
	function ambil_row($id){
		return $this->db->get_where('barang',array('id'=>$id));
	}
	function ambil_anggota($nip){
		return $this->db->get_where('anggota',array('nip'=>$nip));
	}
	function get_anggota($nip){
		$hsl=$this->db->get_where('anggota',array('nip'=>$nip));
		return $hsl;
	}
	function get_brg($id){
		$hsl=$this->db->get_where('barang',array('id'=>$id));
		return $hsl;
    }

	// function tambah_pinjam(){
	// 	$result=$this->db->insert('berkas',$data);
	// }

	function tampil_kembali(){
		return $this->db->get('kembali_barang');
	}
}
?>