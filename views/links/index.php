<?php

use app\models\ParsedDataModel;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\helpers\Url;

echo Html::a('Create new link',Url::to(['links/create','id'=>$cat_id]));

$dataProvider = new ActiveDataProvider([
    'query' => $linksQuery,
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'asin',
        'link',
        'last_parsed:date',
        [
            'label'=>'Total parsed',
            'value'=>function($item){
                return ParsedDataModel::find()->where(['asin'=>$item['asin']])->count();
            }
        ],
        [
            'class' => ActionColumn::className(),   
            'template' => '{views} {update} {delete}',
            'buttons' => [
                'views' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::to(['parsed-items/index','asin'=>$model['asin']]), [

                        'title' => Yii::t('yii', 'View'),

                    ]);
                }

            ]
        ],
    ],
]);