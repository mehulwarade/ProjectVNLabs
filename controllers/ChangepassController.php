<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Member;



class ChangepassController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex($error = '')
    {
        $this->layout = 'changepass';
        if($request = Yii::$app->request->get()){

            //Getting the data from the URL
            $email = $request['email'];
            $time = $request['time'];

            //Decrypting the information
            $decrypemail = Yii::$app->Encryption->Decypt($email);
            $decryptime = Yii::$app->Encryption->Decypt($time);

            //Checking if the decryption resulted empty. If empty means the link has been edited and hence give error.
            if(!empty($decrypemail)){

                //Checking if the link has been clicked within 5 minutes.
                if((time() - $decryptime) <= 300){
                    $exists = Member::find()->where(['email' => $decrypemail])->one();

                    if (!$exists) {
                        $error = "Sorry the link is incorrect! Please try again";
                        $this->redirect(['/admin','error' => $error]);  
                    }
                }
                else{
                    $error = "The link has expired. Please try again!";
                    $this->redirect(['/admin','error' => $error]);  
                }
            }
        }
        
        return $this->render('index',array('error' => $error, 'decrypemail' => $decrypemail));
    }

    //Executed when someone clicks the button and enters new password
    public function actionPasswordreset(){
        if($request = Yii::$app->request->post()){
            
            //Getting the data from frontend.
            $newpass = $request['resetpass'];
            $newemail = $request['resetemail'];

            //Setting data in database and then redirecting. Check components/MemberMethods for the method.
            $this->redirect(['/admin','error' => Yii::$app->Member->PasswordResetDB($newemail, $newpass)]);  
        }
    }
}

?>
