<?php

use yii\db\Migration;

/**
 * Class m190620_142843_createTablesActivityUsers
 */
class m190620_142843_createTablesActivityUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('activity', [
            'id' => $this->primaryKey(),
            'title' => $this->string(150)->notNull(),
            'description' => $this->text(),
            'date_start' => $this->dateTime()->notNull(),
            'date_end' => $this->dateTime(),
            'email' => $this->string(150),
            'use_notification' => $this->boolean()->notNull()->defaultValue(0),
            'is_blocked' => $this->boolean()->notNull()->defaultValue(0),
            'date_created' => $this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(150)->notNull(),
            'password_hash' => $this->string(300)->notNull(),
            'token' => $this->string(300),
            'auth_key' => $this->string(150),
            'date_created' => $this->timestamp()->notNull()
                ->defaultExpression('CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('activity');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190620_142843_createTablesActivityUsers cannot be reverted.\n";

        return false;
    }
    */
}
