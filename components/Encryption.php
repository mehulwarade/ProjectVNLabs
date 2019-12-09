<?php

namespace app\components;

use Yii;
use yii\base\Model;


class Encryption{

    public function Encypt($encryptstring){
        $securestring = openssl_encrypt ($encryptstring,Yii::$app->params['crypmethod'], 
                    Yii::$app->params['crypkey'],
                    Yii::$app->params['crypoptions'],
                    Yii::$app->params['crypiv'] );

        return $securestring;
    }

    public function Decypt($decryptstring){
        $unsecurestring = openssl_decrypt($decryptstring,Yii::$app->params['crypmethod'], 
                                                Yii::$app->params['crypkey'],
                                                Yii::$app->params['crypoptions'],
                                                Yii::$app->params['crypiv'] );

        return $unsecurestring;
    }

}