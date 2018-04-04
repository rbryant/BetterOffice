<?php 
$projectData=Yii::app()->db->createCommand("
		select DATE_FORMAT(startdate,'%Y, %m, %d') as start
		from project where id ='".$model->id."'")->queryAll();

$projectProvider = new CArrayDataProvider($projectData, array(
	'keyField'=>'id',
	'pagination'=>array(
		'pageSize'=>10,
		),
));

$taskData=Yii::app()->db->createCommand("
		select t.id, t.name, DATE_FORMAT(t.startdate,'%Y, %m, %d') as start, DATE_FORMAT(t.enddate,'%Y, %m, %d') as due,
		t.quantity, t.time, r.name as assignedto, v.name as status, t.percent_complete as pc,
		round((TIMESTAMPDIFF(DAY, startdate, enddate)),0)*8 AS duration
		from task t 
			left join valuelist v on t.status = v.value and v.module='comment' and v.field = 'status' 
			left join resource r on t.assignedto = r.id 
		where t.project = '".$model->id."'")->queryAll();
		
$taskDataProvider = new CArrayDataProvider($taskData, array(
	'keyField'=>'id',
	'pagination'=>array(
		'pageSize'=>10,
		),
));
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <script src="/test/dhtmlx/dhtmlxGantt/codebase/dhtmlxcommon.js" type="text/javascript" charset="utf-8"></script>
    <script src="/test/dhtmlx/dhtmlxGantt/codebase/dhtmlxgantt.js" type="text/javascript" charset="utf-8"></script>

    <link rel="stylesheet" href="/test/dhtmlx/dhtmlxGantt/codebase/dhtmlxgantt.css" type="text/css" media="screen" title="no title">
<style>#GanttDiv td{padding:0px;}</style>
</head>
 
<body onload="createChartControl('GanttDiv')">
	<script type="text/javascript">
	/*<![CDATA[*/
	function createChartControl(htmlDiv)
	{
	    // Initialize Gantt data structures
	    <?php 
	    foreach ($projectProvider->getData() as $column) :
	    	$pStart = $column['start'];
	    endforeach;
	    
	    echo 'var project = new GanttProjectInfo(2, "'.$model->name.'", new Date('.$pStart .'));';
	    
	    foreach ($taskDataProvider->getData() as $column) : 
	    	echo 'var parentTask'.$column['id'].' = new GanttTaskInfo('.$column['id'].', 
	    		"'.$column['name'].'", 
	    		new Date('.$column['start'].'), 
	    		'.$column['duration'].', 
	    		'.$column['pc'].', 
	    		"");
	    		';
	    	echo 'project.addTask(parentTask'.$column['id'].');';
	    endforeach;
	    ?>

	    // Create Gantt control
	    var ganttChartControl = new GanttChart();

	    // Setup paths and behavior
	    ganttChartControl.setImagePath("/test/dhtmlx/dhtmlxGantt/codebase/imgs/");
	    ganttChartControl.setEditable(false);
	    ganttChartControl.showTreePanel(true);
	    ganttChartControl.showContextMenu(true);
	    ganttChartControl.showDescTask(true,'p');
	    ganttChartControl.showDescProject(true,'n,d');
	    // Load data structure        
	    ganttChartControl.addProject(project);
	    // Build control on the page
	    ganttChartControl.create(htmlDiv);
	}
	/*]]>*/
	</script>
 
<div style="height:400px; position:relative; overflow: hidden; width: 100%;" id="GanttDiv"></div>
 
</body>
 
