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

        $chartData=Yii::app()->db->createCommand("
			select c.id as company, o.amount as amount
			from opportunity o
			left join company c on o.company = c.id
			where status = '2'")->queryAll(false);
		
        $chartDataProvider = new CArrayDataProvider($chartData, array(
            'keyField'=>'name',
            'pagination'=>array(
                'pageSize'=>10,
                ),
        ));
?>

<div class="container-fluid">
	<div class="row-fluid">
		<h2>Accounts Portal</h2>
		<div class="span5 push-left">
		<?php	
		/*
			$this->widget('ext.google.XGoogleChart',array(
				'type'=>'pie',
				'title'=>'Opportunity by Customer',
				'data'=>$json_data,
				'size'=>array(400,260),
				'barsSize'=>array('a'), // automatically resize bars to fit the space available
				'color'=>array('3285ce'),
				'axes'=>array('x','y'), // axes to show
			));*/
		?>
		</div>
		<div class="span5 push-right">
		<?php 
			$this->widget('ext.google.XGoogleChart',array(
				'type'=>'pie',
				'title'=>'Opportunity by Customer',
				'data'=>array('IE7'=>22,'IE6'=>30.7,'IE5'=>1.7,'Firefox'=>36.5,'Mozilla'=>1.1,'Safari'=>2,'Opera'=>1.4),
				'size'=>array(400,260),
				'barsSize'=>array('a'), // automatically resize bars to fit the space available
				'color'=>array('3285ce'),
				'axes'=>array('x','y'), // axes to show
			));
				
		?>
		</div>
	</div>
</div>

<?php
 function toJSON($chartDataProvider){

 
        return CJSON::encode($chartDataProvider);

}

?>