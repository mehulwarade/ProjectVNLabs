<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MemberdayleavehistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Memberdayleavehistories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memberdayleavehistory-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    
    
    <p>
        <?= Html::a('Manage Day Leave', ['createmanageday'], ['class' => 'btn btn-success']) ?>
    </p> 
   

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'member_day_leave_history_id',
            'account',
            'history_kbn',
            // 'date_from:datetime',
            // 'date_to:datetime',
            // 'time_point:datetime',
            'time_count',
            'reason',
            'status',
            'insert_date',
            'update_date',

            ['class' => 'yii\grid\ActionColumnManageDayLeave'],
        ],
    ]); ?>


</div>
