<?php

class CompanyController extends CController
{
        public $breadcrumbs;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
                    'accessControl', // perform access control for CRUD operations
                    //array('auth.filters.AuthFilter'),
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			/*
                        array('allow',  // allow all users to perform 'index' and 'view' actions
                        	'actions'=>array('index','view','create','update','GeneratePdf','GenerateExcel', 'MyAccounts'),
				'users'=>array('*'),
			),
                        
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','GeneratePdf','GenerateExcel', 'MyAccounts'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                        */
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView()
	{
            $id=$_REQUEST["id"];
	     
	       if(Yii::app()->request->isAjaxRequest)
	       {
	        $model=$this->loadModel($id);
	        /*
	         $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
                        'icon'=>'plus white', 
			'label'=>'Create',
			'htmlOptions'=>array('onclick'=>'renderCreateForm();'),
                        'visible'=>false,
		));
		echo " ";
                $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
                        'icon'=>'edit white', 
			'label'=>'Update',
			'htmlOptions'=>array('onclick'=>'renderUpdateForm('.$model->id.');'),
		));
		
		
		echo " ";
		$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
                        'icon'=>'trash white', 
			'label'=>'Delete',
			'htmlOptions'=>array('onclick'=>'delete_record('.$model->id.');'),
		));
		
		echo " ";
		$this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'button',
			'type'=>'primary',
                        'icon'=>'print white', 
			'label'=>'Print',
			'htmlOptions'=>array('onclick'=>'print();'),
		));
		*/
		 echo "<div class='printableArea'>";
	         echo "<h1>".$model->name."</h1><hr />";
	         
	         $this->widget('bootstrap.widgets.TbDetailView',array(
			'data'=>$model,
			'attributes'=>array(
            			'id', 
						'name', 
						'description', 
						'address', 
						'social', 
						'website', 
						'manager', 
						'create_date', 
						),
		));
	         echo "</div>";
	      
	        
	       }
	       else
	       {
		$this->render('DetailandRelatedView',array(
			'model'=>$this->loadModel($id),
		));
	       }
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{	
            if (!Yii::app()->user->checkAccess('Company.Create')) 
            {
                throw new CHttpException(403,"You are not authorized to perform this action.");
                //Yii::app()->request->redirect('/site/accessdenied');
            }
            
            $model=new Company;

		// Uncomment the following line if AJAX validation is needed
               $this->performAjaxValidation($model,"company-create-form");
               $model->id=null;
               
               if(Yii::app()->request->isAjaxRequest)
	       {
		    if(isset($_POST['Company']))
		    {
			    $model->attributes=$_POST['Company'];
			    if($model->save())
			    {
			      echo $model->id;
			    }
			    else
			    {
			      echo "false";
			    } 
			    return;
		    }
	       }
	       else
	       {
	           if(isset($_POST['Company']))
		    {
			 $model->attributes=$_POST['Company'];
			 if($model->save())
			     $this->redirect(array('view','id'=>$model->id));
			
		    }
               
		    $this->render('create',array(
			    'model'=>$model,
		    ));
	       }	
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
      
	    $id=isset($_REQUEST["id"])?$_REQUEST["id"]:$_REQUEST["Company"]["id"];
	    $model=$this->loadModel($id);
			    
	  // Uncomment the following line if AJAX validation is needed
	  $this->performAjaxValidation($model,"company-update-form");
	    
	  if(Yii::app()->request->isAjaxRequest)
	    {
	    
		if(isset($_POST['Company']))
		{
		  
			$model->attributes=$_POST['Company'];
			if($model->save())
			{
			  echo $model->id;
			}
			else
			{
			  echo "false";
			}
			return;
		}
		    
		  $this->renderPartial('_ajax_update_form',array(
		    'model'=>$model,
		    ));
		  return; 
	    
	    }
	    

	    if(isset($_POST['Company']))
	    {
		    $model->attributes=$_POST['Company'];
		    if($model->save())
			    $this->redirect(array('view','id'=>$model->id));
	    }

	    $this->render('update',array(
		    'model'=>$model,
	    ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
	        $id=$_POST["id"];
	   
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset(Yii::app()->request->isAjaxRequest))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
			else
			   echo "true";
		}
		else
		{
		    if(!isset($_GET['ajax']))
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		    else
			   echo "false"; 	
	        }	
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $session=new CHttpSession;
            $session->open();		
            $criteria = new CDbCriteria();            

                $model=new Company('search');
                $model->unsetAttributes();  // clear any default values

                if(isset($_GET['Company']))
		{
                        $model->attributes=$_GET['Company'];
			
			
                   	
                       if (!empty($model->id)) $criteria->addCondition('id = "'.$model->id.'"');
                     
                    	
                       if (!empty($model->name)) $criteria->addCondition('name = "'.$model->name.'"');
                     
                    	
                       if (!empty($model->description)) $criteria->addCondition('description = "'.$model->description.'"');
                     
                    	
                       if (!empty($model->address)) $criteria->addCondition('address = "'.$model->address.'"');
                     
                    	
                       if (!empty($model->social)) $criteria->addCondition('social = "'.$model->social.'"');
                     
                    	
                       if (!empty($model->website)) $criteria->addCondition('website = "'.$model->website.'"');
                     
                    	
                       if (!empty($model->manager)) $criteria->addCondition('manager = "'.$model->manager.'"');
                     
                    	
                       if (!empty($model->create_date)) $criteria->addCondition('create_date = "'.$model->create_date.'"');
                     
                    			
		}
                 $session['Company_records']=Company::model()->findAll($criteria); 
       

                $this->render('index',array(
			'model'=>$model,
		));

	}

        /**
	 * Lists all my models.
	 */
	public function actionMyAccounts()
	{
            $model=Company::model();
            
            $this->render('myAccounts',array(
			'model'=>$model,
		));

	}
        
        
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Company('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Company']))
			$model->attributes=$_GET['Company'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Company::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model,$form_id)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']===$form_id)
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionGenerateExcel()
	{
            $session=new CHttpSession;
            $session->open();		
            
             if(isset($session['Company_records']))
               {
                $model=$session['Company_records'];
               }
               else
                 $model = Company::model()->findAll();

		
		Yii::app()->request->sendFile(date('YmdHis').'.xls',
			$this->renderPartial('excelReport', array(
				'model'=>$model
			), true)
		);
	}
        public function actionGeneratePdf() 
	{
           $session=new CHttpSession;
           $session->open();
		Yii::import('application.extensions.ajaxgii.bootstrap.*');
		require_once('tcpdf/tcpdf.php');
		require_once('tcpdf/config/lang/eng.php');

             if(isset($session['Company_records']))
               {
                $model=$session['Company_records'];
               }
               else
                 $model = Company::model()->findAll();



		$html = $this->renderPartial('expenseGridtoReport', array(
			'model'=>$model
		), true);
		
		//die($html);
		
		$pdf = new TCPDF();
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor(Yii::app()->name);
		$pdf->SetTitle('Company Report');
		$pdf->SetSubject('Company Report');
		//$pdf->SetKeywords('example, text, report');
		$pdf->SetHeaderData('', 0, "Report", '');
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, "Example Report by ".Yii::app()->name, "");
		$pdf->setHeaderFont(Array('helvetica', '', 8));
		$pdf->setFooterFont(Array('helvetica', '', 6));
		$pdf->SetMargins(15, 18, 15);
		$pdf->SetHeaderMargin(5);
		$pdf->SetFooterMargin(10);
		$pdf->SetAutoPageBreak(TRUE, 0);
		$pdf->SetFont('dejavusans', '', 7);
		$pdf->AddPage();
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->LastPage();
		$pdf->Output("Company_002.pdf", "I");
	}
        
        public function actionAjaxView($id = null) {
            $model = Company::model()->findByPk($id);
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');

            $this->renderPartial('gridView', array('model' => $model));
            Yii::app()->end();
        }
}