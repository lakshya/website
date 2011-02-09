<?php
class Donor_Model extends Model {

	function getDonations($username)
	{
		$this->db->select('userId')->from('account')->where('username', $username);
		$res = $this->db->get()->result(FALSE);
		$res = $res[0];
		$userId = $res['userId'];
		
		$this->db->select('donorId')->from('donor')->where('userId', $userId);
		$res = $this->db->get()->result(FALSE);
		$res = $res[0];
		$donorId = $res['donorId'];
		
		return $this->db->query('SELECT * FROM lakshya_donation WHERE donorId = '.$donorId);
	}

        function getDonDetails($username)
        {
                $this->db->select('*')->from('donorView')->where('username', $username);
		$res = $this->db->get()->result(FALSE);
		return $res[0];
        }

        function editProfile($username, $data)
        {
                $this->db->update('account', array('name' => $data['name'],
						'email' => $data['email'],
						'addr' => $data['addr'],
						'city' => $data['city'],
						'province' => $data['province'],
						'country' => $data['country'],
						'zipcode' => $data['zipcode'],
						'mobile' => $data['mobile']),
						array('username' => $username));
									
                $this->db->select('userId')->from('account')->where('username', $username);
		$res = $this->db->get()->result(FALSE);
		$res = $res[0];
		$userId = $res['userId'];

                $this->db->update('donor', array('branch' => $data['branch'],
					'rollNo' => $data['rollNo'],
					'passedOut' => $data['passedOut'],
					'occupation' => $data['occupation']),
				        array('userId' => $userId));

        }

        function changePasswd($username, $data)
        {
                $this->db->update('account', array('password' => $data['newPasswd']), array('username' => $username));
        }

        function getPasswd($username)
        {
                $this->db->select('password')->from('account')->where('username', $username);
		$res = $this->db->get()->result(FALSE);
		return $res[0];
        }

        function emailExists($email)
	{
		$this->db->from('account')->where('email', $email);
		$result = $this->db->get();
		return (count($result)>0) ? TRUE : FALSE;
	}

}
?>