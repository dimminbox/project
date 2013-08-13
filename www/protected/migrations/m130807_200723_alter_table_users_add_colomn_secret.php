<?php

class m130807_200723_alter_table_users_add_colomn_secret extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{users}}', 'secret', 'string');
	}

	public function down()
	{
        $this->dropColumn('{{users}}', 'secret');

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