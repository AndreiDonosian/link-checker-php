<?php

use app\models\CategoryAsinModel;
use app\models\ParsedDataModel;
use app\models\ToParseModel;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;
// $this is the view object currently being used
echo Breadcrumbs::widget([
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
echo DetailView::widget([
    'model' => $cat,
    'attributes' => [
        'id',
        'title',
        'descr',
        [
            'label'=>'Items assigned',
            'value'=>ToParseModel::getCountByCategoryId($cat->id)
        ],
        [
            'label'=>'Item total parsed',
            'value'=>ParsedDataModel::getCountByCatID($cat->id)
        ]
    ],
]);