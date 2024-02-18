<?php

use yii\db\Migration;

// use yii\db\mssql\Schema as Schema;

/**
 * Class m240218_090642_user
 */
class m240218_090642_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user',[
            'id'=>$this->primaryKey(),
            'username' => $this->string(255),
            'email' => $this->string(255),
            'password' => $this->string(255),
            'user_role' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240218_090642_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240218_090642_user cannot be reverted.\n";

        return false;
    }
    */
}
