<?php

namespace app\components;

use Yii;
use app\models\Member;
use app\models\Memberdayleavehistory;

class MemberMethods{

    public function SendEmail($email){
        //Encrypting the email and time for reset
        $crypemail = Yii::$app->Encryption->Encypt($email);
        $cryptime = Yii::$app->Encryption->Encypt(time());

        //Creating the unique link to change the password
        $emaillink = Yii::$app->params['myip'] . '/changepass?email=' . $crypemail . '&time=' . $cryptime ;

        //Send email.
        Yii::$app->mailer->compose()
            ->setFrom('mehul@test.com')
            ->setTo($email)
            ->setSubject('Password Reset! Expiring in 5 minutes.')
            ->setTextBody($emaillink)
            ->send();

        return true;
    }

    public function Login($username, $password){
        //Encrypting the password for comparison
        $cryppass = Yii::$app->Encryption->Encypt($password);

        //Declaring the sql query and executing the query
        $exists = Member::find()->where(['account' => $username])->one();
        
        //Checking if the username and password are same as that of the database
        if (!$exists) {
            return "Sorry! Your account does not exist.";
        }
        else if($exists['role'] == 0 && $exists['status'] == 0){
            if($cryppass == $exists['password']){
                return true;
            }
            else{
                return "Your Password is invalid";
            }
        }
        else{
            return "Sorry you don't have acess to the page or your account is not active";
        }
    }

    public function PasswordResetDB($email, $pass){
        //Encrypting the new password
        $encrpnewpass = Yii::$app->Encryption->Encypt($pass);
                
        //Setting the new email in the databse
        Yii::$app->db->createCommand()
        ->update('member', ['password' => $encrpnewpass], ['email' => $email])
        ->execute();

        //Setting the update date in the databse
        Yii::$app->db->createCommand()
        ->update('member', ['update_date' => date('Y-m-d', time())], ['email' => $email])
        ->execute();

        return "Password changes successfully! Login using new credentials.";
    }

    public function GetCurrentDate(){
        //Returns current date in YYYY-MM-DD format.
        return date('Y-m-d', time());
    }

    public function PasswordChangeDB($old, $new, $newcpass){

        $session = Yii::$app->session;
        //Encrypting the new password
        $encrpoldpass = Yii::$app->Encryption->Encypt($old);
        
        //Finding if the db contain entry with given account and password pair.
        $exists = Member::find()
                ->where(['account' => $session['decryplogusr']])
                ->andWhere(['password' => $encrpoldpass])
                ->one();

        if($exists){
            if($new == $newcpass){
                $encrppass = Yii::$app->Encryption->Encypt($new);
                //Setting the new email in the databse
                Yii::$app->db->createCommand()
                ->update('member', ['password' => $encrppass], ['account' => $session['decryplogusr']])
                ->execute();

                //Setting the update date in the databse
                Yii::$app->db->createCommand()
                ->update('member', ['update_date' => date('Y-m-d', time())], ['account' => $session['decryplogusr']])
                ->execute();

                return "Password changes successfully! Login using new credentials.";
            }
            else{
                return "Your password didn't match. Authentication failed. Try Again.";
            }
        }
        else{
            return "Your password didn't match. Authentication failed. Try Again.";
        }   
    }

    public function DeleteEntryDb($account){

        //Declaring the sql query and executing the query
        $exists = Member::find()->where(['account' => $account])->one();
        
        //Checking if the username and password are same as that of the database
        if($exists){

            //Setting the status in the databse
            Yii::$app->db->createCommand()
            ->update('member', ['status' => 1], ['account' => $account])
            ->execute();

            //Setting the update date in the databse
            Yii::$app->db->createCommand()
            ->update('member', ['update_date' => date('Y-m-d', time())], ['account' => $account])
            ->execute();

            return true;
        }
        else{
            return false;
        }
    }

    public function ManageDayLeave($account, $type, $day, $hour, $reason){
        
        //Declaring the sql query and executing the query
        $exists = Member::find()->where(['account' => $account])->one();
        
        $kbn = 0;
        $timecount = $hour + ($day * 8);
        
        if($exists){
            if($type=='add'){
                $kbn = 8;
            }
            else{
                $kbn = 9;
            }

            Yii::$app->db->createCommand()
            ->insert('member_day_leave_history', 
                [
                    'account' => $account,
                    'history_kbn'=>$kbn,
                    'date_from'=>'',
                    'date_to'=>'',
                    'time_point'=>'',
                    'time_count' => $timecount,
                    'reason'=>$reason,
                    'status'=>$exists['status'],
                    'insert_date'=>date('Y-m-d', time()),
                    'update_date'=>date('Y-m-d', time())
                ]
            )->execute();

            return 'Successful.';
        }
        else{
            return 'Something went wrong with the request. Please try again.';
        }

    }

    public function DeleteEntryDayLeave($id){
        
        //Declaring the sql query and executing the query
        $exists = Memberdayleavehistory::find()->where(['member_day_leave_history_id' => $id])->one();
        
        //print($exists);exit();
        
        //Checking if the username and password are same as that of the database
        if($exists){

            //Setting the status in the databse
            Yii::$app->db->createCommand()
            ->update('member_day_leave_history', ['status' => 1], ['member_day_leave_history_id' => $id])
            ->execute();

            //Setting the update date in the databse
            Yii::$app->db->createCommand()
            ->update('member_day_leave_history', ['update_date' => date('Y-m-d', time())], ['member_day_leave_history_id' => $id])
            ->execute();

            return true;
        }
        else{
            return false;
        }
    }

}