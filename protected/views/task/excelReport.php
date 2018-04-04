<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      name		</th>
 		<th width="80px">
		      project		</th>
 		<th width="80px">
		      startdate		</th>
 		<th width="80px">
		      enddate		</th>
 		<th width="80px">
		      assignedto		</th>
 		<th width="80px">
		      quantity		</th>
 		<th width="80px">
		      time		</th>
 		<th width="80px">
		      module		</th>
 		<th width="80px">
		      ref_id		</th>
 		<th width="80px">
		      status		</th>
 		<th width="80px">
		      percent_complete		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->name; ?>
		</td>
       		<td>
			<?php echo $row->project; ?>
		</td>
       		<td>
			<?php echo $row->startdate; ?>
		</td>
       		<td>
			<?php echo $row->enddate; ?>
		</td>
       		<td>
			<?php echo $row->assignedto; ?>
		</td>
       		<td>
			<?php echo $row->quantity; ?>
		</td>
       		<td>
			<?php echo $row->time; ?>
		</td>
       		<td>
			<?php echo $row->module; ?>
		</td>
       		<td>
			<?php echo $row->ref_id; ?>
		</td>
       		<td>
			<?php echo $row->status; ?>
		</td>
       		<td>
			<?php echo $row->percent_complete; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
