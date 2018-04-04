<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      execute_after		</th>
 		<th width="80px">
		      executed_at		</th>
 		<th width="80px">
		      succeeded		</th>
 		<th width="80px">
		      action		</th>
 		<th width="80px">
		      parameters		</th>
 		<th width="80px">
		      execution_result		</th>
 		<th width="80px">
		      frequency		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->execute_after; ?>
		</td>
       		<td>
			<?php echo $row->executed_at; ?>
		</td>
       		<td>
			<?php echo $row->succeeded; ?>
		</td>
       		<td>
			<?php echo $row->action; ?>
		</td>
       		<td>
			<?php echo $row->parameters; ?>
		</td>
       		<td>
			<?php echo $row->execution_result; ?>
		</td>
       		<td>
			<?php echo $row->frequency; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
