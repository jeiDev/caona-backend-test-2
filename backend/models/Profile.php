<?php

namespace backend\models;

use Yii;
use backend\models\Client;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone
 * @property string|null $sexo
 * @property int|null $client_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
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
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'phone', 'client_id'], 'required'],
            [['first_name', 'last_name', 'phone'], 'string'],
            [['client_id'], 'integer'],
            [['client_id'], 'unique'],
            [['sexo'], 'string', 'max' => 1],
            ['sexo', 'in', 'range' => ['M', 'F'], 'message' => 'Please select a valid option for gender.'],
            ['client_id', 'exist', 'targetClass' => Client::className(), 'targetAttribute' => 'id'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone' => 'Phone',
            'sexo' => 'Sexo',
            'client_id' => 'Client ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\ProfileQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\ProfileQuery(get_called_class());
    }

    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }
}
