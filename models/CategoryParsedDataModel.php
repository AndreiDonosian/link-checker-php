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
class CategoryPasedDataModel extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public static function mapLinks()
    {
        $catsModel = self::findAll('1');
        $cats = [];
        foreach($catsModel as $v){
            $cats[] = [
                'title'=>$v['title'] . '('.ParsedDataModel::find()->select('asin')->distinct()->where(['cat_id'=>$v['id']])->count() . ')',
                'url'=>Url::to(['category/items','id'=>$v['id']]),
                'icon'=>'users'
            ];
        }
        return $cats;
    }
}