<?
if($this->session->get('message'))
	echo '<div class="message">', $this->session->get('message'),'</div><br/>';
?>