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
        $this->render('info');
    }
    public function actionDiagram()
    {
        $this->render('diagram');
    }
    public function actionLessons()
    {
        $this->render('lessons');
    }
}