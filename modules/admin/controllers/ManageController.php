<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use app\modules\admin\models\Admin;
use yii\data\Pagination;
use app\modules\admin\controllers\CommonController;

class ManageController extends CommonController
{
  public $layout = "backend";
    public function actionMailchangepass()
    {
        $time = Yii::$app->request->get("timestamp");
        $adminuser = Yii::$app->request->get("adminuser");
        $token = Yii::$app->request->get("token");
        $model = new Admin;
        $myToken = $model->createToken($adminuser, $time);
        if ($token != $myToken) {
            $this->redirect(['user/signin']);
            Yii::$app->end();
        }
        if (time() - $time > 300) {
            $this->redirect(['user/signin']);
            Yii::$app->end();
        }
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->changePass($post)) {
                Yii::$app->session->setFlash('info', '密码修改成功');
            }
        }
        $model->adminuser = $adminuser;
        return $this->render("mailchangepass", ['model' => $model]);

    }

    public function actionManagers()
    {
        $model = Admin::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['manage'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $managers = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("managers", ['managers' => $managers, 'pager' => $pager]);
    }

    public function actionReg()
    {
        $model = new Admin;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->reg($post)) {
                Yii::$app->session->setFlash('info', '添加成功');
            } else {
                Yii::$app->session->setFlash('info', '添加失败');
            }
        }
        $model->adminpass = '';
        $model->repass = '';
        return $this->render('reg', ['model' => $model]);
    }

    public function actionDel()
    {
        $adminid = (int)Yii::$app->request->get("adminid");
        if (empty($adminid) || $adminid == 1) {
            $this->redirect(['manage/managers']);
            return false;
        }
        $model = new Admin;
        if ($model->deleteAll('adminid = :id', [':id' => $adminid])) {
            Yii::$app->session->setFlash('info', '删除成功');
            $this->redirect(['manage/managers']);
        }
    }

    public function actionChangeemail()
    {
        $model = Admin::find()->where('adminuser = :user', [':user' => Yii::$app->session['admin']['adminuser']])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->changeemail($post)) {
                Yii::$app->session->setFlash('info', '修改成功');
            }
        }
        $model->adminpass = "";
        return $this->render('changeemail', ['model' => $model]);
    }

    public function actionChangepass()
    {
        $model = Admin::find()->where('adminuser = :user', [':user' => Yii::$app->session['admin']['adminuser']])->one();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->changepass($post)) {
                Yii::$app->session->setFlash('info', '修改成功');
            }
        }
        $model->adminpass = '';
        $model->repass = '';
        return $this->render('changepass', ['model' => $model]);
    }



}
