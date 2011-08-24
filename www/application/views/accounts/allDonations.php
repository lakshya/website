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
                filteringRows: function(filterStates) {										
					donTable.addClass('filtering');
                },
		filteredRows: function(filterStates)
		{      															
		donTable.removeClass('filtering');					
		setRowCountOnDonTable();
                }

            };

			function setRowCountOnDonTable() {
				rowcount = donTable.find('tbody tr:not(:hidden)').length;
				if(rowcount==1)
					$('#rowcount').text('(' + rowcount + ' row displayed)');
				else
					$('#rowcount').text('(' + rowcount + ' rows displayed)');
				//To calculate sum of donations
				var i;
				var sum=0;
				for(i=2;i<(document.getElementById('donTable').rows.length-1);i++)
				{
					if(document.getElementById('donTable').rows[i].style.display!='none')
						sum= sum + parseInt(document.getElementById('donTable').rows[i].cells[3].innerHTML,10);
				}
				document.getElementById('sum').innerHTML = sum;

			}
			
			donTable.tableFilter(options1);
			setRowCountOnDonTable();
	});


    </script>
<!-- Table sorting: http ://www.frequency-decoder.com/-->
<!-- Table filtering: http ://www.picnet.com.au/picnet_table_filter.html-->
<br/>
<center>
Quick Find: <input type="text" id="quickfind"/><span style="padding-left:45%" class="updatedOn">Updated on: August 1st, 2011</span>
<br/>
<span id='rowcount'></span>
<!-- old header row colour: bgcolor="#D7D6E9" -->
<!-- old body colour: bgcolor="#efefef" -->
<table id="donTable" class="sort sortable-onload-5-reverse rowstyle-alt no-arrow" width="100%" border="0" cellspacing="1">
<thead>
	<tr class="sort">
		<th filter-type='text' class="sort fd-column-0 sortable-text"><a title="Sort on “Name”" href="#"><b>Name</b></a></th>
		<th filter-type='ddl' class="sort fd-column-1 sortable-numeric" width="15%"><a title="Sort on “Batch”" href="#"><b>Batch</b></a></th>
		<th filter-type='ddl' class="sort fd-column-2 sortable-text" width="15%"><a title="Sort on “Branch”" href="#"><b>Branch</b></a></th>
		<th filter-type='text' class="sort fd-column-3 sortable-numeric "><a title="Sort on “Amount”" href="#"><b>Amount</b></a></th>
		<th filter-type='text' class="sort fd-column-4 sortable-date-dmy"><a title="Sort on “Last Donated on”" href="#"><b>Last Donated on</b></a></th>
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

  <tfoot>
	<tr class="sort">
		<td class="sort"></td>
		<td class="sort"></td>
		<td class="sort" style="color:green"><b>Sum</b></td>
		<td class="sort" style="color:green" id="sum"></td>
		<td class="sort"></td>
	</tr>
  </tfoot>


</tbody>
	</table>
</center>
<script type="text/javascript" src="/scripts/tablesort.js"></script>
