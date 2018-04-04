<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      value		</th>
 		<th width="80px">
		      module		</th>
 		<th width="80px">
		      field		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->value; ?>
		</td>
       		<td>
			<?php echo $row->module; ?>
		</td>
       		<td>
			<?php echo $row->field; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
