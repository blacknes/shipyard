<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>后台管理</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>


    <div class="row-fluid login-wrapper">
    <a class="brand" href="<?php echo yii\helpers\Url::to(['/index/index']) ?>"></a>
        <?php $form = ActiveForm::begin([
            'fieldConfig' => [
                'template' => '{error}{input}',
            ],
        ]); ?>
        <div class="span4 box">
            <div class="content-wrap">
                <h6> 修改密码</h6>
                <?php
                    if (Yii::$app->session->hasFlash('info')) {
                        echo Yii::$app->session->getFlash('info');
                    }
                ?>
                <?php echo $form->field($model, 'adminuser')->hiddenInput(); ?>
                <?php echo $form->field($model, 'adminpass')->passwordInput(["class" => "span12", "placeholder" => "新密码"]); ?>
                <?php echo $form->field($model, 'repass')->passwordInput(["class" => "span12", "placeholder" => "确认密码"]); ?>
                <a href="<?php echo yii\helpers\Url::to(['user/signin']); ?>" class="forgot">返回登录</a>
                <?php echo Html::submitButton('修改', ["class" => "btn-glow primary login"]); ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>

</body>
</html>
