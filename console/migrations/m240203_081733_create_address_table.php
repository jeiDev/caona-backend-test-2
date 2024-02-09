<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m240203_081733_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'address' => $this->text(),
            'city' => $this->text(),
            'state' => $this->text(),
            'postal_code' => $this->text(),
            'country' => $this->text(),
            'client_id' => $this->integer(),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')->append('ON UPDATE CURRENT_TIMESTAMP'),
            'deleted_at' => $this->timestamp()->null(),
        ]);

        $this->addForeignKey(
            'fk-address-client_id-client-id',
            '{{%address}}',
            'client_id',
            '{{%client}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-address-client_id-client-id', '{{%address}}');
        $this->dropTable('{{%address}}');
    }
}
