<?php

use yii\db\Migration;

/**
 * Class m191106_183106_create_table_task_user
 */
class m191106_183106_create_table_task_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task_user', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        echo "m191106_183106_create_table_task_user cannot be reverted.\n";
        $this->dropTable('task_user');
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191106_183106_create_table_task_user cannot be reverted.\n";

        return false;
    }
    */
}
