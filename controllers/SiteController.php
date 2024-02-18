<?php

namespace app\controllers;

use app\models\Project;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionAdmin()
    {

        $user = User::find()->all();
        return $this->render('admin',[
            'user'=>$user
        ]);
    }
    public function actionManager()
    {

        $project = Project::find()->all();
        return $this->render('manager',[
            'project'=>$project
        ]);
    }
    public function actionUser()
    {
        return $this->render('user');
    }
    public function actionProject()
    {
        $model = new Project;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $project = Project::findOne(['title'=>$model->title]);
            if(!$project){
                $project = new Project();
                $project->title = $model->title;
                $project->description = $model->description;
                $project->save();
                Yii::$app->session->setFlash('success','New project has been added!');

                return $this->refresh();
            }
        }
        $project = Project::find()->all();
        return $this->render('projects',[
            'model'=>$model,
            'project'=>$project
        ]);
    }
    public function actionDeleteProject($id){
        $project = Project::findOne($id)->delete();
        Yii::$app->session->setFlash('success','Project deleted successfully!');
        return $this->redirect(['site/project']);
    }
    public function actionEditProject($id){
        $model = new Project;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
            $project = Project::findOne($id);
            $project->title = $model->title; 
            $project->description = $model->description; 
            $project->update();
            Yii::$app->session->setFlash('success','Project Updated successfully!');
            return $this->redirect(['site/project']);
        };
        // $project->title = ;
        Yii::$app->session->setFlash('success','Project deleted successfully!');
        return $this->redirect(['site/project']);
    }
}
