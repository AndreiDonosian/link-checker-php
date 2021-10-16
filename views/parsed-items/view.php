<?php

use yii\bootstrap\Html;
use yii\widgets\Breadcrumbs;
use yii\widgets\DetailView;

echo Breadcrumbs::widget([
    'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
    'links' => [
        [
            'label' => 'Go to listing',
            'url' => ['parsed-items/index', 'asin' => $model->asin],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],
        // ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
        'Edit',
    ],
]);
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id', 
        'title', 
        'price', 
        [
            'format'=>'raw',
            'label'=>'Images',
            'value'=>function($model){
                $items = explode(',',$model['alter_images']);
                $str = '';
                foreach($items as $v){
                    $z = explode('/web/',$v);
                    $str .= Html::tag('span',Html::img($z[1]),['style'=>'padding-left:10px']);
                }
                return $str;
            },
            // 'format'=>'html'
        ], 
        'descr', 
        [
            'format'=>'raw',
            'label'=>'Bullets',
            'value'=>function($model){
                $items = explode('|||',$model['bullets']);
                return Html::ul($items);
            },
            // 'bullets'
        ], 
        'variations', 
        'rating', 
        'rating_number', 
        'tech_dimension', 
        'tech_model_number', 
        'tech_target_gender', 
        'tech_material_type', 
        'tech_material_free', 
        'tech_care_instructions', 
        'tech_battery_req', 
        'tech_item_weight', 
        'tech_manufacturer', 
        'tech_is_discontinued', 
        'tech_date_first_available', 
        'tech_material_composition', 
        'tech_style', 
        'rank', 'feature_material', 'feature_color', 'feature_brand', 'feature_item_weight', 'feature_capacity', 'feature_item_dimension_l_w_h', 'parsed_date', 'asin', 'cat_id'
    ],
]);
