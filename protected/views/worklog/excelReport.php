<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      task		</th>
 		<th width="80px">
		      resource		</th>
 		<th width="80px">
		      hours		</th>
 		<th width="80px">
		      workdate		</th>
 		<th width="80px">
		      log		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->task; ?>
		</td>
       		<td>
			<?php echo $row->resource; ?>
		</td>
       		<td>
			<?php echo $row->hours; ?>
		</td>
       		<td>
			<?php echo $row->workdate; ?>
		</td>
       		<td>
			<?php echo $row->log; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
