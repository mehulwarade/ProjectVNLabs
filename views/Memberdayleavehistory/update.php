<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Memberdayleavehistory */

$this->title = 'Update Memberdayleavehistory: ' . $model->member_day_leave_history_id;
$this->params['breadcrumbs'][] = ['label' => 'Memberdayleavehistories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->member_day_leave_history_id, 'url' => ['view', 'id' => $model->member_day_leave_history_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memberdayleavehistory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
