<?php

use app\models\CategoryAsinModel;
use app\models\CategoryModel;
use app\models\ParsedDataModel;
use app\models\ToParseModel;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\helpers\Url;

echo Html::a('Create new category',Url::to(['category/create']));

$dataProvider = new ActiveDataProvider([
    'query' => CategoryModel::find(),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        [
            'attribute' => 'title',
            'label' => 'Title',
            'value' => 'title'
        ],
        [
            'label' => 'Items',
            'value' => function ($data) {
                return ToParseModel::getCountByCategoryId($data['id'])
                    ? Html::a('Go to items (' . ToParseModel::getCountByCategoryId($data['id']) . ')', Url::to(['links/index', 'cat_id' => $data['id']]))
                    : 'No items, try to create one';
            },
            'format' => 'raw'
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{create-link} {view} {update}',
            'buttons' => [
                'create-link' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', Url::to(['links/create','id'=>$model['id']]), [

                        'title' => Yii::t('yii', 'Create'),

                    ]);
                }

            ]

            // you may configure additional properties here
        ],

    ]
]);
