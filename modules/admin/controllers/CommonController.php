<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;

class CommonController extends Controller
{
    public function init()
    {
        if (Yii::$app->session['admin']['isLogin'] != 1) {
            return $this->redirect(['/admin/user/signin']);
        }
    }
}