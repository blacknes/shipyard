<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class BackendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = [
        'position' =>  \yii\web\View::POS_HEAD,
    ];  // 这是设置所有js放置的位置
    public $css = [
        'backend/css/bootstrap/bootstrap.css',
        'backend/css/bootstrap/bootstrap-responsive.css',
        'backend/css/bootstrap/bootstrap-overrides.css',

        'backend/css/lib/jquery-ui-1.10.2.custom.css',
        'backend/css/lib/font-awesome.css',
        'backend/css/backendmain/layout.css',
        'backend/css/backendmain/elements.css',
        'backend/css/backendmain/icons.css',
        'backend/css/compiled/index.css',
        'backend/css/compiled/signin.css',
    ];
    public $js = [
      'backend/js/jquery-latest.js',
      'backend/js/bootstrap.min.js',
      'backend/js/jquery-ui-1.10.2.custom.min.js',
      'backend/js/jquery.knob.js',
      'backend/js/jquery.flot.js',
      'backend/js/jquery.flot.stack.js',
      'backend/js/jquery.flot.resize.js',
      'backend/js/theme.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
