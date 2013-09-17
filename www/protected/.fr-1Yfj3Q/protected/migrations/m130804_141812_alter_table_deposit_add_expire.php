<?php

class m130804_141812_alter_table_deposit_add_expire extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{deposit}}', 'expire', 'datetime');
  	}

	public function down()
	{
		$this->dropColumn('{{deposit}}', 'datetime');
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