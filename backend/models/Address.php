<?php

namespace backend\models;

use Yii;
use backend\models\Client;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string|null $address
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postal_code
 * @property string|null $country
 * @property int|null $client_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
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
            [['address', 'city', 'state', 'postal_code', 'country', 'client_id'], 'required'],
            [['address', 'city', 'state', 'postal_code', 'country'], 'string'],
            [['client_id'], 'integer'],
            [['client_id'], 'unique'],
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
            'address' => 'Address',
            'city' => 'City',
            'state' => 'State',
            'postal_code' => 'Postal Code',
            'country' => 'Country',
            'client_id' => 'Client ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \backend\models\query\AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \backend\models\query\AddressQuery(get_called_class());
    }

    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }
}
