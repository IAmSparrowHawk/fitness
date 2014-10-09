<?php

class PersonalClientController extends Controller
{
    public $layout='//layouts/personalClient';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(

		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        // запись о пользователе
        $client=Client::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}
    public function actionClient()
    {
        $this->render('personalClient/client');
    }
    public function actionInfo()
    {
        // запись о пользователе
        $client=Client::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
        // список абонементов пользователя
        $abon = Abonement::model()->findAll('',array('client'=>$client->id));

        $this->render('info', array('client' => $client,
            'abon'=>$abon));
    }
    public function actionEditInfo()
    {
        // запись о пользователе
        $clientRecord=Client::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
        if(isset($_POST['Client']))
        {
            $clientRecord->attributes=$_POST['Client'];
            if($clientRecord->validate())
            {
                $clientRecord->save();
            }
        }
        $this->render('editinfo',array('clientRecord'=>$clientRecord));
    }
    public function actionDiagram()
    {
        // запись о пользователе
        $clientRecord=Client::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
        if(isset($_POST['Metering']))
        {
            $meter = new Metering();
            $meter->attributes=$_POST['Metering'];
            $meter->datemetr=$_POST['datemetr'];
            $meter->client=$clientRecord->id;
            if($meter->validate())
            {
                $meter->save();
            }
        }
        $metering = new Metering();
        $meterings = Metering::model()->findAll('client=:clientId AND coach is not null',array(':clientId'=>$clientRecord->id));
        $meteringsClient = Metering::model()->findAll('client=:clientId AND coach is null',array(':clientId'=>$clientRecord->id));
        // список для отображения веса
        $weights = array();
        $volumes = array();
        array_push($weights, array(Metering::model()->getAttributeLabel('datemetr'),Metering::model()->getAttributeLabel('weight')));
        array_push($volumes, array(Metering::model()->getAttributeLabel('datemetr'),Metering::model()->getAttributeLabel('chest'),
            Metering::model()->getAttributeLabel('waistline'),Metering::model()->getAttributeLabel('abdominalgirth'),
            Metering::model()->getAttributeLabel('hips'),Metering::model()->getAttributeLabel('rhip'),
            Metering::model()->getAttributeLabel('rknee'),Metering::model()->getAttributeLabel('rtibia'),
            Metering::model()->getAttributeLabel('rforearm')));
        foreach($meterings as $value)
        {
            //$weights[$value->datemetr]= $value->weight;
            array_push($weights, array(date('d.m.Y', strtotime($value->datemetr)), (float)($value->weight)));
            array_push($volumes, array(date('d.m.Y', strtotime($value->datemetr)),
                (float)($value->chest),(float)($value->waistline),
                (float)($value->abdominalgirth),(float)($value->hips),
                (float)($value->rhip), (float)($value->rknee),
                (float)($value->rtibia),(float)($value->rforearm)));
        }
        $weightsClient = array();
        array_push($weightsClient, array(Metering::model()->getAttributeLabel('datemetr'),Metering::model()->getAttributeLabel('weight')));
        foreach($meteringsClient as $value)
        {
            array_push($weightsClient, array(date('d.m.Y', strtotime($value->datemetr)), (float)($value->weight)));
        }
        $this->render('diagram', array('clientRecord' => $clientRecord,
            'weights' => $weights,
            'volumes'=>$volumes,
            'weightsClient'=>$weightsClient,
            'metering'=>$metering
        ));
    }
    public function actionLessons()
    {
        // запись о пользователе
        $client=Client::model()->findByAttributes(array('userid'=>Yii::app()->user->id));
        if(isset($_POST['Schedule']))
        {
            $meter = new Schedule();
            $meter->attributes=$_POST['Schedule'];
            $meter->client=$client->id;
            $meter->status=5;
            if($meter->validate())
            {
                $meter->save();
            }
        }
        $schedule = new Schedule();
        $scheduleDataProvider=new CActiveDataProvider('Schedule', array(
            'criteria'=>array(
                'condition'=>'client=1',
                'order'=>'t.id ASC',
                'with'=>array('rel_serv', 'rel_status'),
            ),
            'pagination'=>array(
                'pageSize'=>20,
            ),
        ));
        $servs = Serv::model()->findAll('typeserv<>:types',array(':types'=>6));
        $servlist = CHtml::listData($servs,
            'id', 'servname');

        $this->render('lessons', array('client' => $client,
            'schedule'=>$schedule,
            'servlist'=>$servlist,
            'scheduleDataProvider' => $scheduleDataProvider));
    }

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'users'=>array('?'),
            ),
        );
    }

}