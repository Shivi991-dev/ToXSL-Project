<?php
namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model{
    public $username;
    public $email;
    public $password;
    public $user_role;

    public function rules(){
        return [
            [['username', 'email', 'password', 'user_role'], 'required'],
            ['email','email'],
            [['username', 'email'], 'unique', 'targetClass' => 'app\models\User'],

        ];
    }
}