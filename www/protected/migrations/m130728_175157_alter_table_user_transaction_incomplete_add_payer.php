<?php

class m130728_175157_alter_table_user_transaction_incomplete_add_payer extends CDbMigration
{
	public function up()
	{
        $this->addColumn('{{user_transactions_incomplete}}', 'payer', 'string');
        $this->addColumn('{{user_transactions_incomplete}}', 'payment_id', 'string');
        $this->addColumn('{{user_transactions_incomplete}}', 'hash', 'string');
	}

	public function down()
	{
		$this->dropColumn('{{user_transactions_incomplete}}', 'payer');
        $this->dropColumn('{{user_transactions_incomplete}}', 'payment_id');
        $this->dropColumn('{{user_transactions_incomplete}}', 'hash');
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