<?php

use yii\db\Migration;

/**
 * Class m240218_090647_project
 */
class m240218_090647_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string(255),
            'description'=>$this->string(255),
            
        ]);
      

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {  $this->createTable('project',[
        'id'=>$this->primaryKey(),
        'title'=>$this->string(255),
        'description'=>$this->string(255),
        
    ]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240218_090647_project cannot be reverted.\n";

        return false;
    }
    */
}
