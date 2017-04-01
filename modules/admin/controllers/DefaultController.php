<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\assets\BackendAsset;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    public $layout = "backendmain";
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
