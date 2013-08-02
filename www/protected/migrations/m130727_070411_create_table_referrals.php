<?php

class m130727_070411_create_table_referrals extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{referrals}}', array(
            'id' => 'pk',
            'user_id' => 'integer',
            'ref_id' => 'integer'
        ));
	}

	public function down()
	{
		$this->dropTable('{{referrals}}');
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