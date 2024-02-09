<?php

namespace backend\models;

use Yii;
use app\models\Profile;
use app\models\Address;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'string'],
            ['email', 'email', 'message' => 'Please enter a valid email.'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe']
        ];
    }

    public function fields()
    {
        $fields = parent::fields();

        unset($fields['deleted_at']);

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\ClientQuery(get_called_class());
    }

    public function getAddress()
    {
        return $this->hasOne(Address::class, ['client_id' => 'id']);
    }

    public function getProfile()
    {
        return $this->hasOne(Profile::class, ['client_id' => 'id']);
    }
}
