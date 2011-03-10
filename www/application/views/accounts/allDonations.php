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
				var rowcount = donTable.find('tbody tr:not(:hidden)').length;
				$('#rowcount').text('(' + rowcount + ' rows displayed)');
			}
			
			donTable.tableFilter(options1);
			setRowCountOnDonTable();
	});
    </script>
<!-- Table sorting: http ://www.frequency-decoder.com/-->
<!-- Table filtering: http ://www.picnet.com.au/picnet_table_filter.html-->
<br/>
<center>
<table width="100%">
<tr>
<td>Quick Find: <input type="text" id="quickfind"/></td>
<td><div align="right">Updated on: March 09, 2011</div></td>
</tr>
</table>

<span id='rowcount'></span>
<!-- old header row colour: bgcolor="#D7D6E9" -->
<!-- old body colour: bgcolor="#efefef" -->
<table id="donTable" class="sort sortable-onload-5-reverse rowstyle-alt no-arrow" width="100%" border="0" cellspacing="1">
<thead>
	<tr class="sort">
		<th filter-type='text' class="sort fd-column-0 sortable-text"><a title="Sort on “Name”" href="#"><b>Name</b></th>
		<th filter-type='ddl' class="sort fd-column-1 sortable-numeric" width="15%"><a title="Sort on “Batch”" href="#"><b>Batch</b></th>
		<th filter-type='ddl' class="sort fd-column-2 sortable-text" width="15%"><a title="Sort on “Branch”" href="#"><b>Branch</b></th>
		<th filter-type='text' class="sort fd-column-3 sortable-numeric "><a title="Sort on “Amount”" href="#"><b>Amount</b></th>
		<th filter-type='text' class="sort fd-column-4 sortable-date-dmy"><a title="Sort on “Last Donated on”" href="#"><b>Last Donated on</b></th>
	</tr>
</thead>
<tbody>

<?foreach($data as $row):?>
	<tr class="sort">
		<td class="sort"><?=$row->name?></td>
		<td class="sort"><?=$row->batch?></td>
		<td class="sort"><?=$row->branch?></td>
		<td class="sort"><?=$row->donAmount?></td>
		<td class="sort"><?=date('d/m/Y',strtotime($row->lastDon))?></td>
	</tr>
<?endforeach?>

</tbody>
	</table>
</center>
<script type="text/javascript" src="/scripts/tablesort.js"></script>
