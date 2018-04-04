<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      catnum		</th>
 		<th width="80px">
		      description		</th>
 		<th width="80px">
		      quantity		</th>
 		<th width="80px">
		      price		</th>
 		<th width="80px">
		      time		</th>
 		<th width="80px">
		      linecost		</th>
 		<th width="80px">
		      taxable		</th>
 		<th width="80px">
		      proposal		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->catnum; ?>
		</td>
       		<td>
			<?php echo $row->description; ?>
		</td>
       		<td>
			<?php echo $row->quantity; ?>
		</td>
       		<td>
			<?php echo $row->price; ?>
		</td>
       		<td>
			<?php echo $row->time; ?>
		</td>
       		<td>
			<?php echo $row->linecost; ?>
		</td>
       		<td>
			<?php echo $row->taxable; ?>
		</td>
       		<td>
			<?php echo $row->proposal; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
