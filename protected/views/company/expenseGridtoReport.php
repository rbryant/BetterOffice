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
		      address		</th>
 		<th width="80px">
		      social		</th>
 		<th width="80px">
		      website		</th>
 		<th width="80px">
		      manager		</th>
 		<th width="80px">
		      create_date		</th>
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
			<?php echo $row->address; ?>
		</td>
       		<td>
			<?php echo $row->social; ?>
		</td>
       		<td>
			<?php echo $row->website; ?>
		</td>
       		<td>
			<?php echo $row->manager; ?>
		</td>
       		<td>
			<?php echo $row->create_date; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
