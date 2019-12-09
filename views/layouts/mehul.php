<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use app\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <title>Login Page</title>
    <?= Html :: csrfMetaTags() ?>
    <link rel="stylesheet" type="text/css" href="/css/mehul.css">
    <link rel="stylesheet" type="text/css" href="/css/w3school.css">
</head>

<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class="container">
        <?= $content ?>
    </div>
</div>

</body>
</html>
