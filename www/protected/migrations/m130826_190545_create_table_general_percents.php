<?php

class m130826_190545_create_table_general_percents extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{general_percent}}', array(
            'id' => 'pk',
            'date' => 'datetime',
            'json_days' => 'string'
        ));
	}

	public function down()
	{
		$this->dropTable('{{general_percent}}');
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