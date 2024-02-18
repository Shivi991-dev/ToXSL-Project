<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class=" auth-signup col-5">
    <h1>Register :</h1>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'user_role')->dropDownList(
            ['Admin' => 'Admin', 'Manager' => 'Manager', 'User' => 'User'],
            ['prompt' => 'Select a Role', 'class' => 'form-control ']
        ) ?>
    
        <div class="form-group mt-3">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-outline-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
        <div class="text mt-2">
            Already have an account ? <a href="/login">Login here</a>
        </div>
</div><!-- auth-signup -->
