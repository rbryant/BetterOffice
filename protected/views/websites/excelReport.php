<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      url		</th>
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
			<?php echo $row->url; ?>
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
