<?php

class m130803_133406_alter_table_user_add_purse extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{users}}', 'internal_purse', 'integer');
        $this->addColumn('{{users}}', 'perfect_purse', 'string');
	}

	public function down()
	{
		$this->dropColumn('{{users}}', 'internal_purse');
        $this->dropColumn('{{users}}', 'perfect_purse');
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