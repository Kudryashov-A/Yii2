<?php

use yii\db\Migration;

/**
 * Class m191105_211959_create_table_user
 */
class m191105_211959_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'name' => $this->string()->notNull(),
            'password_hash' => $this->string()->notNull(),
            'access_token' => $this->string(),
            'auth_key' => $this->string(),
            'creator_id' => $this->integer()->notNull(),
            'updater_id' => $this->integer(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m191105_211959_create_table_user was reverted.\n";
        $this->dropTable('user');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191105_211959_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
