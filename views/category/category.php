<?php

use app\models\ParsedDataModel;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use yii\widgets\Breadcrumbs;

// $this is the view object currently being used
echo Breadcrumbs    ::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Go to category',
            'url' => ['category/index'],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],
        // ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
        'Edit',
    ],
]);
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