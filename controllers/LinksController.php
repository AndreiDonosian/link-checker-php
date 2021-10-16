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
use app\models\ToParseModel;
use yii\helpers\Url;

class LinksController extends Controller
{
    public function actionIndex(int $cat_id)
    {
        $linksQuery = ToParseModel::find()->where(['cat_id'=>$cat_id]);
        return $this->render('index',compact('linksQuery','cat_id'));
    }

    public function actionUpdate(int $id){
        $model = ToParseModel::findOne($id);
        if($z = Yii::$app->request->post()){
            $model->load($z);
            $model->save();
        }
        return $this->render('update',compact('model'));
    }

    public function actionCreate(int $id)
    {
        $model = new ToParseModel();
        $err = '';
        if($z = Yii::$app->request->post()){
            $duplicateCheck = ToParseModel::find()->where(['asin'=>$z['ToParseModel']['asin']])->count();
            if(!$duplicateCheck && $model->load($z) && $model->save()) {
                return $this->redirect(Url::to(['links/index']));
            } else {
                $err = 'Duplicate entry, that url is exist.';
            }
        }
        return $this->render('create', compact('model','id','err'));
    }
}