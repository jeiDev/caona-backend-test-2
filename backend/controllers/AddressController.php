<?php

namespace backend\controllers;

use yii\rest\ActiveController;
use backend\base\UtilController;

class AddressController extends ActiveController
{
    public $modelClass = 'backend\models\Address';
    
    public function behaviors()
    {
        return array_merge(parent::behaviors(), UtilController::cors());
    }
} 