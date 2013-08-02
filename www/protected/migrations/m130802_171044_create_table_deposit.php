<?php

class m130802_171044_create_table_deposit extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{deposit}}',array(
            'id'=>'pk',
            'user_id'=>'integer',
            'deposit_type_id'=>'integer',
            'deposit_amount'=>'integer',
            'status'=>'boolean',
            'date'=>'datetime',
        ));
        $this->createTable('{{deposit_type}}',array(
            'id'=>'pk',
            'type'=>'string',
            'percent'=>'integer',
        ));
	}

	public function down()
	{
		$this->droptable('{{deposit}}');
        $this->dropTable('{{deposit_type}}');
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