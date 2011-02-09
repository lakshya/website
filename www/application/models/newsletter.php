<?php
Class Newsletter_Model extends Model{

	function add($email, $key)
	{
		$this->db->insert('newsletter',array('email' => $email,
												'confirmKey' => $key,
												'mailTime' => date('Y-m-d H:i:s'),
												'status' => 'pending'));
												
	}
	
	function confirm($email, $key)
	{
		$result = $this->db->select('*')->from('newsletter')->where('email',$email)->get()->result(FALSE);
		$result = $result[0];
		if(!$result) return FALSE;
		if($result['confirmKey'] != $key) return FALSE;
		if((mktime() - strtotime($result['mailTime'])) > 14*24*60*60) return FALSE; // after 2 weeks the link must expire
		
		$this->db->update('newsletter', array('status' => 'active'),array('email' => $result['email']));
		return TRUE;
	}
	
	function getEmail($email)
	{
		$result = $this->db->select('email')->from('newsletter')->where('email', $email)->get();
		return count($result);
	}
}
?>