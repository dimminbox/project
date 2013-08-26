<?php

class m130802_155910_alter_table_user_transaction_add_payment_id extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{user_transaction}}', 'payment_id', 'string');
	}

	public function down()
	{
        $this->dropColumn('{{user_transaction}}', 'payment_id');
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