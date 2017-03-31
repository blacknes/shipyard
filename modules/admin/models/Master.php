<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%master}}".
 *
 * @property integer $mid
 * @property string $name
 * @property string $passwd
 * @property integer $grade
 * @property string $email
 */
class Master extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%master}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'passwd', 'grade', 'email'], 'required'],
            [['grade'], 'integer'],
            [['name', 'email'], 'string', 'max' => 52],
            [['passwd'], 'string', 'max' => 62],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mid' => 'Mid',
            'name' => 'Name',
            'passwd' => 'Passwd',
            'grade' => 'Grade',
            'email' => 'Email',
        ];
    }
}
