<?php

class m130727_103117_alter_table_users_column_role_rename extends CDbMigration
{
	public function up()
	{
        $this->renameColumn('{{users}}','role','role_id');
	}

	public function down()
	{
        $this->renameColumn('{{users}}','role_id','role');
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