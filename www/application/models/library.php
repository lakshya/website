<?php
Class Library_Model extends Model
{
	function emailExists($email)
	{
		$this->db->from('lib_donor')->where('email', $email);
		$result = $this->db->get()->result(FALSE);
		if(!$result) return FALSE;
		return $result[0]['donor_id'];
	}
	
	function getDonorDetails($donorId)
	{
		$data = $this->db->from('lib_donor')->where('donor_id', $donorId)->get();
		return $data[0];
	}
	
	function getDonationsByDonor($id)
	{
		return $this->db->from('lib_view')->where('donor_id', $id)->orderby('book_id', 'DESC')->get();
	}
	
	function recentDonations()
	{
		return $this->db->from('lib_view')->orderby('book_id', 'DESC')->limit(5, 0)->get();
	}

	function donateBook($data)
	{
		$donorId = $this->emailExists($data['email']);
		if(!$donorId)
		{
			$result = $this->db->insert('lib_donor', array('name' => $data['name'], 'mobile' => $data['mobile'], 'email' => $data['email'], 'address' => $data['address']));
			$id = $result->insert_id();
		}
		else $id = $donorId;
		
		$count = count($data['title']);
		for($i=0;$i<$count;$i++)
		{
			$res = $this->db->insert('lib_book', array('donor_id' => $id,
	                                                     'title' => $data['title'][$i], 
	                                                     'author' => $data['author'][$i], 
	                                                     'typeOfBook' => $data['typeOfBook'][$i], 
	                                                     'donDate' => $data['donDate'][$i]));
		}
		return true;
	}

	function donDetails()
	{
		return $this->db->query('SELECT * FROM lakshya_lib_view ORDER BY book_id DESC');
	}

	function getBookDetails($book_id)
	{
		$this->db->select('*')->from('lib_book')->where('book_id',$book_id);
		$r = $this->db->get()->result(FALSE);
		return $r[0];
	}
	
	function getStatistics()
	{
		$data['non'] = $this->db->count_records('lib_book', array('typeOfBook' => 'non'));
		$data['cur'] = $this->db->count_records('lib_book', array('typeOfBook' => 'cur'));
		$data['donors'] = count($this->db->query('SELECT DISTINCT donor_id FROM lakshya_lib_book'));
		return $data;
	}
}
?>