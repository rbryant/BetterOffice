<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      address1		</th>
 		<th width="80px">
		      address2		</th>
 		<th width="80px">
		      city		</th>
 		<th width="80px">
		      state		</th>
 		<th width="80px">
		      zip		</th>
 		<th width="80px">
		      module		</th>
 		<th width="80px">
		      ref_id		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->address1; ?>
		</td>
       		<td>
			<?php echo $row->address2; ?>
		</td>
       		<td>
			<?php echo $row->city; ?>
		</td>
       		<td>
			<?php echo $row->state; ?>
		</td>
       		<td>
			<?php echo $row->zip; ?>
		</td>
       		<td>
			<?php echo $row->module; ?>
		</td>
       		<td>
			<?php echo $row->ref_id; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
