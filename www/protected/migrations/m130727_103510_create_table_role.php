<?php

class m130727_103510_create_table_role extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{user_role}}', array(
            'id'=>'pk',
            'name'=>'string',
        ));
	}

	public function down()
	{
		$this->dropTable('{{user_role}}');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}