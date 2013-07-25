<?php

class m130725_161439_create_table_users extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{users}}', array(
            'id' => 'pk',
            'email' => 'string',
            'password' => 'string',
            'register_time' => 'datetime',
            'update_time' => 'datetime',
        ));
	}

	public function down()
	{
        $this->dropTable('{{users}}');
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