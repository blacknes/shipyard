<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\assets\BackendAsset;
/**
* 
*/
class UserController extends Controller
{
	public $layout = "backend";
	public function actionForgetpasswd()
	{

		return $this->render('forgetpasswd');
	}

	public function actionSignin()
	{
		return $this->render('signin');
	}

}