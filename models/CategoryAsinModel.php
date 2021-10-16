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
class CategoryAsinModel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category_asin';
    }

    public static function getCountAsin(int $cat_id)
    {
        return self::find()->where(['cat_id'=>$cat_id])->count();
    }
}