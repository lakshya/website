<?php
class Admin_Model extends Model {

	function donAdd($data)
	{
			$result = $this->db->insert('account', array('username' => $data['username'],
															'password' => text::random(),
															'email'  => $data['email'],
															'name' => $data['name'],
															'accType' => 'CMP',
															'addr' => $data['addr'],
															'city' => $data['city'],
															'province' => $data['province'],
															'zipcode' => $data['pincode'],
															'country' => $data['country'],
															'mobile' => $data['mobile']));
						
			$id = $result->insert_id();
			
			if($data['cat'] == 'OTH' || $data['passedOut'] == 0) $data['passedOut'] = NULL;
			$result = $this->db->insert('donor', array('userId' => $id,
															'donorCat' => $data['cat'],
															'branch' => $data['branch'],
															'passedOut' => $data['passedOut'],
															'rollNo' => $data['rollNo'],
															'occupation' => $data['occupation'],
															'remarks' => $data['remarks']
															));
			$donorId = $result->insert_id();

			$result = $this->db->insert('donation', array('donorId' => $donorId,
															'amount' => $data['donAmount'],
															'donDate' => $data['donDate'],
															'donMode' => $data['donMode'],
															'details' => $data['donDetails']
															));
			return $result->insert_id();
															
	}
	
	function already()
	{
		$result = $this->db->query('SELECT a.name, a.userId, a.email, b.passedOut FROM lakshya_account a, lakshya_donor b WHERE a.userId = b.userId ORDER BY name ASC');
		return $result;
	}
	
	function getDonor($userId)
	{
		$this->db->select('*')->from('account')->where('userId', $userId);
		$res = $this->db->get()->result(FALSE);
		$res = $res[0];
		return $res;
	}
	
	function donAdd2($data, $userId)
	{
		$this->db->select('*')->from('donor')->where('userId',$userId);
		$r = $this->db->get()->result(FALSE);
		$r = $r[0];
		$donorId = $r['donorId'];
		
		$result = $this->db->insert('donation', array('donorId' => $donorId,
													'amount' => $data['donAmount'],
													'donDate' => $data['donDate'],
													'donMode' => $data['donMode'],
													'details' => $data['donDetails']
													));
		return $result->insert_id();
	}
	
	function changePasswd($user, $passwd)
	{
		$this->db->update('account',array('password' => $passwd), array('username' => $user));
	}
	
	function getDonDetails($userId)
	{
		return $this->db->query('SELECT * FROM lakshya_account a, lakshya_donor b WHERE a.userId = b.userId and a.userId = '.$userId);
	}
	
	function editDonor($userId, $data)
	{
		$this->db->update('account', array('name' => $data['name'],
											'username' => $data['username'],
											'email' => $data['email'],
											'addr' => $data['addr'],
											'city' => $data['city'],
											'province' => $data['province'],
											'country' => $data['country'],
											'zipcode' => $data['pincode'],
											'mobile' => $data['mobile']),
									array('userId' => $userId));
									
        $this->db->update('donor', array('donorCat' => $data['cat'],
										'branch' => $data['branch'],
										'rollNo' => $data['rollNo'],
										'passedOut' => $data['passedOut'],
										'occupation' => $data['occupation'],
										'remarks' => $data['remarks']),
									array('userId' => $userId));
	}
	
	function delDonor($userId)
	{
		$this->db->where('userId',$userId)->delete('account');
	}

        function emailExists($email)
	{
		$this->db->from('account')->where('email', $email);
		$result = $this->db->get();
		return (count($result)>0) ? TRUE : FALSE;
	}


}
?>