<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      text		</th>
 		<th width="80px">
		      ref		</th>
 		<th width="80px">
		      module		</th>
 		<th width="80px">
		      name		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->text; ?>
		</td>
       		<td>
			<?php echo $row->ref; ?>
		</td>
       		<td>
			<?php echo $row->module; ?>
		</td>
       		<td>
			<?php echo $row->name; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
