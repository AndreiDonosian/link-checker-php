<?php

namespace app\controllers;

use app\models\CategoryModel;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ParsedDataModel;
use app\models\ParsingUrls;
use yii\helpers\Url;

class CategoryController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionItems(int $id)
    {
        $cat = CategoryModel::findOne($id);
        return $this->render('category', compact('cat'));
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView(int $id)
    {
        $cat = CategoryModel::findOne($id);
        return $this->render('view', compact('cat'));
    }

    public function actionUpdate(int $id)
    {
        $cat = CategoryModel::findOne($id);
        if($z = Yii::$app->request->post()){
            $cat->load($z);
            $cat->save(false);
        }
        return $this->render('update',compact('cat'));
    }

    public function actionCreate()
    {
        $cat = new CategoryModel();
        if($z = Yii::$app->request->post()){
            if ($cat->load($z) && $cat->save(false)){
                return $this->redirect(Url::to(['category/index']));
            }
        }
        return $this->render('create',compact('cat'));
    }
}
