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
		      company		</th>
 		<th width="80px">
		      total		</th>
 		<th width="80px">
		      cover		</th>
 		<th width="80px">
		      pdf		</th>
 		<th width="80px">
		      sendto		</th>
 		<th width="80px">
		      message		</th>
 		<th width="80px">
		      status		</th>
 		<th width="80px">
		      project		</th>
 		<th width="80px">
		      opportunity		</th>
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
			<?php echo $row->company; ?>
		</td>
       		<td>
			<?php echo $row->total; ?>
		</td>
       		<td>
			<?php echo $row->cover; ?>
		</td>
       		<td>
			<?php echo $row->pdf; ?>
		</td>
       		<td>
			<?php echo $row->sendto; ?>
		</td>
       		<td>
			<?php echo $row->message; ?>
		</td>
       		<td>
			<?php echo $row->status; ?>
		</td>
       		<td>
			<?php echo $row->project; ?>
		</td>
       		<td>
			<?php echo $row->opportunity; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
