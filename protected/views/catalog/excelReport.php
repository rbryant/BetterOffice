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
		      price		</th>
 		<th width="80px">
		      cost		</th>
 		<th width="80px">
		      category		</th>
 		<th width="80px">
		      catalog		</th>
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
			<?php echo $row->price; ?>
		</td>
       		<td>
			<?php echo $row->cost; ?>
		</td>
       		<td>
			<?php echo $row->category; ?>
		</td>
       		<td>
			<?php echo $row->catalog; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
