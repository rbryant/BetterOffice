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
		      proposal		</th>
 		<th width="80px">
		      user		</th>
 		<th width="80px">
		      total		</th>
 		<th width="80px">
		      startdate		</th>
 		<th width="80px">
		      enddate		</th>
 		<th width="80px">
		      company		</th>
 		<th width="80px">
		      budget		</th>
 		<th width="80px">
		      percent_complete		</th>
 		<th width="80px">
		      status		</th>
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
			<?php echo $row->proposal; ?>
		</td>
       		<td>
			<?php echo $row->user; ?>
		</td>
       		<td>
			<?php echo $row->total; ?>
		</td>
       		<td>
			<?php echo $row->startdate; ?>
		</td>
       		<td>
			<?php echo $row->enddate; ?>
		</td>
       		<td>
			<?php echo $row->company; ?>
		</td>
       		<td>
			<?php echo $row->budget; ?>
		</td>
       		<td>
			<?php echo $row->percent_complete; ?>
		</td>
       		<td>
			<?php echo $row->status; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
