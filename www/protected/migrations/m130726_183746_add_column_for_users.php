<?php

class m130726_183746_add_column_for_users extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{users}}', 'role', 'integer');
        $this->addColumn('{{users}}', 'tel', 'integer');
        $this->addColumn('{{users}}', 'purse', 'integer');
	}

	public function down()
	{
        $this->dropColumn('{{users}}', 'role');
        $this->dropColumn('{{users}}', 'tel');
        $this->dropColumn('{{users}}', 'purse');
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