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

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionParse()
    {
        $link = explode('?', Yii::$app->request->post('link'))[0];
        if($link){
            $model = ParsingUrls::find()->where(['link'=>$link])->one();
        }
        if($model){
            echo "Current link existed, use ASIN to search info for it.";
            echo "<script type='text/javascript'>setTimeout(function(){window.history.back();},5000);</script>            ";
            echo "You will be redirected back in 5s";
            die;
        }
        $model = new ParsingUrls();
        $model->link = $link;
        $model->today_parsed = 0;
        $model->save();
        echo "link saved";
        echo "<script type='text/javascript'>setTimeout(function(){window.history.back();},5000);</script>            ";
        echo "You will be redirected back in 5s";
    }

    public function actionGetdata()
    {
        // var_dump(Yii::$app->request->post('field'),Yii::$app->request->post('asin'));die;
        if (Yii::$app->request->post('field') == '*') {
            $data = ParsedDataModel::find()->where(['asin' => Yii::$app->request->post('asin')])->all();
        } else {
            $data = ParsedDataModel::find()
                ->where(['field_name' => Yii::$app->request->post('field'), 'asin' => Yii::$app->request->post('asin')])
                ->all();
        }

        foreach ($data as $d) {
            echo "<pre>";
            var_dump($d->field_value);
            echo "</pre>";
        }
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
