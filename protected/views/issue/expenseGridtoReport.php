<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      title		</th>
 		<th width="80px">
		      description		</th>
 		<th width="80px">
		      company_id		</th>
 		<th width="80px">
		      assignedto		</th>
 		<th width="80px">
		      status		</th>
 		<th width="80px">
		      create_date		</th>
 		<th width="80px">
		      due_date		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->title; ?>
		</td>
       		<td>
			<?php echo $row->description; ?>
		</td>
       		<td>
			<?php echo $row->company_id; ?>
		</td>
       		<td>
			<?php echo $row->assignedto; ?>
		</td>
       		<td>
			<?php echo $row->status; ?>
		</td>
       		<td>
			<?php echo $row->create_date; ?>
		</td>
       		<td>
			<?php echo $row->due_date; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
