<?php

namespace backend\base;

class UtilController
{
    public static function cors(){
        return [
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    'Origin'                           => ["*"],
                    'Access-Control-Request-Method'    => ['GET', 'POST', 'PUT', 'DELETE'],
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Max-Age'           => 3600,
                ],
            ]
        ];
    }
}