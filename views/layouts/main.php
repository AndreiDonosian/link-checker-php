<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\CategoryModel;
use yii\helpers\Url;
use hosannahighertech\lbootstrap;


AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="wrapper">

    <?= \hosannahighertech\lbootstrap\widgets\SideBar::widget([
        'bgImage'=>'@web/img/sidebar-5.jpg', //Don't define it if there is none
        'header'=>[
            'title'=>'All categories',
            'url'=>Url::to(['category/index'])
        ],
        'links'=> CategoryModel::mapLinks()
    ]) ?>
    
    <div class="main-panel">
		 <?= \hosannahighertech\lbootstrap\widgets\NavBar::widget([
				'theme'=>'red',
				'brand'=>[
					'label'=>'Parsamaz'
				],
				'links'=>[
					['label' => 'Competitors', 'url' => ['/site/index']],
                    ['label' => 'Guardian', 'url' => ['/site/about']],
                    ['label' => 'Users', 'url' => ['/site/users']],
				],
			]) ?>
                
		<div class="content">
			<div class="container-fluid">
				<?= $content ?>
			</div>
		</div>

        <!-- <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <?= date('Y') ?> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer> -->

    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>