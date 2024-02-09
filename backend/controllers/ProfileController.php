<?php

namespace backend\controllers;

use yii\rest\ActiveController;
use backend\base\UtilController;

class ProfileController extends ActiveController
{
    public $modelClass = 'backend\models\Profile';

    public function behaviors()
    {
        return array_merge(parent::behaviors(), UtilController::cors());
    }
}
