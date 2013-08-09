<?php

class m130809_162541_alter_table_users_change_purse extends CDbMigration
{
	public function up()
	{
        $this->alterColumn('{{users}}', 'internal_purse', 'bigint');
	}

	public function down()
	{
        $this->alterColumn('{{users}}', 'internal_purse', 'int');
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