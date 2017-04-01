<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\assets\BackendAsset;
use app\modules\admin\models\Admin;
use Yii;
/**
*
*/
class UserController extends Controller
{
	public $layout = "backend";
	public function actionForgetpasswd()
	{
		$model = new Admin;
		if (Yii::$app->request->isPost) {
			$post = Yii::$app->request->post();
				if ($model->seekPass($post)) {
                Yii::$app->session->setFlash('info', '电子邮件已经发送成功，请查收');
				}
		}
		return $this->render('forgetpasswd',  ['model'  => $model]);
	}

	public function actionSignin()
	{
		$model = new Admin;
		if (Yii::$app->request->isPost) {
					 $post = Yii::$app->request->post();
					 if ($model->login($post)) {
							 $this->redirect(['default/index']);
							 Yii::$app->end();
					 }
			 }
		return $this->render('signin',  ['model'  => $model]);
	}

}
