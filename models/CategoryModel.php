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
class CategoryModel extends \yii\db\ActiveRecord
{
    public function rules()
    {
        return [
            ['title','string'],
            ['descr','string']
        ];
    }
    
    public static function tableName()
    {
        return 'category';
    }

    public static function mapLinks(): array
    {
        $catsModel = self::find()->all();
        $cats = [];
        foreach($catsModel as $v){
            $cats[] = [
                'title'=>$v['title'] . '('. ToParseModel::getCountByCategoryId($v['id']) . ')',
                'url'=>Url::to(['links/index','cat_id'=>$v['id']]),
                'icon'=>'users'
            ];
        }
        return $cats;
    }
}