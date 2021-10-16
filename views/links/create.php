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
            'label' => 'Go to links',
            'url' => ['links/index','cat_id'=>$id],
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],
        // ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]],
        'Create',
    ],
]);
echo $err ?  Html::tag('div', $err,['class'=>'alert alert-danger']) : '';

$form = ActiveForm::begin([
    'id' => 'update-cat-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($model, 'link') ?>
    <?= $form->field($model, 'asin') ?>
    <?= Html::hiddenInput('cat_id',$id) ?>
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>