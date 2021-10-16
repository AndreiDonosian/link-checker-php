<?php

use app\models\ParsedDataModel;
use yii\bootstrap\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\grid\ActionColumn;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

// echo Html::a('Create new link',Url::to(['links/create','id'=>$id]));
$dataProvider = new ActiveDataProvider([
    'query' => $itemsQuery,
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
            'asin',
            'title',
            // 'alter_images',
            'price',
            'rating_number',
            'rating',
            'parsed_date:datetime',
            // ...
        [
            'class' => ActionColumn::className(),   
            'template'=>'{view}'
        ],
    ],
]);