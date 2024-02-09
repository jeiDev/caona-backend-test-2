<?php

namespace backend\controllers;

use yii\rest\ActiveController;
use backend\base\UtilController;

class ClientController extends ActiveController
{
    public $modelClass = 'backend\models\Client';
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return array_merge(parent::behaviors(), UtilController::cors());
    }
}
