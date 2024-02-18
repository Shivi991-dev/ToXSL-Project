<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\Project;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;

class AuthController extends Controller{

    public function actionLogin(){
        $model = new LoginForm;
        if($model->load(Yii::$app->request->post()) && $model->login()){
            $user_id = Yii::$app->user->id;
            $user = User::find()->where(['id' => $user_id])->one();
            if($user->user_role == 'Admin'){
                return $this->redirect(['site/admin']);
            }
            elseif($user->user_role == 'Manager'){
                $project = Project::find()->all();
                // dd($project);
                return $this->redirect(['site/manager',['project'=>$project]]);
            }
            else{
                return $this->redirect(['site/user']);
            }
        }
        return $this->render('login',[
            'model'=>$model
        ]);
    }
    public function actionSignup(){

        $model = new SignupForm;
        if($model->load(Yii::$app->request->post()) && $model->validate()){
           if(User::findOne(['email'=>$model->email])){
            Yii::$app->session->setFlash('error','User with this email already exists');
            return $this->refresh();
           }
           $user = new User();
           $user->username = $model->username;
           $user->email = $model->email;
           $user->setPassword($model->password);
           $user->user_role = $model->user_role;

           $user->save();
           Yii::$app->session->setFlash('success','User registration successfull Login to Continue !');
           return $this->redirect(['auth/login']);

        }

        return $this->render('signup',[
            'model'=>$model
        ]);
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        return $this->goHome();
    }
}