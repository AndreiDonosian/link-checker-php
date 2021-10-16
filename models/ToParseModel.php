<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\Url;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class ToParseModel extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            ['link','string'],
            ['asin','string'],
            ['cat_id','integer']
        ];
    }
    public static function tableName()
    {
        return 'to_parse';
    }

    public static function getCountByCategoryId(int $cat_id):int 
    {
        return self::find()->where(['cat_id'=>$cat_id])->count();
    }
}