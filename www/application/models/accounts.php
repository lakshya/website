<?php
Class Accounts_Model extends Model{

	function allDonations()
	{
		return $this->db->query('select A.donorId, C.name as name, B.passedOut as batch, B.branch as branch, sum(A.amount) as donAmount, max(A.donDate) as lastDon from lakshya_donation A, lakshya_account C, lakshya_donor B where B.donorId = A.donorId and B.userId = C.userId group by A.donorId order by lastDon desc');
		
	}
}
?>