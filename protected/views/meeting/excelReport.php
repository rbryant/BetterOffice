<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      name		</th>
 		<th width="80px">
		      location		</th>
 		<th width="80px">
		      activity_id		</th>
 		<th width="80px">
		      category_id		</th>
 		<th width="80px">
		      description		</th>
 		<th width="80px">
		      startdatetime		</th>
 		<th width="80px">
		      enddatetime		</th>
 		<th width="80px">
		      url		</th>
 		<th width="80px">
		      attendee		</th>
 		<th width="80px">
		      company		</th>
 		<th width="80px">
		      project		</th>
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
			<?php echo $row->location; ?>
		</td>
       		<td>
			<?php echo $row->activity_id; ?>
		</td>
       		<td>
			<?php echo $row->category_id; ?>
		</td>
       		<td>
			<?php echo $row->description; ?>
		</td>
       		<td>
			<?php echo $row->startdatetime; ?>
		</td>
       		<td>
			<?php echo $row->enddatetime; ?>
		</td>
       		<td>
			<?php echo $row->url; ?>
		</td>
       		<td>
			<?php echo $row->attendee; ?>
		</td>
       		<td>
			<?php echo $row->company; ?>
		</td>
       		<td>
			<?php echo $row->project; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
