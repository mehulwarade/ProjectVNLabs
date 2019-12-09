<?php

/* @var $this \yii\web\View */
/* @var $content string */

$session = Yii::$app->session;

use app\models\Member;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use yii\helpers\ArrayHelper;

$this->params['breadcrumbs'][] = 'Members';

?>
<html>

<body>
   <!-- Manage Member block -->
   <div id="managemember" class="w3-modal w3-modal w3-animate-zoom container-fluid" style="display:block;margin-left:250px;padding: 30px 15px 0 15px;background-color: #fff">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Welcome <?php echo $session['decryplogusr']; ?>!</h1>
         </div>
      </div>
      <div class="member-index" style="margin-right:250px;">
         <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
         ]) ?>
         <p>
            <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
         </p>

         <?php //echo $this->render('_search', ['model' => $searchModel]); 
         ?>

         <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
               ['class' => 'yii\grid\SerialColumn'],

               'account',
               'password',
               'name',
               'email:email',
               'role',
               'status',
               'insert_date',
               'update_date',

               ['class' => 'yii\grid\ActionColumn'],
            ],
         ]); ?>
      </div>
   </div>

   <!-- Manage Day Leave block -->
   <div id="dayleavemanage" class="w3-modal w3-modal w3-animate-zoom container-fluid" style="display:none;margin-left:250px;padding: 30px 15px 0 15px;background-color: #fff">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Welcome <?php echo $session['decryplogusr']; ?>!</h1>
            <h3>Add or Substract day Leave</h3>
         </div>
      </div>

      

      <form action="/action_page.php" class="dropdown">
         Member: <?= Html::activeDropDownList($model, 'account',$items) ?><br><br>
         Type:
            <!-- class dropdown is the css for dropdown -->
            <z class="dropdown" >
               <select name="type">
                  <option value="add">Add</option>
                  <option value="sub">Substract</option>
               </select>
            </z><br><br>

         Number of Days: <input type="text" placeholder="Day" name="day" style="width: 2cm"> days &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="text" style="width: 2cm" placeholder="Hour" name="hour"> hours<br><br>
         
         Reason: <input type="text" placeholder="Input reason here" name="reason">

         <br><br>
         <input class="btn btn-success" type="submit">
      </form>
   </div>

   <!-- Day Leave Stat block -->
   <div id="dayleavestat" class="w3-modal w3-modal w3-animate-zoom container-fluid" style="display:none;margin-left:250px;padding: 30px 15px 0 15px;background-color: #fff">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Welcome <?php echo $loguser; ?>!</h1>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                     </div>
                     <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>New Tasks!</div>
                     </div>
                  </div>
               </div>
               <a href="#">
                  <div class="panel-footer">
                     <span class="pull-left">View Details</span>
                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                     <div class="clearfix"></div>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>

   <!-- Manage Day History block -->
   <div id="dayleavehis" class="w3-modal w3-modal w3-animate-zoom container-fluid" style="display:none;margin-left:250px;padding: 30px 15px 0 15px;background-color: #fff">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Welcome <?php echo $loguser; ?>!</h1>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                     </div>
                     <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>New Tasks!</div>
                     </div>
                  </div>
               </div>
               <a href="#">
                  <div class="panel-footer">
                     <span class="pull-left">View Details</span>
                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                     <div class="clearfix"></div>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>

   <!-- Statistics and Output Excel Monthly block -->
   <div id="statoutexcel" class="w3-modal w3-modal w3-animate-zoom container-fluid" style="display:none;margin-left:250px;padding: 30px 15px 0 15px;background-color: #fff">
      <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Welcome <?php echo $loguser; ?>!</h1>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
               <div class="panel-heading">
                  <div class="row">
                     <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                     </div>
                     <div class="col-xs-9 text-right">
                        <div class="huge">12</div>
                        <div>New Tasks!</div>
                     </div>
                  </div>
               </div>
               <a href="#">
                  <div class="panel-footer">
                     <span class="pull-left">View Details</span>
                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                     <div class="clearfix"></div>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </div>



</body>

</html>