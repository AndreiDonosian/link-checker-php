<?php

use app\models\CategoryAsinModel;
use app\models\ToParseModel;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use yii\widgets\ListView;
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
$form = ActiveForm::begin([
    'id' => 'update-cat-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($cat, 'title') ?>
    <?= $form->field($cat, 'descr')->textarea() ?>
   
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>