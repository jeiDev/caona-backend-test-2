<?php

namespace backend\base;

class UtilController
{
    public static function cors(){
        return [
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    'Origin' => ["*"],
                    'Access-Control-Request-Method' => ['*'],
                    'Access-Control-Allow-Headers' => ['Content-Type'],
                    'Access-Control-Max-Age' => 3600,     
                ],
            ]
        ];
    }
}