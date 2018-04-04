<?php 
    require_once(dirname(__FILE__)."/../../dhtmlx/connector/grid_connector.php");
    require_once(dirname(__FILE__)."/../../dhtmlx/connector/scheduler_connector.php");
    require_once(dirname(__FILE__)."/../../dhtmlx/connector/db_phpyii.php");
 
    class EventController extends Controller {
		
		    public function actionScheduler()
			{
			    $this->render('/radcg/ProjectsDetailandRelatedView'); 
			}
			
			public function actionScheduler_data()
			{
			    $scheduler = new SchedulerConnector(Task::model(), "PHPYii");
			    $scheduler->configure("-", "id", "startdate, enddate, name");
			    $scheduler->render();
			}

        }
?>
