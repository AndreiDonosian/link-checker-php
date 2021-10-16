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

class ParsedItemsController extends Controller
{
    public function actionIndex(string $asin)
    {
        $itemsQuery = ParsedDataModel::find()->where(['asin'=>$asin]);
        return $this->render('index',compact('itemsQuery','asin'));
    }

    public function actionView(int $id){
        $model = ParsedDataModel::findOne($id);
        return $this->render('view',compact('model'));
    }
}