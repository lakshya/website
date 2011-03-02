<STYLE TYPE="text/css" MEDIA="all">
<!--
  @import url(/css/tableSort.css);
-->
</STYLE>
<script type="text/javascript" src="/scripts/tablefilter.js"></script>
Updated on: February 15, 2011
<br/>
<center>
<!-- old header row colour: bgcolor="#D7D6E9" -->
<!-- old body colour: bgcolor="#efefef" -->
<table id="donTable" class="sort sortable-onload-5-reverse rowstyle-alt no-arrow" width="100%" border="0" cellspacing="1">
<thead>
	<tr class="sort">
		<th class="sort fd-column-0 sortable-text"><a title="Sort on “Name”" href="#"><b>Name</b></th>
		<th class="sort fd-column-1 sortable-numeric"><a title="Sort on “Batch”" href="#"><b>Batch</b></th>
		<th class="sort fd-column-2 sortable-text"><a title="Sort on “Branch”" href="#"><b>Branch</b></th>
		<th class="sort fd-column-3 sortable-numeric "><a title="Sort on “Amount”" href="#"><b>Amount</b></th>
		<th class="sort fd-column-4 sortable-date-dmy"><a title="Sort on “Last Donated on”" href="#"><b>Last Donated on</b></th>
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
<script language="javascript" type="text/javascript">
//<![CDATA[
	var table5_Props = 	{
					col_width: ["40%","10%","10%","20%","20%"],//prevents column width variations
					rows_counter: true,
					rows_counter_text: "Total rows: ",
					btn_reset: true,
					bnt_reset_text: "Clear all"
				};
	setFilterGrid( "donTable",table5_Props );
//]]>
</script>

</center>
<script type="text/javascript" src="/scripts/tablesort.js"></script>

