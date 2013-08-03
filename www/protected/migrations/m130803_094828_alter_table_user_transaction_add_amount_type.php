<?php

class m130803_094828_alter_table_user_transaction_add_amount_type extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{user_transaction}}', 'amount_type', 'integer');
	}

	public function down()
	{
		$this->dropColumn('{{user_transaction}}', 'amount_type');
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