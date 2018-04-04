<?php


Yii::import('zii.widgets.CPortlet');
 
class MyMeetings extends CPortlet
{
    public $title='';
    public $maxPortletRecords=10;
    public $userid;
 
    public function getMyMeetings()
    {
    	$userid = Yii::app()->user->id;
        return Meeting::model()->findMyMeetings($this->maxPortletRecords, $userid );
        
		/*
		
		$host = 'pod51009.outlook.com';
		$username = 'ron@radcg.net';
		$password = 'a78M3112';
		$mail = '';
		$startDateEvent = ''; //ie: 2010-09-14T09:00:00
		$endDateEvent = ''; //ie: 2010-09-20T17:00:00
		$version = '';
			
		require_once Yii::app()->basepath.'\extensions\ews\ExchangeWebServices.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\NTLMSoapClient.php';
		require_once Yii::app()->basepath.'\extensions\ews\NTLMSoapClient\Exchange.php';
       	
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\FindItemType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\ItemResponseShapeType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\ItemQueryTraversalType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\DefaultShapeNamesType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\CalendarViewType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\NonEmptyArrayOfBaseFolderIdsType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\DistinguishedFolderIdType.php';
       	require_once Yii::app()->basepath.'\extensions\ews\EWSType\DistinguishedFolderIdNameType.php';
       	
       	
       	
		// Define EWS
		$ews = new ExchangeWebServices($host, $username, $password, $version);

	    // Set init class
		$request = new EWSType_FindItemType();
		// Use this to search only the items in the parent directory in question or use ::SOFT_DELETED
		// to identify "soft deleted" items, i.e. not visible and not in the trash can.
		$request->Traversal = EWSType_ItemQueryTraversalType::SHALLOW;
		// This identifies the set of properties to return in an item or folder response
		$request->ItemShape = new EWSType_ItemResponseShapeType();
		$request->ItemShape->BaseShape = EWSType_DefaultShapeNamesType::DEFAULT_PROPERTIES;
		
		// Define the timeframe to load calendar items
		$request->CalendarView = new EWSType_CalendarViewType();
		$request->CalendarView->StartDate = '2013-05-01T21:32:52';
		$request->CalendarView->EndDate = '2013-05-31T21:32:52';
		
		// Only look in the "calendars folder"
		$request->ParentFolderIds = new EWSType_NonEmptyArrayOfBaseFolderIdsType();
		$request->ParentFolderIds->DistinguishedFolderId = new EWSType_DistinguishedFolderIdType();
		$request->ParentFolderIds->DistinguishedFolderId->Id = EWSType_DistinguishedFolderIdNameType::CALENDAR;
		
		// Send request
		$response = $ews->FindItem($request);
			
		$calendarDataProvider = new CArrayDataProvider($response, array(
		'keyField'=>'id',
		'pagination'=>array(
			'pageSize'=>30,
			),
		));
		*/
		/*
		$this->widget('bootstrap.widgets.TbGridView', array(
        		'htmlOptions' => array('class'=>'summary-table'),
        		'rowCssClass' => 'summary-table',
			    'type'=>'striped bordered',
			    'dataProvider' => $calendarDataProvider->getData(),
			    'template' => "{items}",
			    'columns' => array(
			    	'Subject',
			    	'Start',
			    	'End',
        			'Location',
        		),
			    
			));
			
		
		$data = '';
		
		$data = '[';
		$separator = "";

		// Loop through each item if event(s) were found in the timeframe specified
		if ($response->ResponseMessages->FindItemResponseMessage->RootFolder->TotalItemsInView > 0){
		    $events = $response->ResponseMessages->FindItemResponseMessage->RootFolder->Items->CalendarItem;
		    foreach ($events as $event){
		        $id = $event->ItemId->Id;
		        $change_key = $event->ItemId->ChangeKey;
		        $start = $event->Start;
		        $end = $event->End;
		        $subject = $event->Subject;
		        $location = $event->Location;
			    $data .= $separator;
			    $data .= '{ "date": "'. substr(str_replace('T', ' ', Yii::app()->dateFormatter->format($start, 'Y-m-d H:m:s')),0,19) .'", "type": "meeting", "title": "'. $subject .'", "description": "'. $location .'", "url": "" }';
			    $separator = ",";
		    }
		}
		else {
		    echo 'No items returned';
		}
		$data .= ']';		        
		return $data;*/
    	
    }
 
    protected function renderContent()
    {
        $this->render('myMeetings');
        //$this->getMyMeetings();
    }
    
 
}
?>