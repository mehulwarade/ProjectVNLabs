<?php

$session = Yii::$app->session;

use yii\helpers\Html;
use app\models\Member;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Memberdayleavehistory */

$this->title = 'Manage Day Leave';
$this->params['breadcrumbs'][] = ['label' => 'Dashboard', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memberdayleavehistory-create" style="display:block;margin-left:150px;padding: 30px 15px 0 15px;background-color: #fff">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>

    <form action="/dashboard/managedayleave" class="dropdown" method="get">
        Member: <?= Html::activeDropDownList($model, 'account', $items) ?><br><br>

        Type:
        <!-- class dropdown is the css for dropdown -->
        <z class="dropdown">
            <select name="type">
                <option value="add">Add</option>
                <option value="sub">Substract</option>
            </select>
        </z><br><br>

        Number of Days: <input type="text" placeholder="Day" name="day" style="width: 2cm" required> days &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" style="width: 2cm" placeholder="Hour" name="hour" required> hours<br><br>

        Reason: <input type="text" placeholder="Input reason here" name="reason">

        <br><br>
        <input class="btn btn-success" type="submit">
    </form>

</div>