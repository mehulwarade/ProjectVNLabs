<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model app\models\Memberdayleavehistory */

$this->title = 'View Member';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="memberdayleavehistory-view" style="display:block;margin-left:150px;padding: 30px 15px 0 15px;background-color: #fff">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->member_day_leave_history_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->member_day_leave_history_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $modelday,
        'attributes' => [
            'member_day_leave_history_id',
            'account',
            'history_kbn',
            'date_from',
            'date_to',
            'time_point',
            'time_count:datetime',
            'reason',
            'status',
            'insert_date',
            'update_date',
        ],
    ]) ?>

</div>