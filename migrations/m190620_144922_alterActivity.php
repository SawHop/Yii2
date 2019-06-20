<?php

use yii\db\Migration;

/**
 * Class m190620_144922_alterActivity
 */
class m190620_144922_alterActivity extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('activity','user_id',$this->integer()->notNull());

        $this->addForeignKey('activity_userFK','activity','user_id',
            'users','id','CASCADE','CASCADE');

        $this->createIndex('usersEmailInd','users','email',true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('activity_userFK','activity');
        $this->dropColumn('activity','user_id');
        $this->dropIndex('usersEmailInd','users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190620_144922_alterActivity cannot be reverted.\n";

        return false;
    }
    */
}
