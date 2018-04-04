<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      name		</th>
 		<th width="80px">
		      company		</th>
 		<th width="80px">
		      email		</th>
 		<th width="80px">
		      payrate		</th>
 		<th width="80px">
		      userid		</th>
 		<th width="80px">
		      billrate		</th>
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
			<?php echo $row->company; ?>
		</td>
       		<td>
			<?php echo $row->email; ?>
		</td>
       		<td>
			<?php echo $row->payrate; ?>
		</td>
       		<td>
			<?php echo $row->userid; ?>
		</td>
       		<td>
			<?php echo $row->billrate; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
