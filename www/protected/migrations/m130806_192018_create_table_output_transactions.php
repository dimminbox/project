<?php

class m130806_192018_create_table_output_transactions extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{users_output_transactions}}', array(
            'id' => 'pk',
            'user_id' => 'integer',
            'payee_account_name' => 'string',
            'payee_account' => 'string',
            'payment_amount' => 'money',
            'payment_batch_num' => 'string',
            'payment_id' => 'string',
            'created_time' => 'datetime',
            'status' => 'integer',
            'error' => 'string'
        ));
	}

	public function down()
	{
		$this->dropTable('{{users_output_transactions}}');
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