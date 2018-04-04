<?php

Yii::import('gii.generators.crud.CrudCode');

class BootstrapCode extendS CrudCode
{
	public function generateActiveRow($modelClass, $column)
	{
		if ($column->type === 'boolean')
			return "\$form->checkBoxRow(\$model,'{$column->name}')";
		else if (stripos($column->dbType,'text') !== false)
			return "\$form->textFieldRow(\$model,'{$column->name}',array('class'=>'span8', 'maxlength'=>128))";
		else
		{
			if (preg_match('/^(password|pass|passwd|passcode)$/i',$column->name))
				$inputField='passwordFieldRow';
			else{
				if($column->name === 'status'){
					return "\$form->dropDownListRow(
	                    \$model,
	                    '{$column->name}', 
	                    CHtml::listData(valuelist::model()->findAll('module=:module and field=:field',array(':module'=>'{$modelClass}',':field'=>'{$column->name}')),
		                    'value', 
		                    'name'), 
						array('empty'=>'Select Value'))"; 
				}else if(preg_match('/^(user|assignedto|assigned)$/i',$column->name)){
					return "\$form->dropDownListRow(
	                    \$model,
	                    '{$column->name}', 
	                    CHtml::listData(users::model()->findAll(array('order'=>'user_name')),
		                    'id', 
		                    'user_name'), 
						array('empty'=>'Select Value'))";       
				}else if($column->type === 'integer'){
					return "\$form->dropDownListRow(
	                    \$model,
	                    '{$column->name}', 
	                    CHtml::listData({$column->name}::model()->findAll(array('order'=>'name')),
		                    'id', 
		                    'name'), 
						array('empty'=>'Select Value'))";					
				}else if($column->type === 'double'){
					return "\$form->textFieldRow(\$model,'{$column->name}',array('class'=>'span5'))";
				}else if(preg_match('/^(startdate|enddate|duedate)$/i',$column->name)){
					return "\$form->datepickerRow(\$model,'{$column->name}',array('class'=>'span5', 'prepend'=>'<i class=\'icon-calendar\'></i>')))";        
				}else{
					$inputField='textFieldRow';
				}
			}
			if ($column->type!=='string' || $column->size===null)
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5'))";
			else
				return "\$form->{$inputField}(\$model,'{$column->name}',array('class'=>'span5','maxlength'=>$column->size))";
		}
	}
}
