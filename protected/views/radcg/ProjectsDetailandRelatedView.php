<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	'Accounts Portal',
);
/*$history = Browsehistory::getInstance();
$history->push(null, 'Accounts Portal', 'icon-globe');

        $addressData=Yii::app()->db->createCommand("SELECT * FROM address where module='company' and ref_id='".$model->id."'")->queryAll();
        $addressDataProvider = new CArrayDataProvider($addressData, array(
            'keyField'=>'id',
            'pagination'=>array(
                'pageSize'=>30,
                ),
        ));

		$contactData=Yii::app()->db->createCommand("SELECT * FROM contact where company_id='".$model->id."'")->queryAll();
		$contactDataProvider = new CArrayDataProvider($contactData, array(
			'keyField'=>'id',
			'pagination'=>array(
				'pageSize'=>30,
				),
		));

        $phoneData=Yii::app()->db->createCommand("
			SELECT p.id, p.number, v.name as type
			FROM phone p 
			left join valuelist v on p.type = v.value and v.module='phone'
			where p.module='company' and ref_id='".$model->id."'")->queryAll();
			
        $phoneDataProvider = new CArrayDataProvider($phoneData, array(
            'keyField'=>'id',
            'pagination'=>array(
                'pageSize'=>10,
                ),
        ));

*/

 ?>

<div class="container-fluid">
	<div class="row-fluid">
		<h2>Projects Portal</h2>
		<div class="span12 push-left">
		    <script src="/test/dhtmlx/scheduler/dhtmlxscheduler.js" type="text/javascript" charset="utf-8"></script>
		    <link rel="stylesheet" href="/test/dhtmlx/scheduler/dhtmlxscheduler_glossy.css" type="text/css" media="screen" title="no title" charset="utf-8">
		 
		    <div id="scheduler_here" class="dhx_cal_container" style='width:800px; height:600px;'>
		        <div class="dhx_cal_navline">
		            <div class="dhx_cal_prev_button">&nbsp;</div>
		            <div class="dhx_cal_next_button">&nbsp;</div>
		            <div class="dhx_cal_today_button"></div>
		            <div class="dhx_cal_date"></div>
		            <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
		            <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
		            <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
		        </div>
		        <div class="dhx_cal_header">
		        </div>
		        <div class="dhx_cal_data">
		        </div>
		    </div>
 
			<script type="text/javascript" charset="utf-8">
			    scheduler.config.multi_day = true;
			 
			    scheduler.config.xml_date="%Y-%m-%d %H:%i";
			    scheduler.config.first_hour = 5;
			    scheduler.init('scheduler_here',new Date(2010,7,5),"week");
			    scheduler.load("//event/scheduler_data");
			 
			    var dp = new dataProcessor("//event/scheduler_data");
			    dp.init(scheduler);
			</script>
		</div>
	</div>
</div>

