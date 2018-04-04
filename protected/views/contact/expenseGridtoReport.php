<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      firstname		</th>
 		<th width="80px">
		      lastname		</th>
 		<th width="80px">
		      title		</th>
 		<th width="80px">
		      company_id		</th>
 		<th width="80px">
		      description		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->firstname; ?>
		</td>
       		<td>
			<?php echo $row->lastname; ?>
		</td>
       		<td>
			<?php echo $row->title; ?>
		</td>
       		<td>
			<?php echo $row->company_id; ?>
		</td>
       		<td>
			<?php echo $row->description; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
