<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      content		</th>
 		<th width="80px">
		      status		</th>
 		<th width="80px">
		      create_time		</th>
 		<th width="80px">
		      userId		</th>
 		<th width="80px">
		      ref_id		</th>
 		<th width="80px">
		      module		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->content; ?>
		</td>
       		<td>
			<?php echo $row->status; ?>
		</td>
       		<td>
			<?php echo $row->create_time; ?>
		</td>
       		<td>
			<?php echo $row->userId; ?>
		</td>
       		<td>
			<?php echo $row->ref_id; ?>
		</td>
       		<td>
			<?php echo $row->module; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
