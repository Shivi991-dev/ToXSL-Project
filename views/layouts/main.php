<?php

use app\widgets\Alert;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yii2 Toxsl</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">
</head>
<style>
  body{
    background-color: whitesmoke;
    font-family: "Quicksand", sans-serif;

    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="height:7rem">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><h3>Yii2Toxsl</h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/signup">SignUp</a>
        </li>
     <?php if (!Yii::$app->user->isGuest) { ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php if(Yii::$app->user->identity->user_role == 'Admin'){ echo '/site/admin';}elseif(Yii::$app->user->identity->user_role == 'Manager'){echo '/site/manager';}else{echo '/site/user';} ?>">Dashboard</a>
        </li>
        <li class="nav-item  " style="margin-left:63rem;color: white;background-color: black;border-radius: 20px;">
          <a class="nav-link" href="/auth/logout" style="color:white">Logout (<?= Yii::$app->user->identity->username ?>)</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>
<div class="alert">
  <?= Alert::widget()?>

</div>
<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
     
        <?= $content ?>
        
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>