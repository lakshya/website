<STYLE TYPE="text/css" MEDIA="all">
<!--
  @import url(/css/tableSort.css);
-->
</STYLE>

Updated on: February 15, 2011
<br/>
<center>
<!-- old header row colour: bgcolor="#D7D6E9" -->
<!-- old body colour: bgcolor="#efefef" -->
<table id="test1" class="sortable-onload-5-reverse rowstyle-alt no-arrow" width="100%" border="0" cellspacing="1">
<thead>
	<tr>
		<th style="-moz-user-select: none;" class="fd-column-0 sortable-text"><a title="Sort on “Name”" href="#"><b>Name</b></th>
		<th style="-moz-user-select: none;" class="fd-column-1 sortable-numeric"><a title="Sort on “Batch”" href="#"><b>Batch</b></th>
		<th style="-moz-user-select: none;" class="fd-column-2 sortable-text"><a title="Sort on “Branch”" href="#"><b>Branch</b></th>
		<th style="-moz-user-select: none;" class="fd-column-3 sortable-numeric "><a title="Sort on “Amount”" href="#"><b>Amount</b></th>
		<th style="-moz-user-select: none;" class="fd-column-4 sortable-date-dmy"><a title="Sort on “Last Donated on”" href="#"><b>Last Donated on</b></th>
	</tr>
</thead>
<tbody>

<?foreach($data as $row):?>
	<tr class="">
		<td><?=$row->name?></td>
		<td><?=$row->batch?></td>
		<td><?=$row->branch?></td>
		<td><?=$row->donAmount?></td>
		<td><?=date('d/m/Y',strtotime($row->lastDon))?></td>
	</tr>
<?endforeach?>

</tbody>
	</table>
</center>
<script type="text/javascript" src="/scripts/tablesort.js"></script>
