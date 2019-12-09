<?php

namespace app\controllers;
use Yii;
use app\models\Member;
use yii\web\Controller;


class AdminController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex($error = '')
    {
        $session = Yii::$app->session;
        $session->remove('logusr');
        $session->remove('decryplogusr');

        $this->layout = 'mehul';

        //post method 
        if ($request = Yii::$app->request->post()) {
            //Login block.
            //Getting the input username and password
            $myusername = $request['username'];
            $mypassword = $request['password'];
            $emaillost = $request['forgetpassemail'];

            //if the reset email field is empty or not. If empty then check for login info else execute the change password code.
            if(empty($emaillost)){
                //Checks login details are correct or not. Check components/MemberMethods for method.
                $error = Yii::$app->Member->Login($myusername, $mypassword);
                if(!is_string($error)){
                    //Declaring the sql query and executing the query
                    $exists = Member::find()->where(['account' => $myusername])->one();
                    $cryploguser = Yii::$app->Encryption->Encypt($exists['name']);
                    $session['logusr'] = $cryploguser;
                    return $this->redirect(['/dashboard']);
                }
            }
            else{
                //Reset password block.
                $exists = Member::find()->where(['email' => $emaillost])->one();

                if (!$exists) {
                    $error = "The email you entered is not associated with any account. Please try again!";
                }
                //Sends email to the email address provided. Check components/MemberMethods for method.
                else if(Yii::$app->Member->SendEmail($emaillost)){
                    $error = "Check your email for the reset link! It expires in 5 minutes.";
                }
            }
        }

        //if (empty($error)) {
        //     return 'Success';
        // } else {
        //     return $error;
        // }
         
        //get request
        return $this->render('index',array('error' => $error));
    }

}

?>
