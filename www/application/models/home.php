<?php
Class Home_Model extends Model{

	function getScholars()
	{
		$c = $this->db->select('count(*) as c')->from('scholar')->get()->result(FALSE);

		$result = $this->db->select('*')->from('scholar')->get()->result(FALSE);
		for($i=0; $i < $c[0]['c']; $i++)
		$str = implode('##', $result[$i]);
		
		return $str;
	}
	
	function addAvenue($values)
	{
		$result = $this->db->insert("ccavenue", array('amount' => $values['Amount'],
													'ccDate' => date('Y-m-d')));
		$id = $result->insert_id();
		return $id;
	}
}
?>