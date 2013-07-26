<?php

class m130726_204242_add_column_name_for_users extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{users}}', 'name', 'string');
	}

	public function down()
	{
        $this->dropColumn('{{users}}', 'name');
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