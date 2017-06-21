<?php

use yii\db\Migration;

class m170621_032947_region extends Migration
{


    public function safeUp()
    {
        $this->createTable('region', [
            'id'=> $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0),
            'name'=>$this->string(50)->notNull(),
            'level'=>$this->integer()->notNull()->defaultValue(0)
        ]);

        $this->insert("region",['id'=>1,'parent_id'=>0, 'name'=>'shangh','level'=>0]);


    }

    public function safeDown()
    {
        echo "m170621_032947_region cannot be reverted.\n";

        return false;
    }

    public function getAreaList(){
        $path = \Yii::getAlias("@rowe/region");
        $filename = $path.DIRECTORY_SEPARATOR."migrations".DIRECTORY_SEPARATOR."area.raw.js";
        $handle = fopen($filename, "r");
        $contents = fread($handle, filesize($filename));
        fclose($handle);
        $replace = ['region'=>'"region"','name'=>'"name"','code'=>'"code"','state'=>'"state"','city'=>'"city"',"'"=>'"'];
        $contents =strtr($contents,$replace);
        $data = Json::decode(utf8_encode($contents));
    }



    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170621_032947_region cannot be reverted.\n";

        return false;
    }
    */
}
