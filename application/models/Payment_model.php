<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_model extends CI_Model {

public function __construct()
{
	parent::__construct();
}

public function fetchCustomerData($customerid)
{
	$this->db->select('*');
	$this->db->where('customer_id',$customerid);
	$this->db->where('customer_status','Enable');
	$query=$this->db->get('customers');
	return $query->row();
}

public function paymentInsert($data)
{
	$this->db->insert('payu_money_transaction',$data);
	return true;
}
}
?>