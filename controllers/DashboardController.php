<?php

namespace app\controllers;
use Yii;
use app\models\Member;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use app\models\MemberSearch;

class DashboardController extends Controller
{
    public $enableCsrfValidation = false;
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    public function actionIndex()
    {
        $session = Yii::$app->session;

        $searchModel = new MemberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $decrypusr = Yii::$app->Encryption->Decypt($session['logusr']);
        //print($decrypusr);exit();
 
        $session['decryplogusr'] = $decrypusr . " ";
        if(empty($decrypusr)){
            return $this->redirect(['/','error' => 'Please login first.']);
        }
        else{
            $this->layout = 'dashboard';
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
        ]);
        }
        
    }

    //Change Password Block
    public function actionChangepass(){
        if($request = Yii::$app->request->post()){
            
            //Getting the data from frontend.
            $oldpass = $request['oldpass'];
            $newpass = $request['newpass'];
            $newcpass = $request['newcpass'];

            //Setting data in database and then redirecting. Check components/MemberMethods for the method.
            $this->redirect(['/','error' => Yii::$app->Member->PasswordChangeDB($oldpass, $newpass, $newcpass)]); 
             
        }
    }

    public function actionView($id)
    {
        $this->layout = 'dashboard';
        $model = $this->findModel($id);
        $account = $model->account;

        return $this->render('view', [
            
            'model' => $model
        ]);
    }

    public function actionCreate()
    {
        $this->layout = 'dashboard';
        $model = new Member();
        
        if ($model->load(Yii::$app->request->post())) {

            //Change the input password to encrypted password.
            $cryppass = Yii::$app->Encryption->Encypt($model->password);
            $model->password = $cryppass;
            // print_r($model);exit();

            $model->save(); //Saving the new model to the databse.

            //Setting the update date and insert date in the database
            Yii::$app->db->createCommand()
            ->update('member', ['update_date' => date('Y-m-d', time())], ['account' => $model->account])
            ->execute();

            Yii::$app->db->createCommand()
            ->update('member', ['insert_date' => date('Y-m-d', time())], ['account' => $model->account])
            ->execute();
           
            return $this->redirect(['view', 'id' => $model->account]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $this->layout = 'dashboard';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->account]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete()
    {
        $this->layout = 'dashboard';

        //Delete the entry out of the database. check the membermethods for the method.
        if(Yii::$app->Member->DeleteEntryDb(htmlspecialchars($_GET["id"]))){
            return $this->redirect(['/dashboard']);
        } 
    }

    protected function findModel($id)
    {
        $this->layout = 'dashboard';
        if (($model = Member::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}