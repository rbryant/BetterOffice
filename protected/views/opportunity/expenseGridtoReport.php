<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      name		</th>
 		<th width="80px">
		      description		</th>
 		<th width="80px">
		      amount		</th>
 		<th width="80px">
		      type		</th>
 		<th width="80px">
		      category		</th>
 		<th width="80px">
		      owner		</th>
 		<th width="80px">
		      status		</th>
 		<th width="80px">
		      change_date		</th>
 		<th width="80px">
		      change_by		</th>
 		<th width="80px">
		      company		</th>
 		<th width="80px">
		      probability		</th>
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
			<?php echo $row->description; ?>
		</td>
       		<td>
			<?php echo $row->amount; ?>
		</td>
       		<td>
			<?php echo $row->type; ?>
		</td>
       		<td>
			<?php echo $row->category; ?>
		</td>
       		<td>
			<?php echo $row->owner; ?>
		</td>
       		<td>
			<?php echo $row->status; ?>
		</td>
       		<td>
			<?php echo $row->change_date; ?>
		</td>
       		<td>
			<?php echo $row->change_by; ?>
		</td>
       		<td>
			<?php echo $row->company; ?>
		</td>
       		<td>
			<?php echo $row->probability; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
