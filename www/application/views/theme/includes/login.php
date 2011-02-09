<div class="Block">
    <div class="Block-tl"></div>
    <div class="Block-tr"></div>
                            <div class="Block-bl"></div>
                            <div class="Block-br"></div>
                            <div class="Block-tc"></div>
                            <div class="Block-bc"></div>
                            <div class="Block-cl"></div>
                            <div class="Block-cr"></div>
                            <div class="Block-cc"></div>                       
                            <?php
									switch($this->session->get('type'))
									{
										case 'ADM': include('admin.php');break;
										case 'CMP': include('donor.php');break;
										case 'STD': include('scholar.php');break;
										default: include('guest.php');
									}
							?>
</div>
						
