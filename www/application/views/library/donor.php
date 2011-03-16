<STYLE TYPE="text/css" MEDIA="all">
<!--
  @import url(/css/tableSort.css);
-->
</STYLE>
    <script src="http://ajax.microsoft.com/ajax/jquery/jquery-1.3.2.min.js" type="text/javascript"></script>    		    
    <script type="text/javascript" src="/scripts/tablefilter.js"></script>	
    <script type="text/javascript"> 
	//For table filter plugins - Quickfind and RowCount
	$(document).ready(function() {

		var donTable = $('#donTable');
		var rowcount;
            // Initialise Plugin
            var options1 = {
                additionalFilterTriggers: [$('#quickfind')],
		filteredRows: function(filterStates)
		{      															
		donTable.removeClass('filtering');					
		setRowCountOnDonTable();
                }

            };

			function setRowCountOnDonTable() {
				rowcount = donTable.find('tbody tr:not(:hidden)').length;
				if(rowcount==1)
					$('#rowcount').text('(' + rowcount + ' title displayed)');
				else
					$('#rowcount').text('(' + rowcount + ' titles displayed)');
			}
			
			donTable.tableFilter(options1);
			setRowCountOnDonTable();
	});


    </script>
<!-- Table sorting: http ://www.frequency-decoder.com/-->
<!-- Table filtering: http ://www.picnet.com.au/picnet_table_filter.html-->
<br/>
Quick Find: <input type="text" id="quickfind"/>
<center>
<center><span id='rowcount'></span></center>
<table id="donTable" width="100%" class="sort sortable-onload-5-reverse rowstyle-alt no-arrow" border="0" class="coTab" cellspacing="1">
<thead>
	<tr class="sort">
		<th filter-type='text' class="sort fd-column-0 sortable-text"><a title="Sort on “Book Title”" href="#"><b>Book Title</b></a></th>
		<th filter-type='text' class="sort fd-column-1 sortable-text"><a title="Sort on “Author”" href="#"><b>Author</b></a></th>
		<th filter-type='text' class="sort fd-column-2 sortable-text"><a title="Sort on “Status”" href="#"><b>Status</b></a></th>
	</tr>
</thead>
	<?foreach($data as $row):?>
	<tr class="sort">
		<td  class="sort">
		<?php echo $row->title; if($row->copies > 1) echo " (<span title=\"Number of Copies\"><i>{$row->copies} copies</i></span>)"?>
		</td>
		<td class="sort"><?=$row->author?></td>
		<?if($row->status == "NO"):?>
		<?if($row->donDate == "0000-00-00"):?>
		<td class="sort">Pledged</td>
		<?elseif($row->donDate < date('Y-m-d')):?>
		<td class="sort"><font style='color: red'>
		<?="Pledged for ".date('jS  M,  Y',strtotime($row->donDate))?></font></td>
		<?else:?>
		<td class="sort"><?="Pledged for ".date('jS  M,  Y',strtotime($row->donDate))?></td>
		<?endif?>
		<?elseif($row->status == "YES"):?>
		<td class="sort"><?="<font style='color:green'>Donated on ".date('jS  M,  Y',strtotime($row->donDate))."</font>"?></td>
		<?endif?>
	</tr>
	<?endforeach?>
</table>

</center>
<script type="text/javascript" src="/scripts/tablesort.js"></script>
