<?php

class m130727_081236_create_table_user_transaction extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{user_transaction}}',array(
            'id'=>'pk',
            'user_id'=>'integer',
            'amount'=>'numeric(19,4)',
            'reason'=>'string',
            'time'=>'datetime',
            'amount_after'=>'numeric(19,4)',
            'amount_before'=>'numeric(19,4)',
        ));
	}

	public function down()
	{
		$this->dropTable('{{user_transaction}}');
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