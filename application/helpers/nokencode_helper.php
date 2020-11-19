<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
* get __session
* @param String $session_key
* @return Any
*/
if ( ! function_exists('__session')) {
	function __session( $session_key ) {
		$CI = &get_instance();
		return $CI->session->userdata( $session_key );
	}
}
/**
* Data Persyaratan By Surat
* @param String
* @return Object
*/
if (!function_exists('syarat_by_surat')){
	function syarat_by_surat($idsurat)
	{
		$CI =& get_instance();
		return $CI->db->join('surat x1', 'x1.idsurat = x.surat_id', 'left')
		->where(['x.surat_id'=>$idsurat])
		->get('surat_syarat x')->result_array();
        
	}
}
/**
* Data Persyaratan By Pengajuan
* @param String
* @return Object
*/
if (!function_exists('syarat_by_ajuan')){
	function syarat_by_ajuan($idajuan)
	{
		$CI =& get_instance();
		return $CI->db->join('surat_syarat x1', 'x1.idsurat_syarat = x.surat_syarat_id', 'left')
		->where(['x.pengajuan_surat_id'=>$idajuan])
		->get('berkas x')->result_array();
        
	}
}
/**
* Check File
* @param String
* @return Object
*/
if (!function_exists('check_file')){
	function check_file($idpengajuan,$idsyarat)
	{
		$CI =& get_instance();
		return $CI->db->get_where('berkas',['pengajuan_surat_id'=>$idpengajuan,'surat_syarat_id'=>$idsyarat])->num_rows();
        
	}
}
/**
* Cek ID
* @param String
* @return Object
*/
if (!function_exists('check_id')){
	function check_id($table,$param,$id){
		$CI =& get_instance();
		return $CI->db->get_where($table,[$param=>$id])->num_rows();
	}
}
/**
* Surat
* @param String
* @return Object
*/
if (!function_exists('list_surat')){
	function list_surat(){
		$CI =& get_instance();
		return $CI->db->get('surat')->result_array();
	}
}
/**
* Jumlah Siswa
* @param String
* @return Object
*/
if (!function_exists('count_ajuan')){
	function count_ajuan($sts='all'){
		$CI =& get_instance();
		if($sts=='all'){
			return count($CI->db->get_where('pengajuan_surat',['status !=',$sts])->result());
		}
		return count($CI->db->get_where('pengajuan_surat',['status'=>$sts])->result());
	}
}
/**
* Check User
* @param String
* @return Array
*/
if (!function_exists('check_user')){
	function check_user($user){
		$CI =& get_instance();
		return $CI->db->get_where('users',['username'=>$user])->num_rows();
	}
}
/**
* User
* @param String
* @return Array
*/
if (!function_exists('user')){
	function user($id){
		$CI =& get_instance();
		return $CI->db->select('*')
		->join('users x1', 'x1.idusers = x.users_id')
		->where(['x.users_id'=>$id])
		->get('user_profile x')->row_array();
	}
}
/**
* Session login 
* @param String
* @return Boolean
*/
function is_logged_in()
{
	$ci =& get_instance();
	if (!$ci->session->userdata('username')) {
		redirect('auth');
	}
}
/**
* Cek Session login 
* @param String
* @return Boolean
*/
function is_logged_out()
{
	$ci =& get_instance();
	if ($ci->session->userdata('username')) {
		redirect('dashboard');
	}
}
/**
* Is a Natural number, but not a zero  (1,2,3, etc.)
* @param String $n
* @return Boolean
*/
if ( ! function_exists('_isNaturalNumber')) {
	function _isNaturalNumber( $n ) {
		return ($n != 0 && ctype_digit((string) $n));
	}
}

/**
* Is Integer
* @param String $n
* @return Boolean
*/
if ( ! function_exists('_toInteger')) {
	function _toInteger( $n ) {
		$n = abs(intval(strval($n)));
		return $n;
	}
}