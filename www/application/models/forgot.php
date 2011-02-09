<?php
Class Forgot_Model extends Model{
      function getDetails($email)
      {
          $result = $this->db->select('*')->from('account')->where('email',$email)->get()->result(FALSE);
	  return $result[0];
      }
}
?>