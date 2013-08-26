<?php

class m130808_174251_alter_table_messages_add_update_time extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{messages}}', 'update_time', 'datetime');
	}

	public function down()
	{
        $this->dropColumn('{{messages}}', 'update_time');
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