<?php

use app\models\ParsedDataModel;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$dataProvider = new ActiveDataProvider([
    'query' => ParsedDataModel::find()->where(['cat_id'=>$cat['id']]),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'asin',
        'title',
        'alter_images',
        'price',
        'rating_number',
        'rating'
        // ...
    ],
]);