<?php 
class Newsletter_Unsubscription_Model extends ORM {
	
	protected $belongs_to = array('subscription' => 'newsletter_subscription');
}
?>