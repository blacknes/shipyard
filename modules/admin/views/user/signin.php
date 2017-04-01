<?php
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;
?>
<!DOCTYPE html>
<html class="login-bg">
<head>
	<title>慕课商城 - 后台管理</title>

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
                <h6>后台管理</h6>
								<?php echo $form->field($model, 'adminuser')->textInput(["class" => "span12", "placeholder" => "管理员账号"]); ?>
                <?php echo $form->field($model, 'adminpass')->passwordInput(["class" => "span12", "placeholder" => "管理员密码"]); ?>
								<a href="<?php echo yii\helpers\Url::to(['user/forgetpasswd']); ?>" class="forgot">忘记密码?</a>
	                <?php echo $form->field($model, 'rememberMe')->checkbox([
	                    'id' => 'remember-me',
	                    'template' => '<div class="remember">{input}<label for="remember-me">记住我</label></div>',
	                ]); ?>
	                <?php echo Html::submitButton('登录', ["class" => "btn-glow primary login"]); ?>
            </div>
        </div>
				<?php ActiveForm::end();  ?>
    </div>

</body>
</html>
